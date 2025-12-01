<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TugasModel;
use App\Models\MateriModel;

class Tugas extends BaseGuru
{
    public function index()
    {
        $idGuru = session()->get('id_user');

        $model = new TugasModel();
        $tugas = $model->select('tb_tugas.*, tb_materi.nomor_materi, tb_materi.judul')
            ->join('tb_materi', 'tb_materi.id_materi = tb_tugas.id_materi')
            ->where('tb_materi.id_guru', $idGuru)
            ->orderBy('tb_tugas.created_at', 'DESC')
            ->findAll();

        return view('guru/tugas/daftar_tugas', ['tugas' => $tugas]);
    }

    public function tambah()
    {
        $idGuru = session()->get('id_user');
        $materiModel = new MateriModel();
        $materi = $materiModel->where('id_guru', $idGuru)->findAll();

        return view('guru/tugas/tambah_tugas', ['materi' => $materi]);
    }

    public function simpan()
    {
        $model = new TugasModel();
        $materiModel = new MateriModel();

        $id_materi = $this->request->getPost('id_materi');
        $materi = $materiModel->find($id_materi);

        $data = [
            'id_materi'     => $id_materi,
            'headline'      => $this->request->getPost('headline'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'deadline'      => $this->request->getPost('deadline'),
            'kelas_target'  => $materi['kelas'],
            'tahun_target'  => $materi['tahun_target'],
            'semester'      => $materi['semester']
        ];

        $file = $this->request->getFile('file_pendukung');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/materi/tugas', $newName);
            $data['file_pendukung'] = $newName;
        }

        $model->insert($data);

        return redirect()->to('/guru/tugas')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function penilaian($id_tugas)
    {
        $tugasModel = new TugasModel();
        $pengumpulanModel = new \App\Models\PengumpulanModel(); // pastikan sudah ada

        $tugas = $tugasModel->select('tb_tugas.*, tb_materi.nomor_materi, tb_materi.judul')
            ->join('tb_materi', 'tb_materi.id_materi = tb_tugas.id_materi')
            ->where('id_tugas', $id_tugas)
            ->first();

        $siswa = $pengumpulanModel->select('tb_pengumpulan.*, tb_siswa.nama, tb_siswa.kelas, tb_siswa.tahun_masuk')
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_pengumpulan.id_siswa')
            ->where('tb_pengumpulan.id_tugas', $id_tugas)
            ->findAll();

        return view('guru/tugas/penilaian', [
            'tugas' => $tugas,
            'siswa' => $siswa // <- ini penting
        ]);
    }

    public function edit($id)
    {
        $model = new TugasModel();
        $materiModel = new MateriModel();

        $idGuru = session()->get('id_user');

        $tugas = $model->select('tb_tugas.*')
            ->join('tb_materi', 'tb_materi.id_materi = tb_tugas.id_materi')
            ->where('tb_materi.id_guru', $idGuru)
            ->where('id_tugas', $id)
            ->first();

        $materi = $materiModel->where('id_guru', $idGuru)->findAll();

        return view('guru/tugas/edit_tugas', [
            'tugas' => $tugas,
            'materi' => $materi
        ]);
    }

    public function update($id)
    {
        $model = new TugasModel();
        $materiModel = new MateriModel();

        $id_materi = $this->request->getPost('id_materi');
        $materi = $materiModel->find($id_materi);

        $data = [
            'id_materi'     => $id_materi,
            'headline'      => $this->request->getPost('headline'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'deadline'      => $this->request->getPost('deadline'),
            'kelas_target'  => $materi['kelas'],
            'tahun_target'  => $materi['tahun_target'],
            'semester'      => $materi['semester']
        ];

        $file = $this->request->getFile('file_pendukung');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/materi/tugas', $newName);
            $data['file_pendukung'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to('/guru/tugas')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $model = new TugasModel();
        $tugas = $model->find($id);

        if ($tugas && !empty($tugas['file_pendukung'])) {
            $path = FCPATH . 'materi/tugas/' . $tugas['file_pendukung'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $model->delete($id);
        return redirect()->to('/guru/tugas')->with('success', 'Tugas berhasil dihapus.');
    }
}
