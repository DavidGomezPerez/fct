<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/heroicons@2.0.18/24/outline/index.min.js"></script>
    <style>
        .group:hover .group-hover\:block,
        .group.active .group-hover\:block {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="bg-blue-700 text-white">
        <nav class="container mx-auto px-4 py-4 flex justify-center relative">
            <ul class="hidden md:flex space-x-6">
                <li class="relative group">
                    <a href="{{ route("indexAlumnos") }}" class="hover:text-blue-200 transition duration-300">Alumnos</a>
                    <ul class="absolute hidden group-hover:block bg-white text-gray-800 shadow-md mt-2 py-2 w-48 rounded-md z-10">
                        <li><a href="{{ route("showAnyadirAlumno") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Añadir Alumno</a></li>
                        <li><a href="{{ route("indexAlumnos") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Listar Alumnos</a></li>
                        <li><a href="{{ route("showAsignarTutorEmpresa") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Asignar Tutor de Empresa</a></li>
                    </ul>
                </li>
                <li class="relative group">
                    <a href="{{ route("indexTutoresIes") }}" class="hover:text-blue-200 transition duration-300">Tutores IES</a>
                    <ul class="absolute hidden group-hover:block bg-white text-gray-800 shadow-md mt-2 py-2 w-48 rounded-md z-10">
                        <li><a href="" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Añadir Tutor IES</a></li>
                        <li><a href="{{ route("indexTutoresIes") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Listar Tutores IES</a></li>
                    </ul>
                </li>
                <li class="relative group">
                    <a href="{{ route("index") }}">
                        <img src="https://aulas.iesalcantara.es/pluginfile.php/1/core_admin/logocompact/300x300/1719391267/logoalcan.png" alt="Logo IES Alcántara" width="70px" class="rounded-full">
                    </a>
                </li>
                <li class="relative group">
                    <a href="{{ route("indexTutoresEmpresa") }}" class="hover:text-blue-200 transition duration-300">Tutores Empresas</a>
                    <ul class="absolute hidden group-hover:block bg-white text-gray-800 shadow-md mt-2 py-2 w-48 rounded-md z-10">
                        <li><a href="{{ route("showAnyadirTutorEmpresa") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Añadir Tutor Empresa</a></li>
                        <li><a href="{{ route("indexTutoresEmpresa") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Listar Tutores Empresas</a></li>
                    </ul>
                </li>
                <li class="relative group">
                    <a href="{{ route("indexEmpresas") }}" class="hover:text-blue-200 transition duration-300">Empresas</a>
                    <ul class="absolute hidden group-hover:block bg-white text-gray-800 shadow-md mt-2 py-2 w-48 rounded-md z-10">
                        <li><a href="{{ route("showAnyadirEmpresa") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Añadir Empresa</a></li>
                        <li><a href="{{ route("indexEmpresas") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Listar Empresas</a></li>
                    </ul>
                </li>
            </ul>
            @if(auth()->user())
                <ul class="hidden md:flex space-x-6">
                    <form action="{{ route("logout") }}" method="POST" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white text-blue-700 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300 hidden md:block">
                        @csrf
                        <button type="submit">Cerrar sesión de {{ auth()->user()->name }}</button>
                    </form>
                </ul>
            @else
                <a href="{{ route('register') }}" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white text-blue-700 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300 hidden md:block">
                    Crear cuenta
                </a>
            @endif
        </nav>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Sistema de Gestión FCT. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
