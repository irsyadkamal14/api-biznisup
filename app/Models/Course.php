<?php

namespace App\Models;

use CodeIgniter\Model;

class Course extends Model
{
    protected $table            = 'course';
    protected $primaryKey       = 'course_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['course_id', 'mentor_id', 'category_id', 'preview', 'title', 'price', 'description', 'thumb'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAll() {
        $builder = $this->db->table('course');
        $builder->select('course.course_id, course.title, course.price, course.description, course.thumb, course.created_at, course.updated_at, course.preview, mentor.name_mentor, mentor.email, mentor.avatar, user.user_id, outlinecourse.outlinecourse_id,  outlinecourse.outline_title, outlinecourse.outline_description, category.category_id, category.category');
        $builder->join('usercourse', 'usercourse.course_id = course.course_id', 'left');
        $builder->join('user', 'user.user_id = usercourse.user_id', 'left');
        $builder->join('mentor', 'mentor.mentor_id = course.mentor_id', 'left');
        $builder->join('category', 'category.category_id = course.category_id', 'left');
        $builder->join('outlinecourse', 'outlinecourse.course_id = course.course_id', 'left');
        $builder->orderBy('course.course_id');
        $builder->orderBy('user.user_id');
        
        // Execute query
        $query = $builder->get();
        $results = $query->getResultArray();
    
        // Process data into a nested array
        $courses = [];
        foreach ($results as $row) {
            $course_id = $row['course_id'];
    
            if (!isset($courses[$course_id])) {
                $courses[$course_id] = [
                    'course_id' => $row['course_id'],
                    'category' => $row['category'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'thumb' => $row['thumb'],
                    'preview' => $row['preview'],
                    'mentor' => [
                        'name' => $row['name_mentor'],
                        'email' => $row['email'],
                        'avatar' => $row['avatar']
                    ],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                    // 'outlines' => [],
                    // 'users' => []
                ];  
            }
        }
    
        // Return data as JSON
        return array_values($courses);
    }    

    public function getId($id) {
        $builder = $this->db->table('course');
        $builder->select('course.course_id, course.title, course.price, course.description, course.thumb, course.created_at, course.updated_at, course.preview, mentor.name_mentor, mentor.email, mentor.avatar, user.user_id, outlinecourse.outlinecourse_id,  outlinecourse.outline_title, outlinecourse.outline_description, category.category_id, category.category');
        $builder->join('usercourse',  'usercourse.course_id = course.course_id', 'left');
        $builder->join('user', 'user.user_id = usercourse.user_id', 'left');
        $builder->join('mentor', 'mentor.mentor_id = course.mentor_id', 'left');
        $builder->join('category', 'category.category_id = course.category_id', 'left');
        $builder->join('outlinecourse', 'outlinecourse.course_id = course.course_id', 'left');
        $builder->where('course.course_id', $id);
        $builder->orderBy('course.course_id');
        $builder->orderBy('user.user_id');
        
        // Eksekusi query
        $query = $builder->get();
        $results = $query->getResultArray();

        // Mengolah data menjadi nested array
        $courses = [];
        foreach ($results as $row) {
            $course_id = $row['course_id'];

            if (!isset($courses[$course_id])) {
                $courses[$course_id] = [
                    'course_id' => $row['course_id'],
                    'category' => $row['category'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'thumb' => $row['thumb'],
                    'preview' => $row['preview'],
                    'mentor' => [
                        'name' => $row['name_mentor'],
                        'email' => $row['email'],
                        'avatar' => $row['avatar']
                    ],
                    'outlines' => [],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                    // 'users' => []
                ];
            }   

             // Check if outline data exists and is unique
            if ($row['outlinecourse_id'] !== null) {
                $outline_exists = false;
                foreach ($courses[$course_id]['outlines'] as $outline) {
                    if ($outline['outlinecourse_id'] == $row['outlinecourse_id']) {
                        $outline_exists = true;
                        break;
                    }
                }
                if (!$outline_exists) {
                    $courses[$course_id]['outlines'][] = [
                        'outlinecourse_id' => $row['outlinecourse_id'],
                        'outline_title' => $row['outline_title'],
                        'outline_description' => $row['outline_description'],
                    ];
                }
            }

            // Cek apakah ada data user yang terkait
            // if ($row['user_id'] !== null) {
            //     $courses[$course_id]['users'][] = [
            //         'user_id' => $row['user_id'],
            //         'name_user' => $row['name_user'],
            //         'email' => $row['email'],
            //         'contact' => $row['contact'],
            //         'address' => $row['address'],
            //         'total_point' => $row['total_point']
            //     ];
            // }

            // Check if user data exists and is unique
            // if ($row['user_id'] !== null) {
            //     $user_exists = false;
            //     foreach ($courses[$course_id]['users'] as $user) {
            //         if ($user['user_id'] == $row['user_id']) {
            //             $user_exists = true;
            //             break;
            //         }
            //     }
            //     if (!$user_exists) {
            //         $courses[$course_id]['users'][] = [
            //             'user_id' => $row['user_id'],
            //             'name_user' => $row['name_user'],
            //             'email' => $row['email'],
            //             'contact' => $row['contact'],
            //             'address' => $row['address'],
            //             'total_point' => $row['total_point']
            //         ];
            //     }
            // }
        }

        // Mengembalikan data sebagai JSON
        return array_values($courses);
    }

   

}
