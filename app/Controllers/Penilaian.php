<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TugasModel;
use App\Models\PengumpulanModel;
use App\Models\SiswaModel;

class Penilaian extends BaseGuru
{
    public function index($id_tugas)
    {
        $tugasModel = new TugasModel();
        $pengumpulanModel = new PengumpulanModel();
        $siswaModel = new SiswaModel();

        $tugas = $tugasModel->find($id_tugas);
        if (!$tugas) {
            return redirect()->to('/guru/tugas')->with('error', 'Tugas tidak ditemukan.');
        }

        $siswa = $siswaModel
            ->where('kelas', $tugas['kelas_target'])
            ->where('tahun_masuk', $tugas['tahun_target'])
            ->findAll();

        $pengumpulan = $pengumpulanModel
            ->where('id_tugas', $id_tugas)
            ->findAll();


        $dataSiswa = [];
        foreach ($siswa as $s) {
            $key = array_search($s['id_user'], array_column($pengumpulan, 'id_user'));
            $dataSiswa[] = [
                'id_user'   => $s['id_user'],
                'nama'      => $s['nama_siswa'],
                'kelas'     => $s['kelas'],
                'file'      => $key !== false ? $pengumpulan[$key]['file_tugas'] : null,
                'nilai'     => $key !== false ? $pengumpulan[$key]['nilai'] : null,
                'komentar'  => $key !== false ? $pengumpulan[$key]['komentar'] : null
            ];
        }

        return view('guru/tugas/penilaian_tugas', [
            'tugas' => $tugas,
            'siswa' => $dataSiswa
        ]);
    }

    public function nilai($idTugas)
    {
        $pengumpulanModel = new \App\Models\PengumpulanModel();

        $idSiswa   = $this->request->getPost('id_siswa');
        $nilai     = $this->request->getPost('nilai');
        $komentar  = $this->request->getPost('komentar');

        $data = [
            'nilai'     => $nilai,
            'komentar'  => $komentar,
        ];

        $pengumpulanModel->where('id_tugas', $idTugas)
            ->where('id_siswa', $idSiswa)
            ->set($data)
            ->update();

        return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
    }
}
