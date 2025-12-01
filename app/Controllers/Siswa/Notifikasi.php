<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseMurid;

class Notifikasi extends BaseMurid
{
    public function cek()
    {
        return $this->response->setJSON([
            'jumlah' => count($this->notifSiswa)
        ]);
    }

    public function baca($id_diskusi)
    {
        $db = \Config\Database::connect();
        $idSiswa = session()->get('id_user');

        $diskusi = $db->table('tb_diskusi')
            ->where('id_diskusi', $id_diskusi)
            ->get()
            ->getRow();

        if (!$diskusi) {
            return redirect()->back()->with('error', 'Diskusi tidak ditemukan');
        }

        $idMateri = $diskusi->id_materi;

        $cek = $db->table('tb_diskusi_terbaca')
            ->where('id_user', $idSiswa)
            ->where('id_materi', $idMateri)
            ->get()
            ->getRow();

        if ($cek) {
            $db->table('tb_diskusi_terbaca')
                ->where('id', $cek->id)
                ->update(['terakhir_dibuka' => date('Y-m-d H:i:s')]);
        } else {
            $db->table('tb_diskusi_terbaca')->insert([
                'id_user' => $idSiswa,
                'id_materi' => $idMateri,
                'terakhir_dibuka' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()->to('/siswa/materi/' . $idMateri);
    }
}
