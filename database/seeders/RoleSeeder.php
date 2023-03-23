<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       $role1 = Role::create(['name' => 'Admin']);
       $role2 = Role::create(['name' => 'Empleado']);

       Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.realizar'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.girar'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.ganador'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.finalizar'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.clientes.estado'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.exportar'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.importar'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.reporte.generar'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.edit'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.destroy'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.sorteos.show'])->syncRoles([$role1,$role2]);

       Permission::create(['name' => 'admin.clientes.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.clientes.index'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.clientes.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.clientes.show'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1]);
       Permission::create(['name' => 'admin.usuarios.update'])->syncRoles([$role1]);

       Permission::create(['name' => 'admin.etiquetas.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.etiquetas.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.etiquetas.store'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'admin.etiquetas.destroy'])->syncRoles([$role1,$role2]);

    }
}
