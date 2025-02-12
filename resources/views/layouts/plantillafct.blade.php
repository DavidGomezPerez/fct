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
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-center">
                <ul class="hidden md:flex space-x-6">
                    <li class="relative-group">
                        <a href="{{ route("index") }}" class="hover:text-blue-200 transition duration-300">Inicio</a>
                    </li>
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
                        <a href="#" class="hover:text-blue-200 transition duration-300">Tutores Empresas</a>
                        <ul class="absolute hidden group-hover:block bg-white text-gray-800 shadow-md mt-2 py-2 w-48 rounded-md z-10">
                            <li><a href="{{ route("showAnyadirTutorEmpresa") }}" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Añadir Tutor Empresa</a></li>
                            <li><a href="" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Listar Tutores Empresas</a></li>
                        </ul>
                    </li>
                    <li class="relative group">
                        <a href="#" class="hover:text-blue-200 transition duration-300">Empresas</a>
                        <ul class="absolute hidden group-hover:block bg-white text-gray-800 shadow-md mt-2 py-2 w-48 rounded-md z-10">
                            <li><a href="" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Añadir Empresa</a></li>
                            <li><a href="" class="block px-4 py-2 hover:bg-blue-100 transition duration-300">Listar Empresas</a></li>
                        </ul>
                    </li>
                </ul>
                <button class="md:hidden" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
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
