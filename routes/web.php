<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("index");
Route::get("/alumnos", [AlumnoController::class, "indexAll"])->name("indexAlumnos");    
Route::get("/alumnos/anadir", [AlumnoController::class, "showAnyadir"])->name("showAnyadirAlumno");

Route::post("/alumno/store", [AlumnoController::class, "store"])->name("storeAlumno");