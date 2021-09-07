<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Intern;

class InternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Intern::factory(10)->create();
    }
}
