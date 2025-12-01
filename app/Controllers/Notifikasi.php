<?php

namespace App\Controllers;

class Notifikasi extends BaseGuru
{
    public function baca($id_materi)
    {
        $db      = \Config\Database::connect();
        $idGuru  = session()->get('id_user');
        $now     = date('Y-m-d H:i:s');

        // Cek apakah guru sudah pernah membuka materi ini
        $cek = $db->table('tb_diskusi_terbaca')
            ->where('id_user', $idGuru)
            ->where('id_materi', $id_materi)
            ->get()
            ->getRow();

        if (!$cek) {
            // Belum pernah dicatat → insert
            $db->table('tb_diskusi_terbaca')->insert([
                'id_user'        => $idGuru,
                'id_materi'      => $id_materi,
                'terakhir_dibuka'=> $now
            ]);
        } else {
            // Sudah pernah → update timestamp
            $db->table('tb_diskusi_terbaca')
                ->where('id', $cek->id)
                ->update(['terakhir_dibuka' => $now]);
        }

        return redirect()->to('/diskusi/' . $id_materi);
    }
}
