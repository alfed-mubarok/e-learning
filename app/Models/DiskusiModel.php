<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskusiModel extends Model
{
    protected $table = 'tb_diskusi';
    protected $primaryKey = 'id_diskusi';

    protected $allowedFields = [
        'id_materi',
        'id_user',
        'role',
        'isi_pesan',
        'created_at'
    ];

    protected $useTimestamps = false;
}
