<?php

namespace App\Http\Controllers;

use App\Models\Tutorinstituto;
use Illuminate\Http\Request;

class TutorIesController extends Controller
{
    public function indexAll(){
        $tutoresIes = Tutorinstituto::paginate(6);

        return view("tutoresIes.listado-tutores-ies", compact("tutoresIes"));
    }
}
