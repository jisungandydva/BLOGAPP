<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id';

   protected $allowedFields = [
    'title',
    'slug',
    'excerpt',
    'content',
    'image',
    'author',
    'upload_at'  // tambahkan ini
];


    protected $useTimestamps = true; // otomatis mengisi created_at & updated_at
}
