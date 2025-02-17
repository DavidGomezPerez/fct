<?php

namespace App\Http\Controllers;

use App\Models\Tutorempresa;
use App\Models\Tutorinstituto;
use Illuminate\Http\Request;

class TutorIesController extends Controller
{
    public function indexAll(){
        $tutoresIes = Tutorinstituto::paginate(6);

        return view("tutoresIes.listado-tutores-ies", compact("tutoresIes"));
    }

    public function showAnyadir(){
        return view("tutoresIes.anyadir-tutor-ies");
    }

    public function store(Request $request){
        $tutorIes = new Tutorinstituto();
        $tutorIes->nombre = $request->nombre;
        $tutorIes->apellidos = $request->apellidos;
        $tutorIes->email = $request->email;
        $tutorIes->save();

        return redirect()->route("indexTutoresIes")->with("success", "Tutor del IES dado de alta correctamente");
    }

    public function showEditar(Request $request){
        $tutorIes = Tutorinstituto::findOrFail($request->id);
    
        return view("tutoresIes.editar-tutor-ies", compact("tutorIes"));
    }

    public function update(Request $request){
        $tutorIes = Tutorinstituto::findOrFail($request->id);
        $tutorIes->nombre = $request->nombre;
        $tutorIes->apellidos = $request->apellidos;
        $tutorIes->email = $request->email;
        $tutorIes->save();

        return redirect()->route("indexTutoresIes")->with("success", "Tutor del IES actualizado correctamente");
    }

    public function destroy(Request $request){
        $tutorIes = Tutorinstituto::findOrFail($request->id);

        if($tutorIes){
            $tutorIes->delete();
            return back()->with("success", "Tutor del IES eliminado correctamente");
        }
    }

    public function showAlumnos(Request $request){
        $tutorIes = Tutorinstituto::findOrFail($request->id);

        $alumnos = $tutorIes->alumnos()->with(['tutoresEmpresas' => function ($query) {
            $query->with('empresa');
        }])->paginate(6);

        return view("tutoresIes.listado-alumnos-tutor-ies", compact("alumnos", "tutorIes"));
    }

    public function searchTutoresIes(Request $request){
        $search = $request->search;
        $tutoresIes = Tutorinstituto::whereRaw('LOWER(nombre) LIKE ?', ['%'.strtolower($search).'%'])
            ->orWhereRaw('LOWER(apellidos) LIKE ?', ['%'.strtolower($search).'%'])
            ->orWhereRaw('LOWER(email) LIKE ?', ['%'.strtolower($search).'%'])
            ->paginate(6);
        
        return view("tutoresIes.listado-tutores-ies", compact("tutoresIes"));
    }
}
