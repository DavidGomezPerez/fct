<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Tutorinstituto;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function indexAll(){
        $alumnos = Alumno::with(["tutorInstituto"])->paginate(env('PAG', 5));
        return view('alumnos.lista-alumnos', compact('alumnos'));
    }

    public function showAnyadir(){
        $tutoresIes = Tutorinstituto::all();
        return view("alumnos.anyadir-alumno", compact("tutoresIes"));
    }

    public function store(Request $request){
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->NIF = $request->NIF;
        $alumno->NUSS = $request->NUSS;
        $alumno->email = $request->email;
        $alumno->telefono = $request->telefono;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->tutoresinstitutos_id = $request->tutoresinstitutos_id;

        $alumno->save();
        return redirect()->route("indexAlumnos")->with("success", "Alumno dado de alta correctamente");
    }
}
