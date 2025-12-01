<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'tb_mapel';
    protected $primaryKey = 'id_mapel';
    protected $allowedFields = ['id_mapel', 'nama_mapel'];
}
