<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tb_login';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['id_user', 'password', 'status'];

    protected $useTimestamps = false;

    public function getUserById($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }
}
