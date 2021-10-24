<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\SubsidiaryStock;

class SubsidiaryStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SubsidiaryStock::factory(60)->create();
    }
}
