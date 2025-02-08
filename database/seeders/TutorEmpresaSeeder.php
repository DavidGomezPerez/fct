<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutorempresa;

class TutorEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TutorEmpresa::create([
            'nombre' => 'Juan',
            'apellidos' => 'Ramírez Díaz',
            'email' => 'juan.ramirez@techsolutions.com',
            'empresa_id' => 1,
        ]);

        TutorEmpresa::create([
            'nombre' => 'Laura',
            'apellidos' => 'González Martín',
            'email' => 'laura.gonzalez@innovativelabs.com',
            'empresa_id' => 2,
        ]);

        TutorEmpresa::create([
            'nombre' => 'Ricardo',
            'apellidos' => 'Fernández Pérez',
            'email' => 'ricardo.fernandez@globalindustries.com',
            'empresa_id' => 3,
        ]);
    }
}
