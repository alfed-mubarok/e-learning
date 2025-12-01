<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumpulanModel extends Model
{
    protected $table            = 'tb_pengumpulan';
    protected $primaryKey       = 'id_pengumpulan';
    protected $allowedFields    = [
        'id_tugas',
        'id_siswa',
        'file_tugas',
        'nilai',
        'komentar',
        'waktu_kumpul'
    ];

    protected $useTimestamps = false;
}
