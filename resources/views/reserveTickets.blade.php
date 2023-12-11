@extends('layouts.app')
@section('title')
    Reserve Tickets
@endsection
@section('content')

    @if ($countTravels > 0 && !Auth::user())
    @if (session('error'))
    <div class="alert text-center alert-danger mb-4" style="background-color: #ff8a80; color:white">
        <p>Corrige los siguientes errores:</p>
        <ul>
            <li>{{ session('error') }}</li>
        </ul>
    </div>
    @endif
        <body>
            <div class="py-2 h-100 mx-auto shadow-lg" style="background-color: white">
                <div class="sm:py-16 m-4 justify-center items-center">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:text-center">
                            <h2 class="mb-4 text-4xl tracking-tight font-bold">Reservar pasajes</h2>
                            <p class=" text-gray-500 dark:text-gray-200">Reserva tus pasajes para viajar a cualquier parte
                                del país.</p>
                            <hr class="w-48 h-1 my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

                            <form id="form" method="POST" action="{{ route('add-reservation') }}">
                                @csrf
                                <div class="flex flex-col items-start m-2">

                                    <div id="tooltipOrigen" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Listado de ciudades de salida disponibles en este momento.
                                    </div>
                                    <!-- ORIGIN-->
                                    <div class = "flex  justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-tooltip-target="tooltipOrigen">
                                            <circle cx="12" cy="12" r="10" />
                                            <line x1="12" y1="16" x2="12" y2="12" />
                                            <line x1="12" y1="8" x2="12" y2="8" />
                                        </svg>
                                        <label class="m-4 " for="origins">Origen</label>
                                    </div>
                                    <select id="origins" name="origins"
                                        class="mx-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected >Elige una opción</option>
                                    </select>

                                    <!-- DESTINATION-->
                                    <div id="tooltipDestino" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Listado de ciudades de llegada disponibles en este momento.
                                    </div>
                                    <div class = "flex  justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-tooltip-target="tooltipDestino">
                                            <circle cx="12" cy="12" r="10" />
                                            <line x1="12" y1="16" x2="12" y2="12" />
                                            <line x1="12" y1="8" x2="12" y2="8" />
                                        </svg>
                                        <label class="m-4" for="destinations">Destino</label>
                                    </div>
                                    <select id="destinations" name="destinations"
                                        class="mx-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected >Elige una opción</option>
                                    </select>

                                    <!-- DATEPICKER-->
                                    <div id="tooltipDate" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Fecha de salida del bus, asegurese de ingresar una fecha superior a la actual.
                                    </div>
                                    <div class = "flex  justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-tooltip-target="tooltipDate">
                                            <circle cx="12" cy="12" r="10" />
                                            <line x1="12" y1="16" x2="12" y2="12" />
                                            <line x1="12" y1="8" x2="12" y2="8" />
                                        </svg>
                                        <label class="m-2 mx-3" for="Fecha">Fecha del viaje</label>
                                    </div>

                                    <div class="relative max-w-sm mx-3">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="date" datepicker datepicker-autohide type="date" name="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Seleccione una fecha">
                                    </div>

                                    <!-- SEATS-->
                                    <div id="tooltipSeats" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Se despliega la cantidad de asientos disponibles en el bus basado en el origen, destino y la fecha seleccionada.
                                    </div>
                                    <div class = "flex  justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-tooltip-target="tooltipSeats">
                                            <circle cx="12" cy="12" r="10" />
                                            <line x1="12" y1="16" x2="12" y2="12" />
                                            <line x1="12" y1="8" x2="12" y2="8" />
                                        </svg>
                                        <label class="m-4" for="seats">Asientos</label>
                                    </div>

                                    <select id="seat" name="seat"
                                        class="mx-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected >Elige una opción</option>
                                    </select>

                                    <!-- BASE RATE-->
                                    <input type="hidden" id="base-rate" name="base_rate" value="">

                                    <!-- BUTTON-->
                                    <button type="button" id="botón"
                                        class="mx-3 m-4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                        Reservar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
            <script src="{{ asset('assets/index.js') }}"></script>
        </body>

    @else
        <center>
            @if (Auth::user())
                <div class="alert alert-danger text-white px-3 py-2 text-sm font-medium"
                    style = "background-color:#ff8a80"role="alert">
                    Cierre sesión para ingresar a la página de reservas.
                </div>
            @else
                <div class="alert alert-danger text-white px-3 py-2 text-sm font-medium"
                    style = "background-color:#ff8a80"role="alert">
                    Por el momento no es posible realizar reservas, intente más tarde.
                </div>
            @endif
        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets/index.js') }}"></script>
    @endif
@endsection

