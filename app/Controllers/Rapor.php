<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\TugasModel;
use App\Models\PengumpulanModel;

class Rapor extends BaseGuru
{
    public function index()
    {
        $siswaModel = new SiswaModel();
        $pengumpulanModel = new PengumpulanModel();

        $kelas = $this->request->getGet('kelas');
        $tahun = $this->request->getGet('tahun');
        $nama = $this->request->getGet('nama');
        $semester = $this->request->getGet('semester');

        $builder = $siswaModel;

        if ($nama) {
            $builder = $builder->like('nama', $nama);
        }

        if ($kelas) {
            $builder = $builder->where('kelas', $kelas);
        }

        if ($tahun) {
            $builder = $builder->where('tahun_masuk', $tahun);
        }

        $siswa = $builder->findAll();

        foreach ($siswa as $key => &$s) {
            $nilaiQuery = $pengumpulanModel
                ->join('tb_tugas', 'tb_pengumpulan.id_tugas = tb_tugas.id_tugas')
                ->where('tb_pengumpulan.id_siswa', $s['id_siswa'])
                ->where('tb_tugas.kelas_target', $s['kelas'])
                ->where('tb_tugas.tahun_target', $s['tahun_masuk']);

            if ($semester) {
                $nilaiQuery = $nilaiQuery->where('tb_tugas.semester', $semester);
            }

            $nilai = $nilaiQuery->selectAvg('tb_pengumpulan.nilai')->first();
            $s['rata_rata'] = $nilai['nilai'] ? round($nilai['nilai'], 1) : 0;

            if ($s['rata_rata'] == 0) {
                unset($siswa[$key]);
                continue;
            }

            // Tambahkan semester_aktif (semester nilai terakhir)
            $semesterAktif = $pengumpulanModel
                ->join('tb_tugas', 'tb_pengumpulan.id_tugas = tb_tugas.id_tugas')
                ->where('tb_pengumpulan.id_siswa', $s['id_siswa'])
                ->where('tb_tugas.kelas_target', $s['kelas']) // ✅ disaring juga
                ->where('tb_tugas.tahun_target', $s['tahun_masuk']) // ✅
                ->orderBy('tb_tugas.semester', 'DESC')
                ->select('tb_tugas.semester')
                ->limit(1)
                ->first();

            $s['semester_aktif'] = $semesterAktif['semester'] ?? null;
        }

        return view('guru/rapor/raporsiswa', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'tahun' => $tahun,
            'nama' => $nama,
            'semester' => $semester
        ]);
    }


    public function detail($id)
    {
        $siswaModel = new SiswaModel();
        $siswa = $siswaModel->find($id);

        $semester = $this->request->getGet('semester');

        $tugasModel = new TugasModel();

        $tugas = $tugasModel
            ->where('tb_tugas.kelas_target', $siswa['kelas'])
            ->where('tb_tugas.tahun_target', $siswa['tahun_masuk']);

        if ($semester) {
            $tugas = $tugas->where('tb_tugas.semester', $semester);
        }

        $tugas = $tugas
            ->join('tb_materi', 'tb_tugas.id_materi = tb_materi.id_materi')
            ->join('tb_pengumpulan', 'tb_tugas.id_tugas = tb_pengumpulan.id_tugas AND tb_pengumpulan.id_siswa = ' . $id, 'left')
            ->select('tb_materi.judul as judul_materi, tb_pengumpulan.nilai, tb_pengumpulan.komentar, tb_tugas.semester')
            ->findAll();

        // 🔧 Fallback kalau semester belum dipilih
        if (!$semester && count($tugas) > 0) {
            $semester = $tugas[0]['semester'] ?? null;
        }

        return view('guru/rapor/detailrapor', [
            'siswa' => $siswa,
            'pengumpulan' => $tugas,
            'semester' => $semester
        ]);
    }

    public function cetak($id)
    {
        $siswaModel = new SiswaModel();
        $tugasModel = new TugasModel();

        $siswa = $siswaModel->find($id);
        $semester = $this->request->getGet('semester'); // ✅ ambil semester dari query

        $tugas = $tugasModel
            ->where('tb_tugas.kelas_target', $siswa['kelas'])
            ->where('tb_tugas.tahun_target', $siswa['tahun_masuk']);

        if ($semester) {
            $tugas = $tugas->where('tb_tugas.semester', $semester);
        }

        $tugas = $tugas
            ->join('tb_materi', 'tb_tugas.id_materi = tb_materi.id_materi')
            ->join('tb_pengumpulan', 'tb_tugas.id_tugas = tb_pengumpulan.id_tugas AND tb_pengumpulan.id_siswa = ' . $id, 'left')
            ->select('tb_materi.judul as judul_materi, tb_pengumpulan.nilai, tb_pengumpulan.komentar, tb_tugas.semester')
            ->findAll();

        if (!$semester && !empty($tugas)) {
            $semester = $tugas[0]['semester'] ?? null;
        }

        $data = [
            'siswa' => $siswa,
            'pengumpulan' => $tugas,
            'semester' => $semester
        ];

        // Render view jadi HTML
        $html = view('guru/rapor/rapor_cetak', $data);

        // Load DOMPDF
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('Rapor_' . $siswa['nama'] . '.pdf', ['Attachment' => false]);
    }
}
