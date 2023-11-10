<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <title>Turjoy | Línea de buses</title>
    <style>
        body {
            background-color: #EAEAEA;
            margin: 0;
            flex-direction: column;
            min-height: 100vh;
            display: flex;
        }

        .footer {
            width: 100%;
            margin-top: auto;
        }
    </style>
</head>

<body class="min-h-screen">
    <nav class="fixed-top z-30" style="background-color: #333333">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/TURJOY2.png') }}" alt="codeWaveLogo" height="100" width="125">
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:block ">
                        <div class="flex space-x-4">
                            <a href="{{ url('/') }}"
                                class="hover:bg-gray-700 text-white rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">Inicio</a>
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('reserveTickets') }}"
                                        class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Reservar</a>
                                    <a class="nav-link text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                        href="{{ route('login') }}">Iniciar sesión</a>
                                @endif
                                @if (Route::has('register'))
                                    <a class="nav-link text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                        href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                @endif
                            @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="relative ml-3">
                                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                        class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        type="button">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="{{ asset('img/iconoUser.jpg') }}"
                                            alt="adminImage">
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="dropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownDefaultButton">
                                            <li>
                                            </li>
                                            <li>
                                                <a href="{{ route('travels.index') }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cargar
                                                    rutas</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Proximamente</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cerrar Sesión</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            @endguest

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>
    <footer class="shadow mx-auto fixed-bottom footer" style="background-color: #333333">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="{{ route('welcome') }}" class="flex items-center mb-4 sm:mb-0">
                    <img src="{{ asset('img/TURJOY2.png') }}" class="h-8 mr-3" alt="codeWaveLogo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Turjoy</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-white sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="mailto:italo.donoso@ucn.cl" class="hover:underline">Contacto</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 sm:mx-auto" />
            <span class="block text-sm sm:text-center text-white">© 2023
                <a class="">Turjoy</a>. Todos los derechos reservados.</span>
        </div>
    </footer>
</body>

</html>
