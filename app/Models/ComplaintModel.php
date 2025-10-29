<?php namespace App\Models;

use CodeIgniter\Model;

class ComplaintModel extends Model
{
    protected $table = 'complaints';
    protected $primaryKey = 'id_complaint';
    protected $allowedFields = [
        'nama', 'telepon', 'jenis_keluhan', 'isi_keluhan', 'bukti_foto', 'status', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
