<?php namespace App\Models;

use CodeIgniter\Model;

class ComplaintModel extends Model
{
    protected $table = 'complaints';              
    protected $primaryKey = 'id_complaint';       
    protected $allowedFields = [
        'id_user',
        'complaint_no',
        'name',
        'phone',
        'type',
        'message',
        'attachment_path',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;              
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function generateComplaintNo()
    {
        $year = date('Y');
        $count = $this->where('YEAR(created_at)', $year)->countAllResults(false);
        $num = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        return "KELUH-{$year}-{$num}";
    }

    public function getAllWithUser()
    {
        return $this->select('complaints.*, users.nama as user_name')
            ->join('users', 'users.id_user = complaints.id_user', 'left')
            ->orderBy('complaints.created_at', 'DESC')
            ->findAll();
    }

    public function findByNo($no)
    {
        return $this->where('complaint_no', $no)->first();
    }
}
