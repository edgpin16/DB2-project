<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creando los 2 roles de la aplicacion
        $role1 = Role::create(['name' => 'pharmacy_admin']);
        $role2 = Role::create(['name' => 'laboratory_admin']);

        //Permisos para ver el home
        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);

        //Permisos para manipular las sucursales
        Permission::create(['name' => 'subsidiary.index'])->assignRole($role1);
        Permission::create(['name' => 'subsidiary.store'])->assignRole($role1);
        Permission::create(['name' => 'subsidiary.create'])->assignRole($role1);
        Permission::create(['name' => 'subsidiary.show'])->assignRole($role1);
        Permission::create(['name' => 'subsidiary.update'])->assignRole($role1);
        Permission::create(['name' => 'subsidiary.destroy'])->assignRole($role1);
        Permission::create(['name' => 'subsidiary.edit'])->assignRole($role1);

        //Permisos para validar los datos de la categoria y sucursal elegidas
        Permission::create(['name' => 'selectSubsidiary'])->assignRole($role1);
        Permission::create(['name' => 'validateDataSubsidiaryCategory'])->assignRole($role1); //POST

        //Permisos para manipular los empleados generales
        Permission::create(['name' => 'empleado.create'])->assignRole($role1);
        Permission::create(['name' => 'empleado.index'])->assignRole($role1);
        Permission::create(['name' => 'employeer.store'])->assignRole($role1);
        Permission::create(['name' => 'employeer.show'])->assignRole($role1);
        Permission::create(['name' => 'employeer.update'])->assignRole($role1);
        Permission::create(['name' => 'employeer.destroy'])->assignRole($role1);
        Permission::create(['name' => 'employeer.edit'])->assignRole($role1);

        //Permisos para manipular los empleados farmaceuticos
        Permission::create(['name' => 'employeerPharmaceutist.store'])->assignRole($role1);
        Permission::create(['name' => 'employeerPharmaceutist.create'])->assignRole($role1);
        Permission::create(['name' => 'employeerPharmaceutist.index'])->assignRole($role1);
        Permission::create(['name' => 'employeerPharmaceutist.update'])->assignRole($role1);
        Permission::create(['name' => 'employeerPharmaceutist.destroy'])->assignRole($role1);
        Permission::create(['name' => 'employeerPharmaceutist.edit'])->assignRole($role1);

        //Permisos para manipular los empleados pasantes
        Permission::create(['name' => 'employeerIntern.store'])->assignRole($role1);
        Permission::create(['name' => 'employeerIntern.create'])->assignRole($role1);
        Permission::create(['name' => 'employeerIntern.index'])->assignRole($role1);
        Permission::create(['name' => 'employeerIntern.update'])->assignRole($role1);
        Permission::create(['name' => 'employeerIntern.destroy'])->assignRole($role1);
        Permission::create(['name' => 'employeerIntern.edit'])->assignRole($role1);

        //Permisos para ver y actualizar datos del laboratorio
        Permission::create(['name' => 'laboratory.edit'])->assignRole($role2);
        Permission::create(['name' => 'laboratory.update'])->assignRole($role2);


    }
}
