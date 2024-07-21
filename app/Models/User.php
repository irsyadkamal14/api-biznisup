<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['user_id', 'name_user', 'email', 'contact', 'password', 'was_born', 'total_point', 'address', 'avatar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';  
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAll(){
        $builder = $this->db->table('user');
        $builder->select('user.user_id, user.name_user, user.email, user.contact, user.total_point, user.avatar, course.course_id, course.title, course.description');
        $builder->join('usercourse', 'usercourse.user_id = user.user_id', 'left' );
        $builder->join('course', 'course.course_id = usercourse.course_id', 'left');
        $builder->orderBy('user.user_id');
        $builder->orderBy('course.course_id');

        // Eksekusi query
        $query = $builder->get();
        $results = $query->getResultArray();

        // Mengolah data menjadi nested array
        $users = [];
        foreach ($results as $row) {
            $user_id = $row['user_id'];
    
            if (!isset($users[$user_id])) {
                $users[$user_id] = [
                    'user_id' => $row['user_id'],
                    'name_user' => $row['name_user'],
                    'email' => $row['email'],
                    'contact' => $row['contact'],
                    'total_point' => $row['total_point'],
                    'avatar' => $row['avatar'],
                    'courses' => []
                ];
            }   
    
            // Cek apakah ada data user yang terkait
            if ($row['course_id'] !== null) {
                $users[$user_id]['courses'][] = [
                    'course_id' => $row['course_id'],
                    'title' => $row['title'],
                    'description' => $row['description']
                ];
            }
        }
    
        // Mengembalikan data sebagai JSON
        return array_values($users);
    }
}
