<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table      = 'tb_materi';
    protected $primaryKey = 'id_materi';

    protected $allowedFields = [
        'id_guru',
        'id_mapel',
        'nomor_materi',
        'judul',
        'tahun_target',
        'kelas',
        'semester',
        'deskripsi',
        'video_link',
        'video_file',
        'gambar_json',
        'file_materi',
        'created_at'
    ];

    protected $useTimestamps = false;
}
