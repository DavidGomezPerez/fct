@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Alumnos Tutor de Empresa")

@section("content")
    <div class="container mx-auto px4 py-8">
        <h1 class="text-3xl text-center font-semibold">Alumnos del tutor de empresa {{ $tutorEmpresa->nombre }} {{ $tutorEmpresa->apellidos }}</h1>

        @if($alumnos->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                @foreach ($alumnos as $alumno)
                    <x-alumno-card :alumno="$alumno"/>
                @endforeach
            </div>
        @else
            <div class="bg-white p-6 text-center font-semibold text-3xl mt-6 rounded-lg shadow-md">
                <h1>No hay alumnos asignados a este tutor</h1>
            </div>
        @endif

        <div class="mt-6">
            {{ $alumnos->links() }}
        </div>
    </div>
@endsection
