@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Tutores de {{ $empresa->nombre }}")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl text-center font-semibold">Tutores de empresa de {{ $empresa->nombre }}</h1>
        <div class="mr-5">
            <a href="{{ route("showAnyadirTutorIes") }}" class="flex items-center w-full px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-800 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Añadir Tutor IES
            </a>
        </div>

        @if($tutoresEmpresa->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                @foreach ($tutoresEmpresa as $tutorEmpresa)
                    <x-tutor-empresa-card :tutorEmpresa="$tutorEmpresa" :empresa="$empresa"/>
                @endforeach
            </div>
        @else
            <div class="bg-white p-6 text-center font-semibold text-3xl mt-6 rounded-lg shadow-md">
                <h2 class="text-3xl text-center font-semibold">La empresa no tiene tutores de empresa asignados</h2>
            </div>
        @endif

        <div class="mt-6">
            {{ $tutoresEmpresa->links() }}
        </div>
    </div>
@endsection
