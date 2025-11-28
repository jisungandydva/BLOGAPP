<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillsModel extends Model
{
    protected $table = 'skills';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'team_id',
        'skill_name',
        'skill_level',
        'created_at',
        'updated_at'
    ];
}
