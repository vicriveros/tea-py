<?php

namespace Database\Seeders;

use App\Models\Enfermedades;
use App\Models\Aspecto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Nacionalidad;
use App\Models\Tratamiento;
use App\Models\Parentesco;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([RolesAndPermissionsSeeder::class]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        Persona::factory(50)->create();
        Parentesco::factory(5)->create();
        Nacionalidad::factory(10)->create();
        Tratamiento::factory(20)->create();
        Aspecto::factory(30)->create();
        Enfermedades::factory(30)->create();
    }
}
