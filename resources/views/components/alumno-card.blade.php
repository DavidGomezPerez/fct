@props(['alumno'])

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-gray-800">{{ $alumno->nombre }} {{ $alumno->apellidos }}</h2>
    <p class="text-gray-600">DNI: {{ $alumno->NIF }}</p>
    <p class="text-gray-600">NUSS: {{ $alumno->NUSS }}</p>
    <p class="text-gray-600">Email: {{ $alumno->email }}</p>
    <p class="text-gray-600">Nº móvil: {{ $alumno->telefono }}</p>
    <p class="text-gray-600">Fecha nacimiento: {{ $alumno->fecha_nacimiento }}</p>
    <p class="text-gray-600">Tutor Instituto: {{ $alumno->tutorInstituto->nombre }} {{ $alumno->tutorInstituto->apellidos }}</p>
    <div class="flex justify-center space-x-4">
        <form action="{{ route('showEditarAlumno', $alumno->id) }}" method="GET" class="flex justify-center mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-800 transition duration-300">
                Editar
            </button>
        </form>

        <div class="flex justify-center space-x-4 mt-4">
            <button type="button" class="px-4 py-2 bg-yellow-600 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-800 transition duration-300 show-info-btn"
                data-empresas='@json($alumno->tutoresEmpresas->map(fn($t) => [
                    "nombre" => $t->empresa->nombre ?? "Sin empresa",
                    "localidad" => $t->empresa->localidad ?? ""
                ])->values())'
                data-alumno='@json(["nombre" => $alumno->nombre, "apellidos" => $alumno->apellidos])'>
                Ver Empresas
            </button>

        </div>

        <form action="{{ route('destroyAlumno', $alumno->id) }}" method="POST" class="delete-form flex justify-center mt-4">
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
        // Botones de ver información
        const infoButtons = document.querySelectorAll('.show-info-btn');

        infoButtons.forEach(button => {
            button.addEventListener('click', function () {
                console.log("click");

                // Parseamos la lista de empresas
                const empresas = JSON.parse(this.getAttribute('data-empresas'));
                const alumno = JSON.parse(this.getAttribute('data-alumno'));

                // Si no hay empresas, mostramos un mensaje
                let empresaListHTML = "<p>No ha realizado prácticas en ninguna empresa</p>";
                if (empresas.length > 0) {
                    empresaListHTML = `
                        ${alumno.nombre} ${alumno.apellidos} ha realizado o realiza prácticas en:
                        <ul class='text-center'>`;
                    empresas.forEach(emp => {
                        empresaListHTML += `<li><b>${emp.nombre}</b> (${emp.localidad})</li>`;
                    });
                    empresaListHTML += "</ul>";
                }

                Swal.fire({
                    title: "Empresas del alumno",
                    html: empresaListHTML,
                    icon: "info",
                    confirmButtonText: "Cerrar",
                    confirmButtonColor: "#2563eb"
                });
            });
        });

        // Confirmación de eliminación
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#2563eb',
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
