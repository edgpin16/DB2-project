<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class); //Usuarios
        $this->call(PharmacySeeder::class); //Farmacias
        $this->call(SubsidiarySeeder::class); //Sucursales
        $this->call(EmployeerSeeder::class); //Empleado analista, auxiliar farmacia y administrativo
        $this->call(PharmaceutistSeeder::class); //Empleado farmaceutico
        $this->call(InternSeeder::class); //Empleado pasante
        // $this->call(CertificateSeeder::class);
    }
}
