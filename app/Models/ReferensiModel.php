<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferensiModel extends Model
{
    protected $table = 'tb_referensi';
    protected $primaryKey = 'id_referensi';
    protected $allowedFields = ['id_materi', 'nama_referensi', 'link', 'file', 'created_at'];
}
