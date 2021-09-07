<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Certificate;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Certificate::factory(10)->create();
    }
}
