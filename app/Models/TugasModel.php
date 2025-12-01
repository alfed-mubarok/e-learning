<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table = 'tb_tugas';
    protected $primaryKey = 'id_tugas';

    protected $allowedFields = [
        'id_materi',
        'headline',
        'deskripsi',
        'deadline',
        'kelas_target',
        'tahun_target',
        'semester',
        'file_pendukung',
        'created_at'
    ];

    protected $useTimestamps = false;
}
