@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Tutores de {{ $empresa->nombre }}")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl text-center font-semibold">Tutores de empresa de {{ $empresa->nombre }}</h1>

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
