<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'tb_guru';
    protected $primaryKey = 'id_guru';
    protected $allowedFields = ['id_guru', 'nama_guru', 'jabatan', 'foto'];
    public $timestamps = false;
}
