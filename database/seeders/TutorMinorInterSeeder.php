<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TutorMinorInter;

class TutorMinorInterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TutorMinorInter::factory(10)->create();
    }
}
