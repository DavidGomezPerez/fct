@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Alumnos de {{ $tutorIes->nombre }} {{ $tutorIes->apellidos}}")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl text-center font-bold">Listado de alumnos de {{ $tutorIes->nombre }} {{ $tutorIes->apellidos }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
            @foreach ($alumnos as $alumno)
                <x-alumno-card :alumno="$alumno"/>
            @endforeach
        </div>

        {{-- Paginación --}}
        <div class="mt-6">
            {{ $alumnos->links() }}
        </div>
    </div>
@endsection
