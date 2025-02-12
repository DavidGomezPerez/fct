<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumno::create([
            "nombre" => "Juan",
            "apellidos" => "Pérez",
            "NIF" => "12345678A",
            "NUSS" => "123456789",
            "email" => "juan.perez@gmail.com",
            "telefono" => "657438299",
            "fecha_nacimiento" => "2003-04-10",
            "tutoresinstituto_id" => 1,
        ]);

        Alumno::create([
            'nombre' => 'Marta',
            'apellidos' => 'Sánchez Pérez',
            'NIF' => '98765432B',
            'NUSS' => '987654321',
            'email' => 'marta.sanchez@alumno.com',
            'telefono' => '623456789',
            'fecha_nacimiento' => '2002-06-15',
            'tutoresinstituto_id' => 2,
        ]);

        Alumno::create([
            'nombre' => 'Pedro',
            'apellidos' => 'López Gómez',
            'NIF' => '11223344C',
            'NUSS' => '112233445',
            'email' => 'pedro.lopez@alumno.com',
            'telefono' => '634567890',
            'fecha_nacimiento' => '2001-02-20',
            'tutoresinstituto_id' => 3,
        ]);
    }
}
