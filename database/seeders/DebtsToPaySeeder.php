<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DebtsToPay;

class DebtsToPaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DebtsToPay::factory(40)->create();
    }
}
