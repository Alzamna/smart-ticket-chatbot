<?php

namespace App\Models;
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
}
