<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'neiramon@hotmail.com',
            'password'=> Hash::make('123456'),
            'first_name'=>'Neira',
            'last_name'=>'Moncada',
            'address'=>'Barrio Obrero',
            'phone'=>'04149775101',
            'role_id'=>1,
            'birthday'=>date('Y-m-d', strtotime('1964-02-27'))
        ]);
    }
}
