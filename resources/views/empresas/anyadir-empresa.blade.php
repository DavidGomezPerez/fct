@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Añadir Empresa")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <form action="{{ route("storeEmpresa") }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md  space-y-6">
            @csrf
            <h2 class="text-3xl text-center font-semibold">Añadir Empresa</h2>

            <x-campos-form label="Nombre" name="nombre" value="{{ old('nombre') }}"/>
            <x-campos-form label="Localidad" name="localidad" value="{{ old('localidad') }}"/>

            <input type="submit" value="Añadir" class="cursor-pointer bg-green-600 text-white text-center text-lg font-semibold p-2 w-full rounded-md hover:bg-green-800 transition duration-300">
        </form>
    </div>
@endsection
