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

    public function showAlumnos(Request $request){
        $tutorIes = Tutorinstituto::findOrFail($request->id);

        $alumnos = $tutorIes->alumnos()->with(['tutoresEmpresas' => function ($query) {
            $query->with('empresa');
        }])->paginate(6);

        return view("tutoresIes.listado-alumnos-tutor-ies", compact("alumnos", "tutorIes"));
    }

}
