<?php

namespace App\Controllers;

use App\Models\ProyekModel;
use App\Models\UserModel;
use App\Models\GuruModel;

class Guru extends BaseGuru
{
    protected $proyekModel;

    public function __construct()
    {
        $this->proyekModel = new ProyekModel();
    }

    public function dashboard()
    {
        $data['proyek'] = $this->proyekModel->getAllProyek();
        return view('guru/dashboard', $data);
    }
    public function index()
    {
        $guruModel = new GuruModel();
        $data['guru'] = $guruModel->findAll();
        return view('guru/data_guru/daftar_guru', $data);
    }

    public function tambah()
    {
        return view('guru/data_guru/tambah_guru');
    }

    public function simpan()
    {

        $rules = [
            'id_guru'    => 'required|is_unique[tb_guru.id_guru]',
            'password'   => 'required|min_length[6]',
            'nama_guru'  => 'required',
            'jabatan'    => 'required',
            'foto'       => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('validation', $this->validator)
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        // Upload Foto (opsional)
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $uploadPath = FCPATH . 'guru';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $foto->move($uploadPath, $namaFoto);
        }

        $guruModel = new GuruModel();
        $dataGuru = [
            'id_guru'   => $this->request->getPost('id_guru'),
            'nama_guru' => $this->request->getPost('nama_guru'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'foto'      => $namaFoto
        ];

        if ($guruModel->insert($dataGuru) === false) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal menyimpan ke tb_guru.');
        }

        $userModel = new UserModel();
        $dataLogin = [
            'id_user'  => $this->request->getPost('id_guru'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'status'   => 'guru'
        ];

        if ($userModel->insert($dataLogin) === false) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal menyimpan ke tb_login.');
        }

        return redirect()->to('/guru/data_guru')->with('success', 'Data guru berhasil disimpan!');
    }
    public function hapus($id_guru)
    {
        $guruModel = new GuruModel();
        $userModel = new UserModel();

        // Cek data guru
        $guru = $guruModel->find($id_guru);

        if (!$guru) {
            return redirect()->to('/guru/data_guru')->with('error', 'Data guru tidak ditemukan.');
        }

        // Hapus foto kalau ada
        if (!empty($guru['foto']) && file_exists(FCPATH . 'guru/' . $guru['foto'])) {
            unlink(FCPATH . 'guru/' . $guru['foto']);
        }

        // Hapus data guru
        $guruModel->delete($id_guru);

        // Hapus data login di tb_login
        $userModel->delete($id_guru);

        return redirect()->to('/guru/data_guru')->with('success', 'Data guru berhasil dihapus!');
    }

    public function edit($id_guru)
    {
        $guruModel = new GuruModel();
        $data['guru'] = $guruModel->find($id_guru);

        if (!$data['guru']) {
            return redirect()->to('/guru/data_guru')->with('error', 'Data guru tidak ditemukan.');
        }

        return view('guru/data_guru/edit_guru', $data);
    }

    public function update($id_guru)
    {
        // Validasi
        $rules = [
            'nama_guru' => 'required',
            'jabatan'   => 'required',
            'foto'      => 'permit_empty|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('validation', $this->validator)
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        $guruModel = new GuruModel();
        $guru = $guruModel->find($id_guru);

        if (!$guru) {
            return redirect()->to('/guru/data_guru')->with('error', 'Data guru tidak ditemukan.');
        }

        $dataUpdate = [
            'nama_guru' => $this->request->getPost('nama_guru'),
            'jabatan'   => $this->request->getPost('jabatan'),
        ];

        // Handle Foto Baru (Jika Ada)
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();

            // Hapus foto lama
            if (!empty($guru['foto']) && file_exists(FCPATH . 'guru/' . $guru['foto'])) {
                unlink(FCPATH . 'guru/' . $guru['foto']);
            }

            $foto->move(FCPATH . 'guru', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
        }

        // Update data guru
        $guruModel->update($id_guru, $dataUpdate);

        return redirect()->to('/guru/data_guru')->with('success', 'Data guru berhasil diperbarui.');
    }
}
