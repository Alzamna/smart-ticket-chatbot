<?php namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id_service';
    protected $allowedFields = ['nama_layanan', 'deskripsi', 'biaya', 'created_at', 'updated_at',];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
