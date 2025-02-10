<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function indexAll(){
        $alumnos = Alumno::with(["tutorInstituto"])->paginate(env('PAG', 5));
        return view('alumnos.lista-alumnos', compact('alumnos'));
    }
}
