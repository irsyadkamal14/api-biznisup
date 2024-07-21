<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 10;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'mentor_id'      =>  $faker->numberBetween(1, 10),
                'category_id'    =>  $faker->numberBetween(1, 4),
                'title'          =>  $faker->sentence(4),
                'description'    =>  $faker->text(),
                'price'          =>  $faker->numberBetween(150000, 700000),
                'thumb'          =>  $faker->imageUrl(680, 380, 'animals', true),
                'preview'        => 'https://www.youtube.com/watch?v=p0CiKKzsnsU'
            ];
            $this->db->table('course')->insertBatch($data);
        }
    }
}
