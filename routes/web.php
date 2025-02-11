<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("index");
Route::get("/alumnos", [AlumnoController::class, "indexAll"])->name("indexAlumnos");
Route::get("/alumnos/anadir", [AlumnoController::class, "showAnyadir"])->name("showAnyadirAlumno");
Route::get("/alumnos/{id}", [AlumnoController::class, "showEditar"])->name("showEditarAlumno");
Route::get("/alumnos/busqueda", [AlumnoController::class, "searchAlumnos"])->name("searchAlumnos");

Route::post("/alumno/store", [AlumnoController::class, "store"])->name("storeAlumno");

Route::put("/alumno/update", [AlumnoController::class, "update"])->name("updateAlumno");

Route::delete("/alumno/delete/{id}", [AlumnoController::class, "destroy"])->name("destroyAlumno");
