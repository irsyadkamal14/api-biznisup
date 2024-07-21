<?php

namespace App\Models;

use CodeIgniter\Model;

class UserCourse extends Model
{
    protected $table            = 'usercourse';
    protected $primaryKey       = 'usercourse_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['usercourse_id', 'course_id', 'user_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}