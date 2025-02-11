@extends("layouts.plantillafct")
@section('title', 'Sistema de Gestión FCT - Listado de Alumnos')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Listado de Alumnos</h1>

        <div class="container w-full flex justify-start mb-6">
            <div class="mr-5">
                <a href="{{ route("showAnyadirAlumno") }}" class="flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-800 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Añadir Alumno
                </a>
            </div>
            <div>
                <form action="{{ route('searchAlumnos') }}" method="GET" class="flex justify-center w-full max-w-md">
                    <input type="text" name="search" value="{{ request()->search }}" placeholder="Buscar por nombre, apellidos, NIF, etc." class="px-4 py-2 border border-gray-300 rounded-md mr-2 w-full">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-800 transition duration-300">
                        Buscar
                    </button>
                </form>

            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($alumnos as $alumno)
                <x-alumno-card :alumno="$alumno" />
            @endforeach
        </div>

        <div class="mt-6">
            {{ $alumnos->links() }}
        </div>
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
