<?php

namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'slug', 'isi', 'gambar', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) && !empty($model->judul)) {
                $model->slug = url_title($model->judul, '-', true);
            }
        });
    }
}
