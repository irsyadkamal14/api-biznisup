<?php

namespace App\Models;

use CodeIgniter\Model;

class Softskill extends Model
{
    protected $table            = 'softskill';
    protected $primaryKey       = 'softskill_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['softskill_id', 'course_id','title'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getId($id) {
        $builder = $this->db->table('softskill');
        $builder->select('softskill.title');
        $builder->where('softskill.course_id', $id);
        $builder->orderBy('softskill.softskill_id');
        
        // Eksekusi query
        $query = $builder->get();
        return $query->getResultArray();
    }
}
