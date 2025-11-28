<?php

namespace App\Models;

use CodeIgniter\Model;

class SosmedModel extends Model
{
    protected $table            = 'team_sosmed';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'team_id',
        'email',
        'instagram_username',
        'tiktok_username'
    ];

    protected $useTimestamps = true;
}
