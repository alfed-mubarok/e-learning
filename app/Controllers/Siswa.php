<?php

namespace App\Controllers;

use App\Controllers\BaseMurid;
use App\Models\MateriModel;

class Siswa extends BaseMurid
{
    public function dashboard()
    {
        $proyekModel = new \App\Models\ProyekModel();
        $data['proyek'] = $proyekModel->findAll();

        return view('siswa/dashboard', $data);
    }

    public function materi()
    {
        $materiModel = new MateriModel();
        $data['materi'] = $materiModel->orderBy('nomor_materi', 'ASC')->findAll();
        return view('siswa/materi/materi', $data);
    }
}
