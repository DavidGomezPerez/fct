<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        "nombre",
        "apellidos",
        "NIF",
        "NUSS",
        "email",
        "telefono",
        "fecha_nacimiento",
        "tutoresinstitutos_id"
    ];

    public function tutorInstituto(){
        return $this->belongsTo(Tutorinstituto::class, "tutoresinstitutos_id");
    }

    public function tutoresEmpresas(){
        return $this->belongsToMany(TutorEmpresa::class, 'alumno_tutoresempresa', 'alumno_id', 'tutorempresa_id')
            ->withPivot('fecha_inicio', 'fecha_fin')
            ->withTimestamps();
    }
}
