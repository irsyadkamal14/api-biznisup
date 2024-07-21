<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MentorSeed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 6;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'name_mentor'=>  $faker->name(),
                'email'      =>  $faker->email(),
                'contact'    =>  $faker->phoneNumber(12),
                'password'   =>  md5($faker->password()),
                'total_point'=>  $faker->numberBetween(50, 300),
                'address'    =>  $faker->address(),
                'avatar'     =>  $faker->imageUrl(680, 380, 'animals', true),
            ];
            $this->db->table('mentor')->insertBatch($data);
        }
    }
}
