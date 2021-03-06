<?php

namespace Database\Seeders;

use App\Models\Product;
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
        $this->call(RoleSeeder::class);
        //$this->call(UserSeeder::class); //Usuarios
        $this->call(PharmacySeeder::class); //Farmacias
        $this->call(SubsidiarySeeder::class); //Sucursales
        $this->call(EmployeerSeeder::class); //Empleado analista, auxiliar farmacia y administrativo
        $this->call(CertificateSeeder::class); //Crea los certificados, que a su vez crea los farmaceuticos que a su vez crea los empleados
        $this->call(InternSeeder::class); //Empleado pasante
        $this->call(TutorMinorInterSeeder::class); //Crea un tutor representante, que a su vez crea un pasante menor de edad, que a su vez crea un pasante general que a su vez crea un empleado
        // $this->call(CertificateSeeder::class);
        $this->call(LaboratorySeeder::class); //Crea laboratorios, que a su vez crea a su usuario pertinente
        $this->call(MedicineSeeder::class); //Creando las medicinas
        $this->call(OrderSeeder::class); //Creando los pedidos
        $this->call(ProductSeeder::class); //Creando los productos para los pedidos
        $this->call(DebtsToPaySeeder::class); //Creando las cuentas por pagar
        $this->call(SubsidiaryStockSeeder::class); //Creando las medicinas propias de la sucursal
    }
}
