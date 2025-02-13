@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Tutores IES")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Listado de Tutores del IES</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tutoresIes as $tutorIes)
                <x-tutor-ies-card :tutorIes="$tutorIes"/>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $tutoresIes->links() }}
        </div>

        <div class="mt-6">
            {{ $tutoresIes->links() }}
        </div>
    </div>
@endsection
