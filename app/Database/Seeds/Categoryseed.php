<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categoryseed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 6;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'category'       =>  $faker->sentence(1),
            ];
            $this->db->table('category')->insertBatch($data);
        }
    }
}
