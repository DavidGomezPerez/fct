<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Tutorempresa;
use Illuminate\Http\Request;

class TutorEmpresaController extends Controller
{

    public function indexAll(){
        $tutoresEmpresa = Tutorempresa::with("empresa")->paginate(6);

        return view("tutoresEmpresa.listado-tutores", compact("tutoresEmpresa"));
    }

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
        return redirect()->route("indexTutoresEmpresa")->with("success", "Tutor de empresa dado de alta correctamente");
    }

    public function showEditar(Request $request){
        $tutorEmpresa = Tutorempresa::with("empresa")->findOrFail($request->id);
        $empresas = Empresa::all();

        return view("tutoresEmpresa.editar-tutor-empresa", compact("tutorEmpresa", "empresas"));
    }

    public function update(Request $request){
        $tutorEmpresa = Tutorempresa::findOrFail($request->id);

        $tutorEmpresa->nombre = $request->nombre;
        $tutorEmpresa->apellidos = $request->apellidos;
        $tutorEmpresa->email = $request->email;
        $tutorEmpresa->empresa_id = $request->empresa_id;
        $tutorEmpresa->save();

        return redirect()->route("indexTutoresEmpresa")->with("success", "Tutor de empresa actualizado correctamente");
    }

    public function destroy(Request $request){
        $tutorEmpresa = Tutorempresa::findOrFail($request->id);

        if($tutorEmpresa){
            $tutorEmpresa->delete();
            return back()->with("success", "Tutor de empresa eliminado correctamente");
        }
    }

    public function showAlumnos(Request $request){
        $tutorEmpresa = Tutorempresa::findOrFail($request->id);
        $alumnos = $tutorEmpresa->alumnos()->paginate(6);

        return view("tutoresEmpresa.alumnos-tutor-empresa", compact("tutorEmpresa", "alumnos"));
    }
}
