@extends("layouts.plantillafct")
@section('title', 'Sistema de Gestión FCT - Inicio')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Sistema de Gestión FCT</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <div>
                    <h2 class="text-xl font-semibold mb-2">Alumnos</h2>
                    <p class="text-3xl font-bold text-blue-600">{{ $alumnos }}</p>
                    <p class="text-gray-600">Alumnos registrados</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <div>
                    <h2 class="text-xl font-semibold mb-2">Empresas</h2>
                    <p class="text-3xl font-bold text-green-600">{{ $empresas }}</p>
                    <p class="text-gray-600">Empresas colaboradoras</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <div>
                    <h2 class="text-xl font-semibold mb-2">Tutores de empresas</h2>
                    <p class="text-3xl font-bold text-purple-600">{{ $tutoresEmpresa }}</p>
                    <p class="text-gray-600">Tutores de empresa registrados</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <div>
                    <h2 class="text-xl font-semibold mb-2">Tutores del IES</h2>
                    <p class="text-3xl font-bold text-yellow-600">{{ $tutoresIes }}</p>
                    <p class="text-gray-600">Tutores de IES registrados</p>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-lg mb-4">Bienvenido al Sistema de Gestión FCT. Accede rápidamente a las funciones principales:</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route("showAnyadirAlumno") }}" class="inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                    Añadir Alumno
                </a>
                <a href="{{ route("indexEmpresas") }}" class="inline-block bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 transition duration-300">
                    Ver Empresas
                </a>
                <a href="" class="inline-block bg-purple-600 text-white font-bold py-2 px-4 rounded hover:bg-purple-700 transition duration-300">
                    Ver Tutores Empresas
                </a>
                <a href="{{ route("indexTutoresIes") }}" class="inline-block bg-yellow-600 text-white font-bold py-2 px-4 rounded hover:bg-yellow-700 transition duration-300">
                    Ver Tutores IES
                </a>
            </div>
        </div>
    </div>
@endsection
