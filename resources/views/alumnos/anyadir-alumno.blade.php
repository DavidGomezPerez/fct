@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Añadir alumno")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <form action="{{ route("storeAlumno") }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf
            <h1 class="text-3xl font-bold text-center mb-8">Añadir Alumno</h1>

            <x-campos-form label="Nombre" name="nombre"/>
            <x-campos-form label="Apellidos" name="apellidos"/>
            <x-campos-form label="NIF" name="NIF"/>
            <x-campos-form label="NUSS" name="NUSS"/>
            <x-campos-form label="Email" name="email" type="email"/>
            <x-campos-form label="Nº teléfono" name="telefono"/>
            <x-campos-form label="Fecha nacimiento" name="fecha_nacimiento" type="date"/>

            <div class="relative">
                <select name="tutoresinstitutos_id" id="tutoresinstitutos_id" class="peer w-full border border-gray-300 rounded-md px-3 pt-6 pb-2 focus:border-blue-500 focus:ring-blue-500 focus:outline-none">
                    @forelse ($tutoresIes as $tutor)
                        <option value="{{ $tutor->id }}">{{ $tutor->nombre }} {{ $tutor->apellidos }}</option>
                    @empty
                        <option>No hay tutores</option>
                    @endforelse
                </select>
                <label for="tutorinstituto_id" class="absolute left-3 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">Tutor del instituto</label>
            </div>

            <input type="submit" value="Añadir" class="cursor-pointer bg-green-600 p-2 text-white text-lg font-semibold w-full rounded-md hover:bg-green-800 transition duration-300">
        </form>
    </div>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Errores en el formulario',
                html: '{!! implode("<br>", $errors->all()) !!}',
                confirmButtonColor: "#2563eb",
            });
        </script>
    @endif
@endsection
