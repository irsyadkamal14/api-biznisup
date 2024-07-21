<?php

namespace App\Models;

use CodeIgniter\Model;

class Mentor extends Model
{
    protected $table            = 'mentor';
    protected $primaryKey       = 'mentor_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['mentor_id', 'name_mentor', 'email', 'contact', 'password', 'was_born', 'total_point', 'address', 'avatar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
