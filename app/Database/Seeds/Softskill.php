<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Softskill extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 6;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'course_id'      =>  $faker->numberBetween(3, 3),
                'title'          =>  $faker->sentence(1),
            ];
            $this->db->table('softskill')->insertBatch($data);
        }
    }
}
