<?php

namespace App\Controllers;

use App\Controllers\BaseGuru;
use App\Models\SiswaModel;
use App\Models\RiwayatKelasModel;

class KenaikanKelas extends BaseGuru
{
    public function index()
    {
        $siswaModel = new SiswaModel();
        $riwayatModel = new RiwayatKelasModel(); // ← Tambahkan ini

        $kelas = $this->request->getGet('kelas');
        $tahun = $this->request->getGet('tahun');
        $siswa = [];

        if ($kelas && $tahun) {
            $siswa = $siswaModel->where('kelas', $kelas)
                ->where('tahun_masuk', $tahun)
                ->findAll();

            // ⬇ Tambahkan pengecekan riwayat terbaru per siswa
            foreach ($siswa as &$row) {
                $latest = $riwayatModel->where('id_siswa', $row['id_siswa'])
                    ->orderBy('tahun_ajaran', 'DESC')
                    ->orderBy('id_riwayat', 'DESC')
                    ->first();

                $row['kelas_terkini'] = $latest
                    ? $latest['kelas'] . ' - ' . $latest['semester'] . ' (' . $latest['tahun_ajaran'] . ')'
                    : 'Belum ada riwayat';
            }
        }

        return view('guru/kenaikankelas/daftarsiswa', ['siswa' => $siswa]);
    }


    public function proses()
    {
        $ids = $this->request->getPost('naikkan');
        $kelasBaru = $this->request->getPost('kelas_baru');
        $semester = $this->request->getPost('semester');
        $tahunBaru = $this->request->getPost('tahun_baru');

        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada siswa yang dipilih.');
        }

        $riwayatModel = new RiwayatKelasModel();
        $siswaModel = new SiswaModel();

        foreach ($ids as $id) {
            // 1️⃣ Simpan riwayat kelas baru
            $riwayatModel->insert([
                'id_siswa' => $id,
                'kelas' => $kelasBaru,
                'semester' => $semester,
                'tahun_ajaran' => $tahunBaru
            ]);

            // 2️⃣ Update data siswa agar kelas aktifnya ikut berubah
            $siswaModel->update($id, [
                'kelas' => $kelasBaru,
                'kelas_sekarang' => $kelasBaru
            ]);
        }

        return redirect()->to(base_url('guru/kenaikankelas'))
            ->with('success', 'Kelas siswa berhasil dinaikkan dan riwayat telah diperbarui.');
    }
}
