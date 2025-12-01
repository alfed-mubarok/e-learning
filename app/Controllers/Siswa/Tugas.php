<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseMurid;
use App\Models\TugasModel;
use App\Models\PengumpulanModel;

class Tugas extends BaseMurid
{
    public function detail($id)
    {
        $tugasModel = new TugasModel();
        $pengumpulanModel = new PengumpulanModel();

        $tugas = $tugasModel->find($id);

        if (!$tugas) {
            return redirect()->to('/siswa')->with('error', 'Tugas tidak ditemukan.');
        }

        $pengumpulan = $pengumpulanModel
            ->where('id_tugas', $id)
            ->where('id_siswa', session()->get('id_user'))
            ->orderBy('waktu_kumpul', 'DESC')
            ->first();

        return view('siswa/tugas/tugassiswa', [
            'tugas' => $tugas,
            'pengumpulan' => $pengumpulan
        ]);
    }

    public function kumpulkan($id)
    {
        $tugasModel = new TugasModel();
        $pengumpulanModel = new PengumpulanModel();

        $tugas = $tugasModel->find($id);
        if (!$tugas) {
            return redirect()->to('/siswa')->with('error', 'Tugas tidak ditemukan.');
        }

        $file = $this->request->getFile('file');
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return redirect()->back()->with('error', 'Gagal mengunggah file.');
        }

        $newName = $file->getRandomName();
        $file->move('materi/tugas', $newName);

        $idSiswa = session()->get('id_user');

        // Cek apakah siswa sudah pernah mengumpulkan
        $existing = $pengumpulanModel
            ->where(['id_tugas' => $id, 'id_siswa' => $idSiswa])
            ->first();

        // Siapkan data
        $data = [
            'id_tugas'     => $id,
            'id_siswa'     => $idSiswa,
            'file_tugas'   => $newName,
            'waktu_kumpul' => date('Y-m-d H:i:s'),
            'nilai'        => null,
            'komentar'     => null,
        ];

        if ($existing) {
            // Hapus file lama
            $oldPath = FCPATH . 'materi/tugas' . $existing['file_tugas'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Update baris
            $pengumpulanModel
                ->where(['id_tugas' => $id, 'id_siswa' => $idSiswa])
                ->set($data)
                ->update();
        } else {
            $pengumpulanModel->insert($data);
        }

        return redirect()->to('/siswa/tugas/detail/' . $id)->with('success', 'Tugas berhasil dikumpulkan.');
    }

    public function AmbilMateri($id_materi)
    {
        $tugasModel = new \App\Models\TugasModel();
        $tugas = $tugasModel->where('id_materi', $id_materi)->first();

        if ($tugas) {
            return redirect()->to('/siswa/tugas/detail/' . $tugas['id_tugas']);
        } else {
            return redirect()->back()->with('error', 'Tugas belum tersedia untuk materi ini.');
        }
    }
}
