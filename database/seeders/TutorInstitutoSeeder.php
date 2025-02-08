<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutorinstituto;

class TutorInstitutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TutorInstituto::create([
            'nombre' => 'Carlos',
            'apellidos' => 'Pérez Fernández',
            'email' => 'carlos.perez@instituto.com',
        ]);

        TutorInstituto::create([
            'nombre' => 'Ana',
            'apellidos' => 'Gómez Rodríguez',
            'email' => 'ana.gomez@instituto.com',
        ]);

        TutorInstituto::create([
            'nombre' => 'Luis',
            'apellidos' => 'Martínez Ruiz',
            'email' => 'luis.martinez@instituto.com',
        ]);
    }
}
