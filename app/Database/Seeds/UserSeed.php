<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeed extends Seeder
{
    public function run()
    {
        for($i=0 ;$i < 25;$i++){
            $faker = \Faker\Factory::create();
            $data =  [
                'name_user'  =>  $faker->name(),
                'email'      =>  $faker->email(),
                'contact'    =>  $faker->phoneNumber(12),
                'password'   =>  md5($faker->password()),
                // 'was_born'   =>  $faker->dateTime('Y_m_d'),
                'total_point'=>  $faker->numberBetween(50, 300),
                'address'    =>  $faker->address(),
                'avatar'     =>  $faker->imageUrl(480, 480, 'animals', true),
            ];
            $this->db->table('user')->insertBatch($data);
        }
    }
}
