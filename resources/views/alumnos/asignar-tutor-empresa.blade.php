@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Asignar tutor de empresa")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <form action="{{ route("asignarTutorEmpresa") }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf
            <h1 class="text-2xl text-center font-semibold">Asignar Tutor de Empresa a Alumno</h1>

            <div class="relative">
                <select name="alumno_id" id="alumno_id" class="peer w-full border border-gray-300 rounded-md px-3 pt-5 pb-2 focus:border-blue-500 focus:ring-blue-500 focus:outline-none">
                    @forelse ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->nombre }}  {{ $alumno->apellidos }}</option>
                    @empty
                        <option>No hay alumnos registrados</option>
                    @endforelse
                </select>
                <label for="alumno_id" class="absolute left-3 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4
                peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-1 peer-focus:text-sm
                peer-focus:text-blue-500">Alumno</label>
            </div>

            <div class="relative">
                <select name="tutoresempresa_id" id="tutoresempresa_id" class="peer w-full border border-gray-300 rounded-md px-3 pt-5 pb-2 focus:border-blue-500 focus:ring-blue-500 focus:outline-none">
                    @forelse ($tutoresEmpresa as $tutorEmpresa)
                        <option value="{{ $tutorEmpresa->id }}">{{ $tutorEmpresa->nombre }}  {{ $tutorEmpresa->apellidos }}</option>
                    @empty
                        <option>No hay alumnos registrados</option>
                    @endforelse
                </select>
                <label for="tutoresempresa_id" class="absolute left-3 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4
                peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-1 peer-focus:text-sm
                peer-focus:text-blue-500">Tutor de empresa</label>
            </div>

            <x-campos-form name="fecha_inicio" type="date" label="Fecha inicio"/>
            <x-campos-form name="fecha_fin" type="date" label="Fecha fin"/>

            <input type="submit" value="Asignar" class="w-full text-center bg-green-600 text-lg text-white font-semibold p-2 rounded-md
            cursor-pointer hover:bg-green-800 transition duration-300">
        </form>
    </div>
    @if(session("success"))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    iconColor: 'green',
                    text: '{{ session("success") }}',
                    confirmButtonColor: "#2563eb",
                });
            });
        </script>
    @endif
@endsection
