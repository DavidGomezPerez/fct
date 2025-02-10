<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empresa;
use App\Models\Tutorempresa;
use App\Models\Tutorinstituto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $alumnos = Alumno::count();
        $empresas = Empresa::count();
        $tutoresIes = Tutorinstituto::count();
        $tutoresEmpresa = Tutorempresa::count();

        return view("index", compact("alumnos", "empresas", "tutoresIes", "tutoresEmpresa"));
    }
}
