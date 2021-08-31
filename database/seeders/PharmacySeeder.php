<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Pharmacy;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pharmacy::factory(6)->create();
    }
}
