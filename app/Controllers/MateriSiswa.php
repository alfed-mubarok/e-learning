<?php

namespace App\Controllers;

use App\Controllers\BaseMurid;
use App\Models\MateriModel;
use App\Models\ReferensiModel;

class MateriSiswa extends BaseMurid
{
    public function detail($id)
    {
        $materiModel = new MateriModel();
        $referensiModel = new ReferensiModel();

        $materi = $materiModel->find($id);
        if (!$materi) {
            return redirect()->to('siswa/materi')->with('error', 'Materi tidak ditemukan.');
        }

        // Validasi: materi hanya untuk kelas & tahun siswa yang sesuai
        $kelasSiswa = session()->get('kelas');
        $tahunSiswa = session()->get('tahun_masuk');

        if ($materi['kelas'] !== $kelasSiswa || $materi['tahun_target'] !== $tahunSiswa) {
            return redirect()->to('siswa/materi')->with('error', 'Materi ini tidak ditujukan untuk Anda.');
        }

        $materi['gambar'] = json_decode($materi['gambar_json'] ?? '[]', true);
        $referensi = $referensiModel->where('id_materi', $id)->findAll();

        return view('siswa/materi/detail', [
            'materi' => $materi,
            'referensi' => $referensi
        ]);
    }
}
