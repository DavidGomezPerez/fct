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
        "tutoresinstituto_id"
    ];

    public function tutorInstituto(){
        return $this->belongsTo(Tutorinstituto::class, "tutoresinstituto_id");
    }

    public function tutoresEmpresas(){
        return $this->belongsToMany(Tutorempresa::class, 'alumno_tutoresempresa', 'alumno_id', 'tutoresempresa_id')
                    ->withPivot('fecha_inicio', 'fecha_fin')
                    ->withTimestamps();
    }
}
