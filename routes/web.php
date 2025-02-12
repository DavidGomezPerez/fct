<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TutorEmpresaController;
use App\Http\Controllers\TutorIesController;
use Illuminate\Support\Facades\Route;

//Rutas GET de los alumnos
Route::get("/", [HomeController::class, "index"])->name("index");
Route::get("/alumnos", [AlumnoController::class, "indexAll"])->name("indexAlumnos");
Route::get("/alumnos/anadir", [AlumnoController::class, "showAnyadir"])->name("showAnyadirAlumno");
Route::get("/alumnos/{id}", [AlumnoController::class, "showEditar"])->name("showEditarAlumno");
Route::get("/buscar/alumnos", [AlumnoController::class, "searchAlumnos"])->name("searchAlumnos");
Route::get('/alumno/asignarTutorEmpresa', [AlumnoController::class, "showAsignarTutorEmpresa"])->name("showAsignarTutorEmpresa");

//Rutas GET de los tutores de empresa
Route::get("/tutoresEmpresa/anadir", [TutorEmpresaController::class, "showAnyadir"])->name("showAnyadirTutorEmpresa");

//Rutas GET de los tutores del IES
Route::get("/tutoresIes", [TutorIesController::class, "indexAll"])->name("indexTutoresIes");
Route::get("/tutorIes/{id}/alumnos", [TutorIesController::class, "showAlumnos"])->name("showAlumnosTutorIes");

//Rutas POST de los alumnos
Route::post("/alumno/store", [AlumnoController::class, "store"])->name("storeAlumno");
Route::post("/asignarTutorEmpresa/store", [AlumnoController::class, "asignarTutorEmpresa"])->name("asignarTutorEmpresa");

//Rutas POST de los tutores de empresa
Route::post("/tutorEmpresa/store", [TutorEmpresaController::class, "store"])->name("storeTutorEmpresa");

//Rutas PUT de los alumnos
Route::put("/alumno/update", [AlumnoController::class, "update"])->name("updateAlumno");

//Rutas DELETE de los alumnos
Route::delete("/alumno/delete/{id}", [AlumnoController::class, "destroy"])->name("destroyAlumno");
