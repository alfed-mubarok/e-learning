<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseMurid;
use App\Models\TugasModel;
use App\Models\PengumpulanModel;
use App\Models\SiswaModel;

class Rapor extends BaseMurid
{
    public function index()
    {
        $idSiswa = session()->get('id_user');
        $kelasSiswa = session()->get('kelas');        // Kelas asli siswa
        $tahunSiswa = session()->get('tahun_masuk');  // Tahun masuk siswa

        // Filter dari GET
        $kelasFilter = $this->request->getGet('kelas');      // Filter kelas
        $semester = $this->request->getGet('semester');      // Filter semester

        // Jika filter kelas kosong → pakai kelas siswa
        $kelasDigunakan = $kelasFilter ?: $kelasSiswa;

        $tugasModel = new TugasModel();

        // Base query
        $tugas = $tugasModel
            ->where('tb_tugas.kelas_target', $kelasDigunakan)
            ->where('tb_tugas.tahun_target', $tahunSiswa);

        // Filter semester jika dipilih
        if (!empty($semester)) {
            $tugas->where('tb_tugas.semester', $semester);
        }

        // Join materi + join nilai siswa
        $tugas = $tugas
            ->join('tb_materi', 'tb_tugas.id_materi = tb_materi.id_materi')
            ->join(
                'tb_pengumpulan',
                'tb_tugas.id_tugas = tb_pengumpulan.id_tugas 
             AND tb_pengumpulan.id_siswa = ' . $idSiswa,
                'left'
            )
            ->select('
            tb_materi.judul as judul_materi,
            tb_pengumpulan.nilai,
            tb_pengumpulan.komentar,
            tb_tugas.semester
        ')
            ->findAll();

        // Jika BELUM PILIH SEMESTER → ambil semester pertama yg tersedia
        if (empty($semester) && count($tugas) > 0) {
            $semester = $tugas[0]['semester'] ?? null;
        }

        // Data siswa
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->find($idSiswa);

        return view('siswa/rapor/raporsiswa', [
            'siswa'       => $siswa,
            'pengumpulan' => $tugas,
            'semester'    => $semester,
            'kelasFilter' => $kelasFilter,
            'kelasSiswa'  => $kelasSiswa,
            'kelasDipakai' => $kelasDigunakan
        ]);
    }


    public function cetak()
    {
        $idSiswa = session()->get('id_user');
        $kelas = session()->get('kelas');
        $tahun = session()->get('tahun_masuk');
        $semester = $this->request->getGet('semester');

        $tugasModel = new TugasModel();

        $tugas = $tugasModel
            ->where('tb_tugas.kelas_target', $kelas)
            ->where('tb_tugas.tahun_target', $tahun);

        if ($semester) {
            $tugas->where('tb_tugas.semester', $semester);
        }

        $tugas = $tugas
            ->join('tb_materi', 'tb_tugas.id_materi = tb_materi.id_materi')
            ->join('tb_pengumpulan', 'tb_tugas.id_tugas = tb_pengumpulan.id_tugas AND tb_pengumpulan.id_siswa = ' . $idSiswa, 'left')
            ->select('tb_materi.judul as judul_materi, tb_pengumpulan.nilai, tb_pengumpulan.komentar, tb_tugas.semester')
            ->findAll();

        if (!$semester && !empty($tugas)) {
            $semester = $tugas[0]['semester'] ?? null;
        }

        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->find($idSiswa);

        $data = [
            'siswa' => $siswa,
            'pengumpulan' => $tugas,
            'semester' => $semester
        ];

        $html = view('siswa/rapor/cetak', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Rapor_' . $siswa['nama'] . '.pdf', ['Attachment' => false]);
    }
}
