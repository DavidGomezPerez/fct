<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        "nombre",
        "localidad"
    ];

    public function tutoresEmpresas(){
        return $this->hasMany(Tutorempresa::class, "empresa_id");
    }
}
