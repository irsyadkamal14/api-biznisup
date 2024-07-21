<?php

namespace App\Models;

use CodeIgniter\Model;

class Reviewer extends Model
{
    protected $table            = 'reviewer';
    protected $primaryKey       = 'reviewer_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['reviewer_id', 'user_id', 'course_id', 'comment_text', 'score'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAll() {
        $builder = $this->db->table('reviewer');
        $builder->select('reviewer.reviewer_id, reviewer.user_id, reviewer.course_id, reviewer.comment_text, reviewer.score, user.name_user, user.email, user.avatar');
        $builder->join('user', 'user.user_id = reviewer.user_id', 'left');
        $builder->orderBy('reviewer.reviewer_id');
        
        // Execute query
        $query = $builder->get();
        $results = $query->getResultArray();
    
        // Process data into a structured array
        $reviewers = [];
        foreach ($results as $row) {
            $reviewers[] = [
                'reviewer_id'   => $row['reviewer_id'],
                'course_id'     => $row['course_id'],
                'comment_text'  => $row['comment_text'],
                'score'         => $row['score'],
                'user' => [
                    'name_user' => $row['name_user'],
                    'email'     => $row['email'],
                    'avatar'    => $row['avatar']
                ]
            ];
        }
    
        // Return data as JSON
        return array_values($reviewers);
    }

    public function getId($id) {
        $builder = $this->db->table('reviewer');
        $builder->select('reviewer.reviewer_id, reviewer.user_id, reviewer.course_id, reviewer.comment_text, reviewer.score, user.name_user, user.email, user.avatar');
        $builder->join('user', 'user.user_id = reviewer.user_id', 'left');
        $builder->where('reviewer.course_id', $id);
        $builder->orderBy('reviewer.reviewer_id');
        
        // Execute query
        $query = $builder->get();
        $results = $query->getResultArray();
    
        // Process data into a structured array
        $reviewers = [];
        foreach ($results as $row) {
            $reviewers[] = [
                'course_id'     => $row['course_id'],
                'reviewer_id'   => $row['reviewer_id'],
                'comment_text'  => $row['comment_text'],
                'score'         => $row['score'],
                'user' => [
                    'name_user' => $row['name_user'],
                    'email'     => $row['email'],
                    'avatar'    => $row['avatar']
                ]
            ];
        }
    
        // Return data as JSON
        return $reviewers;
    }
      
}
