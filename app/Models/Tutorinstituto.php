<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorinstituto extends Model
{
    protected $table = "tutoresinstitutos";

    protected $fillable = [
        "nombre",
        "apellidos",
        "email"
    ];

    public function alumnos(){
        return $this->hasMany(Alumno::class, "tutoresinstituto_id");
    }
}
