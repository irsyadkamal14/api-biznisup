<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Reviewerseed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 30;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'user_id'        =>  $faker->numberBetween(1, 10),
                'course_id'      =>  $faker->numberBetween(1, 3),
                'comment_text'   =>  $faker->text(),
                'score'          =>  $faker->numberBetween(1, 5),
            ];
            $this->db->table('reviewer')->insertBatch($data);
        }
    }
}
