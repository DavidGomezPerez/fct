<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ValidarSolapamientoPracticas implements ValidationRule
{
    private $alumno_id;
    private $fecha_inicio;
    private $fecha_fin;

    public function __construct($alumno_id, $fecha_inicio, $fecha_fin)
    {
        $this->alumno_id = $alumno_id;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $solapado = DB::table('alumno_tutoresempresa')
            ->where('alumno_id', $this->alumno_id)
            ->where(function ($query) {
                $query->whereBetween('fecha_inicio', [$this->fecha_inicio, $this->fecha_fin])
                ->orWhereBetween('fecha_fin', [$this->fecha_inicio, $this->fecha_fin])
                ->orWhere(function ($q) {
                    $q->where('fecha_inicio', '<=', $this->fecha_inicio)
                    ->where('fecha_fin', '>=', $this->fecha_fin);
                });
            })
            ->exists();

        if ($solapado) {
            $fail("El periodo de prácticas se solapa con otro ya existente.");
        }
    }
}
