@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Empresas")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl text-center font-bold mb-4">Listado de empresas</h1>

        <div class="container flex justify-start mb-3">
            <div class="mr-5">
                <a href="{{ route("showAnyadirEmpresa") }}" class="flex items-center w-full px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-800 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Añadir Empresa
                </a>
            </div>
            <div class="w-2/3">
                <form action="{{ route("searchEmpresas") }}" method="GET" class="flex justify-center w-full max-w-md">
                    @csrf
                    <input type="search" name="search" placeholder="Buscar por nombre o localidad..." class="px-4 py-2 border border-gray-300 rounded-md mr-2 w-full focus:border-blue-500 ring-blue-500 outline-none">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-800 transition duration-300">
                        Buscar
                    </button>
                </form>
            </div>
        </div>

        @if($empresas->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                @foreach ($empresas as $empresa)
                    <x-empresa-card :empresa="$empresa" />
                @endforeach
            </div>
        @else
            <div class="bg-white p-6 text-center font-semibold text-3xl mt-6 rounded-lg shadow-md">
                <h1>No hay empresas registradas</h1>
            </div>
        @endif

        <div class="mt-6">
            {{ $empresas->links() }}
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
