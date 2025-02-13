@props(["empresa"])

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-gray-800">{{ $empresa->nombre }}</h2>
    <p class="text-gray-600">Localidad: {{ $empresa->localidad }}</p>
    <div class="flex justify-center">
        <form action="{{ route("showEditarEmpresa", $empresa->id) }}" method="GET" class="flex justify-center space-x-4 mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-800 transition duration-300">
                Editar
            </button>
        </form>

        <form action="{{ route("empresaIndexTutores", $empresa->id) }}" method="GET" class="flex justify-center space-x-4 mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-yellow-600 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-800 transition duration-300">Ver tutores empresa</button>
        </form>

        <form action="{{ route("destroyEmpresa", $empresa->id) }}" method="POST" class="delete-form flex justify-center space-x-4 mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-800 transition duration-300">
                Eliminar
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
