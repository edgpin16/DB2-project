<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subsidiary;

class SubsidiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Subsidiary::factory(20)->create();
    }
}
