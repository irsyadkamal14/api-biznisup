<?php

namespace App\Models;

use CodeIgniter\Model;

class Hardskill extends Model
{
    protected $table            = 'hardskill';
    protected $primaryKey       = 'hardskill_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['hardskill_id', 'course_id','title'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getId($id) {
        $builder = $this->db->table('hardskill');
        $builder->select('hardskill.title', 'hardskill.course_id');
        $builder->where('hardskill.course_id', $id);
        $builder->orderBy('hardskill.hardskill_id');
        
        // Eksekusi query
        $query = $builder->get();
        return $query->getResultArray();
    }

    
}
