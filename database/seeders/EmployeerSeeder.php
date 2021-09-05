<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employeer;

class EmployeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Employeer::factory(60)->create();
    }
}
