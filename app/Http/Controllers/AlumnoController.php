<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\AlumnoTutorEmpresa;
use App\Models\Tutorempresa;
use App\Models\Tutorinstituto;
use App\Rules\ValidarNUSS;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function indexAll(){
        $alumnos = Alumno::with(["tutorInstituto"])->paginate(6);
        return view('alumnos.lista-alumnos', compact('alumnos'));
    }

    public function searchAlumnos(Request $request){
        $search = $request->search;
        $alumnos = Alumno::whereRaw('LOWER(nombre) LIKE ?', ['%'.strtolower($search).'%'])
            ->orWhereRaw('LOWER(apellidos) LIKE ?', ['%'.strtolower($search).'%'])
            ->orWhereRaw('LOWER(NIF) LIKE ?', ['%'.strtolower($search).'%'])
            ->orWhereRaw('NUSS LIKE ?', ['%'.$search.'%'])
            ->orWhereRaw('LOWER(email) LIKE ?', ['%'.strtolower($search).'%'])
            ->orWhereRaw('telefono LIKE ?', ['%'.$search.'%'])
            ->paginate(6);

        // Retornar la vista con los alumnos filtrados
        return view('alumnos.lista-alumnos', compact('alumnos'));
    }


    public function showAnyadir(){
        $tutoresIes = Tutorinstituto::all();
        return view("alumnos.anyadir-alumno", compact("tutoresIes"));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'string|max:255',
            'apellidos' => 'string|max:255',
            'NIF' => 'string|max:9|regex:/^[0-9]{8}[A-Z]$/',
            'telefono' => 'string|max:15',
            'NUSS' => ['required', 'string', new ValidarNUSS],
        ]);

        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->NIF = $request->NIF;
        $alumno->NUSS = $request->NUSS;
        $alumno->email = $request->email;
        $alumno->telefono = $request->telefono;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->tutoresinstituto_id = $request->tutoresinstituto_id;

        $alumno->save();
        return redirect()->route("indexAlumnos")->with("success", "Alumno dado de alta correctamente");
    }

    public function showEditar(Request $request){
        $alumno = Alumno::with(["tutorInstituto"])->findOrFail($request->id);
        $tutoresIes = Tutorinstituto::all();

        return view("alumnos.editar-alumno", compact("alumno", "tutoresIes"));
    }

    public function update(Request $request){
        $request->validate([
            'nombre' => 'string|max:255',
            'apellidos' => 'string|max:255',
            'NIF' => 'string|max:9|regex:/^[0-9]{8}[A-Z]$/',
            'telefono' => 'string|max:15',
            'NUSS' => ['required', 'string', new ValidarNUSS],
        ]);

        $alumno = Alumno::findOrFail($request->id);
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->NIF = $request->NIF;
        $alumno->NUSS = $request->NUSS;
        $alumno->email = $request->email;
        $alumno->telefono = $request->telefono;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->tutoresinstitutos_id = $request->tutoresinstitutos_id;

        $alumno->save();
        return redirect()->route("indexAlumnos")->with("success", "Alumno editado correctamente");
    }

    public function destroy(Request $request){
        $alumno = Alumno::findOrFail($request->id);

        if($alumno){
            $alumno->delete();
            return redirect()->route("indexAlumnos")->with("success", "Alumno eliminado correctamente");
        }
    }

    public function showAsignarTutorEmpresa(){
        $alumnos = Alumno::all();
        $tutoresEmpresa = Tutorempresa::all();

        return view("alumnos.asignar-tutor-empresa", compact("alumnos", "tutoresEmpresa"));
    }

    public function asignarTutorEmpresa(Request $request){
        $asignacion = new AlumnoTutorEmpresa();

        $asignacion->alumno_id = $request->alumno_id;
        $asignacion->tutoresempresa_id = $request->tutoresempresa_id;
        $asignacion->fecha_inicio = $request->fecha_inicio;
        $asignacion->fecha_fin = $request->fecha_fin;

        $asignacion->save();
        return back()->with("success", "Tutor de empresa asignado al alumno correctamente");
    }
}
