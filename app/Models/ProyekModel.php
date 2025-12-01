<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table = 'proyek_siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_proyek', 'gambar', 'link'];
    public function getAllProyek()
    {
        return $this->findAll();
    }
}
