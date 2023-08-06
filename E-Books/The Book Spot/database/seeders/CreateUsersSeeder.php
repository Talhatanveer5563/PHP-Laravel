<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin', 
               'email'=>'admin@gmail.com',
                'role'=>'1',
               'password'=> bcrypt('123456'),
               'phone' => '03002186506',
               'Date' => date('y/m/d'),
               'country' => 'pakistan',
               'city' => 'karachi',


            ],
       
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
