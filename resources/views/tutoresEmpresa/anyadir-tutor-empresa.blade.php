@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Añadir Tutor Empresa")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <form action="{{ route("storeTutorEmpresa") }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf
            <h1 class="text-3xl font-semibold text-center">Añadir Tutor Empresa</h1>

            <x-campos-form name="nombre" label="Nombre"/>
            <x-campos-form name="apellidos" label="Apellidos"/>
            <x-campos-form name="email" label="Email" type="email"/>

            <div class="relative">
                <select name="empresa_id" id="empresa_id" class="peer w-full border border-gray-300 rounded-md px-3 pt-5 pb-2 focus:border-blue-500 focus:ring-blue-500 focus:outline-none">
                    @forelse ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                    @empty
                        <p>No hay empresas registradas</p>
                    @endforelse
                </select>
                <label for="empresa" class="absolute left-3 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4
                peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-1 peer-focus:text-sm
                peer-focus:text-blue-500">Empresa</label>
            </div>

                <input type="submit" value="Añadir" class="w-full text-center bg-green-600 text-lg text-white font-semibold p-2 rounded-md
                cursor-pointer hover:bg-green-800 transition duration-300">
        </form>
    </div>
@endsection
