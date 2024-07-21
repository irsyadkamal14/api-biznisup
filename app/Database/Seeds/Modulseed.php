<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Modulseed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 10;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'course_id'      =>  $faker->numberBetween(4, 4),
                'modul_title'    =>  $faker->sentence(2),
            ];
            $this->db->table('modul')->insertBatch($data);
        }
    }
}
