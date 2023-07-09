<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'f_name' => 'admin',
            'l_name' => 'admin',
            'gender' => 'Male',
            'phone_number' => '0652762026',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('Super-Admin');


    }
}
