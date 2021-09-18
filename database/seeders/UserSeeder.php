<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Pharmacy;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'email' => 'edgardo.pinto16@gmail.com',
            'password' => bcrypt('futbol1414'),
        ])->assignRole('pharmacy_admin');

        User::create([
            'email' => 'edgardo.pinto.activate@gmail.com',
            'password' => bcrypt('futbol1414'),
        ])->assignRole('laboratory_admin');

    }
}
