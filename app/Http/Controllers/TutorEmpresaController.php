<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Tutorempresa;
use Illuminate\Http\Request;

class TutorEmpresaController extends Controller
{
    public function showAnyadir(){
        $empresas = Empresa::all();

        return view("tutoresEmpresa.anyadir-tutor-empresa", compact("empresas"));
    }

    public function store(Request $request){
        $tutorEmpresa = new Tutorempresa();

        $tutorEmpresa->nombre = $request->nombre;
        $tutorEmpresa->apellidos = $request->apellidos;
        $tutorEmpresa->email = $request->email;
        $tutorEmpresa->empresa_id = $request->empresa_id;

        $tutorEmpresa->save();
        return back()->with("success", "Tutor de empresa dado de alta correctamente");
    }
}
