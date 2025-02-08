<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empresa::create([
            "nombre" => "NTT Data",
            "localidad" => "Murcia"
        ]);

        Empresa::create([
            "nombre" => "Intuya",
            "localidad" => "Alcantarilla"
        ]);

        Empresa::create([
            'nombre' => 'Innovative Labs',
            'localidad' => 'Barcelona',
        ]);
    }
}
