<?php namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id_ticket';
    protected $allowedFields = [
        'id_user',
        'jenis_layanan',
        'nomor_tiket',
        'status',
        'tanggal_pengajuan',
        'catatan'
    ];

    protected $useTimestamps = false;

    public function generateTicketNo()
    {
        $year = date('Y');
        $count = $this->where("YEAR(tanggal_pengajuan)", $year)->countAllResults(false);
        $num = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        return "KIR-{$year}-{$num}";
    }
}
