<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReferensiModel;
use App\Models\MateriModel;

class Referensi extends BaseGuru
{
    public function index()
    {
        $idGuru = session()->get('id_user');

        $referensiModel = new ReferensiModel();
        $materiModel = new MateriModel();

        // Ambil referensi milik guru login, join dengan materi untuk ambil nomor_materi, judul, kelas, tahun_target
        $referensi = $referensiModel
            ->select('tb_referensi.*, tb_materi.nomor_materi, tb_materi.judul as judul_materi, tb_materi.kelas, tb_materi.tahun_target')
            ->join('tb_materi', 'tb_materi.id_materi = tb_referensi.id_materi')
            ->where('tb_materi.id_guru', $idGuru)
            ->orderBy('tb_referensi.created_at', 'DESC')
            ->findAll();

        return view('guru/referensi/daftar_referensi', ['referensi' => $referensi]);
    }

    public function edit($id)
    {
        $referensiModel = new ReferensiModel();
        $materiModel = new MateriModel();

        $idGuru = session()->get('id_user');

        $referensi = $referensiModel
            ->select('tb_referensi.*')
            ->join('tb_materi', 'tb_materi.id_materi = tb_referensi.id_materi')
            ->where('tb_materi.id_guru', $idGuru)
            ->where('id_referensi', $id)
            ->first();

        $materi = $materiModel->where('id_guru', $idGuru)->findAll();

        return view('guru/referensi/edit_referensi', [
            'referensi' => $referensi,
            'materi' => $materi
        ]);
    }

    public function update($id)
    {
        $referensiModel = new ReferensiModel();

        $data = [
            'id_materi'       => $this->request->getPost('id_materi'),
            'nama_referensi'  => $this->request->getPost('nama_referensi'),
            'link'            => $this->request->getPost('link')
        ];

        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/materi/referensi', $newName);
            $data['file'] = $newName;
        }

        $referensiModel->update($id, $data);

        return redirect()->to('/guru/referensi')->with('success', 'Referensi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $referensiModel = new ReferensiModel();

        $referensi = $referensiModel->find($id);
        if ($referensi && !empty($referensi['file'])) {
            $filepath = FCPATH . 'materi/referensi/' . $referensi['file'];
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }

        $referensiModel->delete($id);

        return redirect()->to('/guru/referensi')->with('success', 'Referensi berhasil dihapus.');
    }
    public function tambah()
    {
        $materiModel = new MateriModel();

        // Ambil hanya materi milik guru yang login
        $idGuru = session()->get('id_user');
        $materi = $materiModel->where('id_guru', $idGuru)->findAll();

        return view('guru/referensi/tambah_referensi', ['materi' => $materi]);
    }

    public function simpan()
    {
        $referensiModel = new ReferensiModel();

        $data = [
            'id_materi' => $this->request->getPost('id_materi'),
            'nama_referensi' => $this->request->getPost('nama_referensi'),
            'link' => $this->request->getPost('link'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Handle file upload jika ada
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('materi/referensi', $newName);
            $data['file'] = $newName;
        }

        $referensiModel->insert($data);
        return redirect()->to('/guru/referensi')->with('success', 'Referensi berhasil ditambahkan.');
    }
}
