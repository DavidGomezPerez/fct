@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Editar Tutor Empresa")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <form action="{{ route("updateTutorEmpresa") }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
            @method("PUT")
            @csrf
            <h1 class="text-3xl font-semibold text-center">Editar Tutor Empresa</h1>
            <input type="hidden" name="id" value="{{ $tutorEmpresa->id}}">
            <x-campos-form name="nombre" label="Nombre" value="{{ $tutorEmpresa->nombre }}"/>
            <x-campos-form name="apellidos" label="Apellidos" value="{{ $tutorEmpresa->apellidos }}"/>
            <x-campos-form name="email" label="Email" type="email" value="{{ $tutorEmpresa->email }}"/>

            <div class="relative">
                <select name="empresa_id" id="empresa_id" class="peer w-full border border-gray-300 rounded-md px-3 pt-5 pb-2 focus:border-blue-500 focus:ring-blue-500 focus:outline-none">
                    @forelse ($empresas as $empresa)
                        <option value="{{ $empresa->id }}" {{ $empresa->id == $tutorEmpresa->empresa->id ? "selected" : "" }}>{{ $empresa->nombre }}</option>
                    @empty
                        <p>No hay empresas registradas</p>
                    @endforelse
                </select>
                <label for="empresa_id" class="absolute left-3 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4
                peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-1 peer-focus:text-sm
                peer-focus:text-blue-500">Empresa</label>
            </div>

                <input type="submit" value="Actualizar" class="w-full text-center bg-green-600 text-lg text-white font-semibold p-2 rounded-md
                cursor-pointer hover:bg-green-800 transition duration-300">
        </form>
    </div>
@endsection
