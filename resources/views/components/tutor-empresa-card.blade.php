@props(["tutorEmpresa", "empresa"])

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-gray-800">{{ $tutorEmpresa->nombre }} {{ $tutorEmpresa->apellidos }}</h2>
    <p class="text-gray-600">Email: {{ $tutorEmpresa->email }}</p>
    <p class="text-gray-600">Empresa: {{ $empresa->nombre }}</p>
    <div class="flex justify-center">
        <form action="{{ route("showEditarTutorEmpresa", $tutorEmpresa->id) }}" method="GET" class="flex justify-center space-x-4 mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-800 transition duration-300">
                Editar
            </button>
        </form>
        <form action="{{ route("showAlumnosTutorEmpresa", $tutorEmpresa->id) }}" method="GET" class="flex justify-center space-x-4 mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-yellow-600 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-800 transition duration-300">Ver alumnos asignados</button>
        </form>
        <form action="{{ route("destroyTutorEmpresa", $tutorEmpresa->id) }}" method="POST" class="delete-form flex justify-center space-x-4 mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-800 transition duration-300">
                Eliminar
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Seleccionamos todos los formularios con la clase 'delete-form'
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault(); // Evita que el formulario se envíe automáticamente

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
                            form.submit(); // Envía el formulario si el usuario confirma
                        }
                    });
                });
            });
        });
    </script>
</div>
