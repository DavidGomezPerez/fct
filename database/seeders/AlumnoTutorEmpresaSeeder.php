<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumnoTutorEmpresa;

class AlumnoTutorEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlumnoTutorEmpresa::create([
            'alumno_id' => 1,
            'tutoresempresa_id' => 1,
            'fecha_inicio' => '2023-06-01',
            'fecha_fin' => '2023-09-01',
        ]);

        AlumnoTutorEmpresa::create([
            'alumno_id' => 2,
            'tutoresempresa_id' => 2,
            'fecha_inicio' => '2023-07-15',
            'fecha_fin' => '2023-10-15',
        ]);

        AlumnoTutorEmpresa::create([
            'alumno_id' => 3,
            'tutoresempresa_id' => 3,
            'fecha_inicio' => '2023-05-20',
            'fecha_fin' => '2023-08-20',
        ]);
    }
}
