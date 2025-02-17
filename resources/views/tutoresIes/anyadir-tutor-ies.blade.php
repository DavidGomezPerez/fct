@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Añadir Tutor IES")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <form action="{{ route("storeTutorIes") }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf
            <h1 class="text-3xl font-semibold text-center">Añadir Tutor IES</h1>

            <x-campos-form name="nombre" label="Nombre"/>
            <x-campos-form name="apellidos" label="Apellidos"/>
            <x-campos-form name="email" label="Email" type="email"/>

                <input type="submit" value="Añadir" class="w-full text-center bg-green-600 text-lg text-white font-semibold p-2 rounded-md
                cursor-pointer hover:bg-green-800 transition duration-300">
        </form>
    </div>
@endsection
