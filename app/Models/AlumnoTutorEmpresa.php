<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoTutorEmpresa extends Model
{

    protected $table = "alumno_tutoresempresa";

    protected $fillable = [
        "alumno_id",
        "tutoresempresa_id",
        "fecha_inicio",
        "fecha_fin"
    ];

    public function alumno(){
        return $this->belongsTo(Alumno::class, "alumno_id");
    }

    public function tutorempresa(){
        return $this->belongsTo(Tutorempresa::class, "tutoresempresa_id");
    }
}