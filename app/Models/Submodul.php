<?php

namespace App\Models;

use CodeIgniter\Model;

class Submodul extends Model
{
    protected $table            = 'submodul';
    protected $primaryKey       = 'submodul_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['submodul_id', 'modul_id', 'submodul_title', 'submodul_icon', 'submodul_description', 'submodul_content', 'submodul_lesson'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
