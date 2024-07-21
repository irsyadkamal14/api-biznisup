<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Submodulseed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 3;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'modul_id'              =>  $faker->numberBetween(25, 25),
                'submodul_title'        =>  $faker->sentence(2),
                'submodul_description'  =>  $faker->sentence(8),
                'submodul_content'      =>  'https://www.youtube.com/watch?v=p0CiKKzsnsU'

            ];
            $this->db->table('submodul')->insertBatch($data);
        }
    }
}
