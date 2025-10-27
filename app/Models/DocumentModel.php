<?php

namespace App\Models;
use CodeIgniter\Model;

class DocumentModel extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id_doc';
    protected $allowedFields = [
        'id_ticket',
        'nama_dokumen',
        'tipe_dokumen',
        'path_file',
        'status_validasi',
        'keterangan',
        'uploaded_at'
    ];
    protected $useTimestamps = false;
}
