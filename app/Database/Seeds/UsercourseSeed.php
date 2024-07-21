<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsercourseSeed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 10;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'course_id'      =>  $faker->numberBetween(1, 3),
                'user_id'      =>  $faker->numberBetween(1, 15),
            ];
            $this->db->table('usercourse')->insertBatch($data);
        }
    }
}
