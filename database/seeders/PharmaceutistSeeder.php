<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Pharmaceutist;

class PharmaceutistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pharmaceutist::factory(10)->create();
    }
}
