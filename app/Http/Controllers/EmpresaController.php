<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function indexAll(){
        $empresas = Empresa::paginate(6);

        return view("empresas.listado-empresas", compact("empresas"));
    }

    public function indexTutores(Request $request){
        $empresa = Empresa::findOrFail($request->id);
        $tutoresEmpresa = $empresa->tutoresEmpresas()->paginate(6);

        return view("tutoresEmpresa.listado-tutores-empresa", compact("tutoresEmpresa", "empresa"));
    }

    public function showAnyadirEmpresa(){
        return view("empresas.anyadir-empresa");
    }

    public function store(Request $request){
        $empresa = new Empresa();

        $request->validate([
            "nombre" => "max:255",
            "localidad" => "max:255",
        ]);

        $empresa->nombre = $request->nombre;
        $empresa->localidad = $request->localidad;

        $empresa->save();
        return redirect()->route("indexEmpresas")->with("success", "Empresa dada de alta correctamente");
    }

    public function showEditar(Request $request){
        $empresa = Empresa::findOrFail($request->id);

        return view("empresas.editar-empresa", compact("empresa"));
    }

    public function update(Request $request){
        $empresa = Empresa::findOrFail($request->id);

        $request->validate([
            "nombre" => "max:255",
            "localidad" => "max:255",
        ]);

        $empresa->nombre = $request->nombre;
        $empresa->localidad = $request->localidad;

        $empresa->save();
        return redirect()->route("indexEmpresas")->with("success", "Empresa actualizada correctamente");
    }

    public function destroy(Request $request){
        $empresa = Empresa::findOrFail($request->id);

        if($empresa){
            $empresa->delete();
            return back()->with("success", "Empresa eliminada correctamente");
        }
    }

    public function searchEmpresas(Request $request){
        $search = $request->search;
        $empresas = Empresa::whereRaw('LOWER(nombre) LIKE ?', ['%'.strtolower($search).'%'])
            ->orWhereRaw('LOWER(localidad) LIKE ?', ['%'.strtolower($search).'%'])
            ->paginate(6);

        return view("empresas.listado-empresas", compact("empresas"));
    }
}
