<?php

namespace App\Models;

use CodeIgniter\Model;

class Modul extends Model
{
    protected $table            = 'modul';
    protected $primaryKey       = 'modul_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['modul_id', 'course_id', 'modul_title'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAll() {
        $builder = $this->db->table('modul');
        $builder->select('modul.modul_id, modul.course_id, modul.modul_title, submodul.submodul_id, submodul.submodul_title, submodul.submodul_icon, submodul.submodul_description, submodul.submodul_content, submodul.submodul_lesson');
        $builder->join('submodul', 'submodul.modul_id = modul.modul_id', 'left');
        $builder->orderBy('modul.modul_id');
    
        // Execute query
        $query = $builder->get();
        $results = $query->getResultArray();
    
        // Process data into a nested array
        $moduls = [];
        foreach ($results as $row) {
            $modul_id = $row['modul_id'];
    
            if (!isset($moduls[$modul_id])) {
                $moduls[$modul_id] = [
                    'modul_id'      => $row['modul_id'],
                    'modul_title'   => $row['modul_title'],
                    'submoduls'     => [],
                ];
            }
    
            // Check if submodule data exists
            if ($row['submodul_id'] !== null) {
                // Add submodule data to the respective module
                $moduls[$modul_id]['submoduls'][] = [
                    'submodul_id'           => $row['submodul_id'],
                    'submodul_title'        => $row['submodul_title'],
                    'submodul_icon'         => $row['submodul_icon'],
                    'submodul_description'  => $row['submodul_description'],
                    'submodul_content'      => $row['submodul_content'],
                    'submodul_lesson'       => $row['submodul_lesson'],
                ];
            }
        }
    
        // Return data as JSON
        return array_values($moduls);
    }
    

    public function getId($id) {
        $builder = $this->db->table('modul');
        $builder->select('modul.modul_id, modul.course_id, modul.modul_title, submodul.submodul_id, submodul.submodul_title, submodul.submodul_icon, submodul.submodul_description, submodul.submodul_content, submodul.submodul_lesson');
        $builder->join('submodul', 'submodul.modul_id = modul.modul_id', 'left');
        $builder->where('modul.course_id', $id);
        $builder->orderBy('modul.modul_id');
        
        // Execute query
        $query = $builder->get();
        $results = $query->getResultArray();
    
        // Process data into a nested array
        $moduls = [];
        foreach ($results as $row) {
            $modul_id = $row['modul_id'];
    
            if (!isset($moduls[$modul_id])) {
                $moduls[$modul_id] = [
                    'modul_id'      => $row['modul_id'],
                    'modul_title'   => $row['modul_title'],
                    'submoduls'     => [],
                ];
            }
    
            // Check if submodule data exists
            if ($row['submodul_id'] !== null) {
                $moduls[$modul_id]['submoduls'][] = [
                    'submodul_id'           => $row['submodul_id'],
                    'submodul_title'        => $row['submodul_title'],
                    'submodul_icon'         => $row['submodul_icon'],
                    'submodul_description'  => $row['submodul_description'],
                    'submodul_content'      => $row['submodul_content'],
                    'submodul_lesson'       => $row['submodul_lesson'],
                ];
            }
        }
    
        // Ensure all modules have a 'submoduls' key, even if empty
        foreach ($moduls as $modul_id => $modul) {
            if (!isset($moduls[$modul_id]['submoduls'])) {
                $moduls[$modul_id]['submoduls'] = [];
            }
        }
    
        // Return data as JSON
        return array_values($moduls);
    }
    

}
