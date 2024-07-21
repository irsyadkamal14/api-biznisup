<?php

namespace App\Models;

use CodeIgniter\Model;

class OutlineCourse extends Model
{
    protected $table            = 'outlinecourse';
    protected $primaryKey       = 'outlinecourse_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['outlinecourse_id', 'course_id', 'title', 'description'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
