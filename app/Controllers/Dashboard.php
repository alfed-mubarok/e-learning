<?php

namespace App\Controllers;

use App\Models\ProyekModel;

class Dashboard extends BaseGuru
{
    protected $proyekModel;

    public function __construct()
    {
        $this->proyekModel = new ProyekModel();
    }

    public function index()
    {
        $data['title'] = 'Dashboard Guru';
        $data['proyek'] = $this->proyekModel->findAll();

        return $this->render('guru/dashboard', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Proyek';

        return $this->render('guru/proyek/createproyek', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);

            $this->proyekModel->save([
                'nama_proyek' => $this->request->getPost('nama_proyek'),
                'gambar'      => $newName,
                'link'        => $this->request->getPost('link_proyek')
            ]);

            return redirect()->to('/dashboard')->with('success', 'Proyek berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Upload gagal.');
    }

    public function delete($id)
    {
        $proyek = $this->proyekModel->find($id);

        if ($proyek) {
            $filePath = FCPATH . 'uploads/' . $proyek['gambar'];
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $this->proyekModel->delete($id);
            return redirect()->to('/dashboard')->with('success', 'Proyek berhasil dihapus.');
        }

        return redirect()->to('/dashboard')->with('error', 'Data tidak ditemukan.');
    }
}
