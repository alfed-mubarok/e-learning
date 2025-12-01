<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tb_siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = [
        'id_siswa',
        'nama',
        'kelas',
        'kelas_sekarang',
        'no_absen',
        'tahun_masuk',
        'foto'
    ];
    public $timestamps = false;
}
