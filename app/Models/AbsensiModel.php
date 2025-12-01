<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'tb_absensi';
    protected $primaryKey = 'id_absensi';
    protected $allowedFields = ['id_siswa', 'foto_siswa', 'tanggal_absensi', 'keterangan'];

    public function getAbsensiLengkap()
    {
        return $this->select('tb_absensi.*, tb_siswa.nama, tb_siswa.kelas, tb_absensi.keterangan')
            ->join('tb_siswa', 'tb_siswa.id_siswa = tb_absensi.id_siswa')
            ->orderBy('tanggal_absensi', 'DESC')
            ->findAll();
    }
}
