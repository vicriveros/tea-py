<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** Lista de Permisos */        
        Permission::create(['name' => 'crear paciente']);
        Permission::create(['name' => 'editar paciente']);
        Permission::create(['name' => 'eliminar paciente']);
        Permission::create(['name' => 'listar paciente']);

        Permission::create(['name' => 'manejar configuraciones']);
        Permission::create(['name' => 'manejar usuarios']);
        Permission::create(['name' => 'manejar enfermedades']);
        Permission::create(['name' => 'manejar tratamientos']);
        Permission::create(['name' => 'manejar aspectos']);
        Permission::create(['name' => 'manejar conductas']);


        /** Lista de Roles */
        $adminRole = Role::create(['name' => 'Administrador']);
        $pacienteRole = Role::create(['name' => 'Paciente']);
        $profesionalRole = Role::create(['name' => 'Profesional']);
        $staffRole = Role::create(['name' => 'Staff']);

        /** Asignar Permisos a Roles */
        $adminRole->givePermissionTo(Permission::all());
        $pacienteRole->givePermissionTo(['crear paciente', 'editar paciente']);
        $profesionalRole->givePermissionTo([
            'listar paciente', 
            'editar paciente', 
            'manejar configuraciones',
            'manejar enfermedades', 
            'manejar tratamientos', 
            'manejar aspectos',
            'manejar conductas'
        ]);
        $staffRole->givePermissionTo(['listar paciente', 'editar paciente', 'manejar configuraciones', 'manejar usuarios']);

        /** Crear Super Admin */
        $adminUser = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('vradmin1')
        ]);
        $adminUser->assignRole('Administrador');
    }
}
