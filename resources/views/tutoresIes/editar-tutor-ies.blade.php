@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Editar Tutor Empresa")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <form action="{{ route("updateTutorIes") }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
            @method("PUT")
            @csrf
            <h1 class="text-3xl font-semibold text-center">Editar Tutor Empresa</h1>
            <input type="hidden" name="id" value="{{ $tutorIes->id}}">
            <x-campos-form name="nombre" label="Nombre" value="{{ $tutorIes->nombre }}"/>
            <x-campos-form name="apellidos" label="Apellidos" value="{{ $tutorIes->apellidos }}"/>
            <x-campos-form name="email" label="Email" type="email" value="{{ $tutorIes->email }}"/>

            <input type="submit" value="Actualizar" class="w-full text-center bg-green-600 text-lg text-white font-semibold p-2 rounded-md
            cursor-pointer hover:bg-green-800 transition duration-300">
        </form>
    </div>
@endsection
