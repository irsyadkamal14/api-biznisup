<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OutlineSeed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 5;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'course_id'      =>  $faker->numberBetween(2, 2),
                'title'          =>  $faker->sentence(3),
                'description'    =>  $faker->text(),
            ];
            $this->db->table('outlinecourse')->insertBatch($data);
        }
    }
}
