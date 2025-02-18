<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TutorEmpresaController;
use App\Http\Controllers\TutorIesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas GET de los alumnos
Route::get("/", [HomeController::class, "index"])->name("index");
Route::get("/alumnos", [AlumnoController::class, "indexAll"])->name("indexAlumnos");
Route::get("/alumnos/anadir", [AlumnoController::class, "showAnyadir"])->name("showAnyadirAlumno");
Route::get("/alumnos/{id}", [AlumnoController::class, "showEditar"])->name("showEditarAlumno");
Route::get("/buscar/alumnos", [AlumnoController::class, "searchAlumnos"])->name("searchAlumnos");
Route::get('/alumno/asignarTutorEmpresa', [AlumnoController::class, "showAsignarTutorEmpresa"])->name("showAsignarTutorEmpresa");

//Rutas GET de los tutores de empresa
Route::get("/tutoresEmpresa", [TutorEmpresaController::class, "indexAll"])->name("indexTutoresEmpresa");
Route::get("/tutoresEmpresa/anadir", [TutorEmpresaController::class, "showAnyadir"])->name("showAnyadirTutorEmpresa");
Route::get("/tutorEmpresa/{id}/alumnos", [TutorEmpresaController::class, "showAlumnos"])->name("showAlumnosTutorEmpresa");
Route::get("/tutoresEmpresa/{id}", [TutorEmpresaController::class, "showEditar"])->name("showEditarTutorEmpresa");

//Rutas GET de los tutores del IES
Route::get("/tutoresIes", [TutorIesController::class, "indexAll"])->name("indexTutoresIes");
Route::get("/tutoresIes/anadir", [TutorIesController::class, "showAnyadir"])->name("showAnyadirTutorIes");
Route::get("/tutorIes/{id}", [TutorIesController::class, "showEditar"])->name("showEditarTutorIes");
Route::get("/tutorIes/{id}/alumnos", [TutorIesController::class, "showAlumnos"])->name("showAlumnosTutorIes");
Route::get("/buscar/tutoresIes", [TutorIesController::class, "searchTutoresIes"])->name("searchTutoresIes");

//Rutas GET de las empresas
Route::get("/empresas", [EmpresaController::class, "indexAll"])->name("indexEmpresas");
Route::get("/empresas/anadir", [EmpresaController::class, "showAnyadirEmpresa"])->name("showAnyadirEmpresa");
Route::get("/empresas/{id}/tutores", [EmpresaController::class, "indexTutores"])->name("empresaIndexTutores");
Route::get("/empresas/{id}", [EmpresaController::class, "showEditar"])->name("showEditarEmpresa");
Route::get("/buscar/empresas", [EmpresaController::class, "searchEmpresas"])->name("searchEmpresas");

//Rutas POST de los alumnos
Route::post("/alumno/store", [AlumnoController::class, "store"])->name("storeAlumno");
Route::post("/asignarTutorEmpresa/store", [AlumnoController::class, "asignarTutorEmpresa"])->name("asignarTutorEmpresa");

//Rutas POST de los tutores del IES
Route::post("/tutorIes/store", [TutorIesController::class, "store"])->name("storeTutorIes");

//Rutas POST de los tutores de empresa
Route::post("/tutorEmpresa/store", [TutorEmpresaController::class, "store"])->name("storeTutorEmpresa");

//Rutas POST de las empresas
Route::post("/empresas/store", [EmpresaController::class, "store"])->name("storeEmpresa");

//Rutas PUT de los alumnos
Route::put("/alumno/update", [AlumnoController::class, "update"])->name("updateAlumno");

//Rutas PUT de los tutores del IES
Route::put("/tutorIes/update", [TutorIesController::class, "update"])->name("updateTutorIes");

//Rutas PUT de las empresas
Route::put("/empresa/update", [EmpresaController::class, "update"])->name("updateEmpresa");

//Rutas PUT de los tutores de empresa
Route::put("/tutorEmpresa/update", [TutorEmpresaController::class, "update"])->name("updateTutorEmpresa");

//Rutas DELETE de los alumnos
Route::delete("/alumno/delete/{id}", [AlumnoController::class, "destroy"])->name("destroyAlumno");

//Rutas DELETE de los tutores del IES
Route::delete("/tutorIes/delete/{id}", [TutorIesController::class, "destroy"])->name("destroyTutorIes");

//Rutas DELETE de las empresas
Route::delete("/empresa/delete/{id}", [EmpresaController::class, "destroy"])->name("destroyEmpresa");

//Rutas DELETE de los tutores de empresa
Route::delete("/tutorEmpresa/delete/{id}", [TutorEmpresaController::class, "destroy"])->name("destroyTutorEmpresa");

require __DIR__.'/auth.php';
