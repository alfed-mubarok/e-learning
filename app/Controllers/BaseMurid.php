<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MateriModel;
use App\Models\GuruModel;
use App\Models\RiwayatKelasModel;
use Config\Services;

class BaseMurid extends BaseController
{
    protected $materiSidebar;
    protected $activeKelas;
    protected $activeSemester;
    protected $notifSiswa = [];

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);

        if (session()->get('status') !== 'murid') {
            return redirect()->to('/login')->send();
        }

        $materiModel  = new MateriModel();
        $guruModel    = new GuruModel();
        $riwayatModel = new RiwayatKelasModel();

        $idSiswa    = session()->get('id_user');
        $tahunSiswa = session()->get('tahun_masuk');

        // =======================
        // 1. KELAS AKTIF SISWA
        // =======================

        $riwayat = $riwayatModel
            ->where('id_siswa', $idSiswa)
            ->orderBy('tahun_ajaran', 'DESC')
            ->orderBy('id_riwayat', 'DESC')
            ->first();

        $kelasSaatIni = $riwayat['kelas'] ?? session()->get('kelas');
        session()->set('kelas_saat_ini', $kelasSaatIni);

        // =======================
        // 2. SIDEBAR MATERI
        // =======================

        $materiAll = $materiModel
            ->select('tb_materi.*, tb_guru.nama_guru')
            ->join('tb_guru', 'tb_guru.id_guru = tb_materi.id_guru')
            ->where('tb_materi.tahun_target', $tahunSiswa)
            ->where('tb_materi.kelas <=', $kelasSaatIni)
            ->orderBy('tb_guru.nama_guru', 'ASC')
            ->orderBy('tb_materi.kelas', 'ASC')
            ->orderBy('tb_materi.semester', 'ASC')
            ->orderBy('tb_materi.nomor_materi', 'ASC')
            ->findAll();

        $materiSidebar = [];
        foreach ($materiAll as $m) {
            $materiSidebar[$m['nama_guru']][$m['kelas']][$m['semester']][] = $m;
        }

        $this->activeKelas    = $kelasSaatIni;
        $this->activeSemester = 'ganjil';
        $this->materiSidebar  = $materiSidebar;

        Services::renderer()->setVar('materiSidebar', $materiSidebar);
        Services::renderer()->setVar('activeKelas', $kelasSaatIni);
        Services::renderer()->setVar('activeSemester', 'ganjil');

        // ===============================
        // 3. NOTIFIKASI DISKUSI (FINAL)
        // ===============================

        $db = \Config\Database::connect();

        $this->notifSiswa = $db->query("
            SELECT 
                d.*, 
                m.judul AS judul_materi
            FROM tb_diskusi d
            JOIN tb_materi m ON m.id_materi = d.id_materi

            LEFT JOIN tb_diskusi_terbaca t
                ON t.id_user = '$idSiswa'
            AND t.id_materi = d.id_materi

            WHERE d.role = 'guru'
            AND (t.terakhir_dibuka IS NULL OR d.created_at > t.terakhir_dibuka)

            ORDER BY d.created_at DESC
        ")->getResultArray();


        Services::renderer()->setVar('notif_siswa', $this->notifSiswa);
    }
}
