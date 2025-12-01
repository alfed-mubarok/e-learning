<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseMurid;
use App\Models\MateriModel;
use App\Models\DiskusiModel;
use CodeIgniter\I18n\Time;
use App\Models\UserModel;
use App\Models\SiswaModel;

class Materi extends BaseMurid
{
    public function detail($id_materi)
    {
        $model = new MateriModel();
        $materi = $model->find($id_materi);

        if (!$materi) {
            return redirect()->back()->with('error', 'Materi tidak ditemukan.');
        }

        $gambar = [];
        if (!empty($materi['gambar_json'])) {
            $gambar = json_decode($materi['gambar_json'], true);
        }

        $videoFile  = $materi['video_file'] ?? null;
        $videoLink  = $materi['video_link'] ?? null;
        $fileMateri = $materi['file_materi'] ?? null;

        // Komentar
        $diskusiModel = new DiskusiModel();
        $loginModel   = new UserModel();
        $siswaModel   = new SiswaModel();
        $db           = \Config\Database::connect();

        $komentar = $diskusiModel
            ->where('id_materi', $id_materi)
            ->orderBy('created_at', 'ASC')
            ->findAll();

        foreach ($komentar as &$k) {

            $login = $loginModel->find($k['id_user']);

            // Jika user sudah dihapus / dummy
            if (!$login) {
                $k['nama'] = 'Pengguna';
                $k['foto'] = 'default.png';
                $k['waktu'] = date('d M Y H:i', strtotime($k['created_at']));
                continue;
            }

            if ($login['status'] === 'murid') {
                $siswa = $siswaModel->find($k['id_user']);

                $k['nama'] = $siswa['nama'] ?? 'Siswa';
                $k['foto'] = $siswa['foto'] ?? 'default.png';

            } elseif ($login['status'] === 'guru') {

                $guru = $db->table('tb_guru')
                    ->where('id_guru', $k['id_user'])
                    ->get()
                    ->getRowArray();

                $k['nama'] = $guru['nama_guru'] ?? 'Guru';
                $k['foto'] = $guru['foto'] ?? 'default.png';

            } else {
                $k['nama'] = 'Pengguna';
                $k['foto'] = 'default.png';
            }

            $k['waktu'] = date('d M Y H:i', strtotime($k['created_at']));
        }

        $data = [
            'materi'     => $materi,
            'gambar'     => $gambar,
            'videoFile'  => $videoFile,
            'videoLink'  => $videoLink,
            'fileMateri' => $fileMateri,
            'komentar'   => $komentar
        ];

        return view('siswa/materi/materi', $data);
    }


    public function tambah_diskusi($id_materi)
    {
        $diskusiModel = new DiskusiModel();
        $materiModel  = new MateriModel();
        $userModel    = new UserModel();
        $siswaModel   = new SiswaModel();
        $db           = \Config\Database::connect();

        $id_user    = session()->get('id_user');
        $isi_pesan  = $this->request->getPost('isi_pesan');

        $diskusiModel->insert([
            'id_materi'  => $id_materi,
            'id_user'    => $id_user,
            'isi_pesan'  => $isi_pesan,
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
        ]);

        return redirect()->to(base_url('siswa/materi/' . $id_materi));
    }
}
