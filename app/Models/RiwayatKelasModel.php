<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatKelasModel extends Model
{
    protected $table = 'riwayat_kelas';
    protected $primaryKey = 'id_riwayat';
    protected $allowedFields = ['id_siswa', 'kelas', 'semester', 'tahun_ajaran'];
}
