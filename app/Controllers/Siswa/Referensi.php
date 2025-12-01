<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseMurid;
use App\Models\ReferensiModel;

class Referensi extends BaseMurid
{
    public function index($id_materi)
    {
        $referensiModel = new ReferensiModel();
        $data['referensi'] = $referensiModel->where('id_materi', $id_materi)->findAll();

        return view('siswa/referensi/referensi', $data);
    }
}
