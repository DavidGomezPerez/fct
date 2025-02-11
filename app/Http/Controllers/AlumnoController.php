<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
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
        // Iniciar la consulta
        $query = Alumno::query();

        // Si hay algo en el campo de búsqueda
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            // Filtrar por todos los campos relevantes
            $query->where(function ($query) use ($search) {
                $query->whereRaw('nombre', 'like', "%{$search}%")
                    ->orWhereRaw('apellidos', 'like', "%{$search}%")
                    ->orWhereRaw('NIF', 'like', "%{$search}%")
                    ->orWhereRaw('NUSS', 'like', "%{$search}%")
                    ->orWhereRaw('email', 'like', "%{$search}%")
                    ->orWhereRaw('telefono', 'like', "%{$search}%")
                    ->orWhereRaw('fecha_nacimiento', 'like', "%{$search}%");
            });
        }

        // Obtener los resultados con paginación
        $alumnos = $query->paginate(6); // Aquí puedes cambiar el número de registros por página

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
        $alumno->tutoresinstitutos_id = $request->tutoresinstitutos_id;

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
}
