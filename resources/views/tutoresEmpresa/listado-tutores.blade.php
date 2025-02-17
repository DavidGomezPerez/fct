@extends("layouts.plantillafct")
@section("title", "Sistema de Gestión FCT - Tutores de empresa")

@section("content")
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl text-center font-bold">Listado de Tutores de Empresa</h1>

        @if($tutoresEmpresa->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                @foreach ($tutoresEmpresa as $tutorEmpresa)
                    <x-tutor-empresa-card :tutorEmpresa="$tutorEmpresa" :empresa="$tutorEmpresa->empresa"/>
                @endforeach
            </div>
        @else
            <div class="bg-white p-6 text-center font-semibold text-3xl mt-6 rounded-lg shadow-md">
                <h2 class="text-3xl text-center font-semibold">No hay tutores de empresa registrados</h2>
            </div>
        @endif

        <div class="mt-6">
            {{ $tutoresEmpresa->links() }}
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
