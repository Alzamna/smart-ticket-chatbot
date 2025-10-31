<?php

namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'deskripsi', 'slug', 'isi', 'gambar'];
    protected $useTimestamps = true;

}
