<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskusiModel;
use App\Models\MateriModel;
use App\Models\DiskusiTerbacaModel;

class Diskusi extends BaseGuru
{
    public function index($id_materi)
    {
        $diskusiModel = new DiskusiModel();
        $materiModel = new MateriModel();

        $materi = $materiModel->find($id_materi);
        $pesan = $diskusiModel->where('id_materi', $id_materi)
            ->orderBy('created_at', 'ASC')
            ->findAll();

        $userId = session()->get('id_user');
        $db = \Config\Database::connect();
        $check = $db->table('tb_diskusi_terbaca')
            ->where(['id_user' => $userId, 'id_materi' => $id_materi])
            ->get()->getRow();

        if ($check) {
            $db->table('tb_diskusi_terbaca')
                ->where(['id_user' => $userId, 'id_materi' => $id_materi])
                ->update(['terakhir_dibuka' => date('Y-m-d H:i:s')]);
        } else {
            $db->table('tb_diskusi_terbaca')
                ->insert([
                    'id_user' => $userId,
                    'id_materi' => $id_materi,
                    'terakhir_dibuka' => date('Y-m-d H:i:s')
                ]);
        }

        $loginModel = new \App\Models\UserModel();
        $siswaModel = new \App\Models\SiswaModel();
        $guruModel  = new \App\Models\GuruModel();

        foreach ($pesan as &$p) {

            $login = $loginModel->find($p['id_user']);

            if (!$login) {
                $p['nama'] = 'Pengguna';
                $p['foto'] = 'default.png';
                $p['role'] = 'none';
                continue;
            }

            if ($login['status'] === 'murid') {

                $s = $siswaModel->find($p['id_user']);

                $p['nama'] = $s['nama'] ?? 'Siswa';
                $p['foto'] = $s['foto'] ?? 'default.png';
                $p['role'] = 'murid';
            } elseif ($login['status'] === 'guru') {

                $g = $guruModel->find($p['id_user']);

                $p['nama'] = $g['nama_guru'] ?? 'Guru';
                $p['foto'] = $g['foto'] ?? 'default.png';
                $p['role'] = 'guru';
            } else {

                $p['nama'] = 'Pengguna';
                $p['foto'] = 'default.png';
                $p['role'] = 'none';
            }
        }

        return view('guru/diskusi/diskusi_materi', [
            'materi' => $materi,
            'pesan' => $pesan,
            'id_materi' => $id_materi,
        ]);
    }

    public function kirim()
    {
        $model = new DiskusiModel();

        $id_materi = $this->request->getPost('id_materi');
        $id_user   = session()->get('id_user');
        $role      = session()->get('status');

        $statusUntukPenerima = ($role === 'guru')
            ? 'belum_dibaca_siswa'
            : 'belum_dibaca_guru';

        $data = [
            'id_materi' => $id_materi,
            'id_user'   => $id_user,
            'role'      => $role,
            'isi_pesan' => $this->request->getPost('isi_pesan'),
            'status'    => $statusUntukPenerima
        ];

        $model->insert($data);

        return redirect()->back();
    }
}
