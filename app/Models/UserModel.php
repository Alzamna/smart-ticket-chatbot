<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'nik', 'email', 'no_hp', 'created_at'];
    protected $useTimestamps = false;
}
