<?php namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id_vehicle';
    protected $allowedFields = [
        'id_user', 'plat_nomor', 'jenis_kendaraan', 'merk', 'tahun_pembuatan', 'warna', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
