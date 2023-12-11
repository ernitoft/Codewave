@extends('layouts.app')

@section('title')
    Reporte de Reservas
@endsection
@section('content')

    <body>
        @if ($tickets->count() > 0)
            <div class="py-2 h-100 mx-auto shadow-lg" style="background-color: white">
                <div>
                    <p class="mb-4 mt-6 text-4xl tracking-tight font-bold text-center">Reporte de reservas</p>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <form action="{{ route('report.search') }}" method="POST">
                            @csrf
                            <div id="tooltipDate1" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Fecha de inicio de búsqueda.
                            </div>
                            <div id="tooltipDate2" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Fecha de término de búsqueda.
                            </div>
                            <div class="flex justify-center gap-6 mb-4">
                                <div class="relative max-w-sm mx-3">
                                    <div>
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="date" datepicker datepicker-autohide type="date" name="date1" data-tooltip-target="tooltipDate1"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Seleccione una fecha">
                                    </div>
                                </div>
                                <div class="relative max-w-sm mx-3">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input id="date" datepicker datepicker-autohide type="date" name="date2" data-tooltip-target="tooltipDate2"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Seleccione una fecha">
                                </div>
                            </div>
                            <center>
                                <button type="submit" id="botón"
                                    class="mx-3 m text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    Buscar reservas
                                </button>
                                <a type="button" id="botón" href="{{ route('report') }}"
                                    class="mx-3 m text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    Recargar búsqueda
                                </a>
                            </center>

                        </form>

                        @if (session('message'))
                            <div class="alert text-center alert-danger mb-4" style="background-color: #ff8a80; color:white">
                                <p>Corrige los siguientes errores:</p>
                                <ul>
                                    <li>{{ session('message') }}</li>
                                </ul>
                            </div>
                        @elseif (count($errors) > 0)
                            <div class=" text-center alert alert-danger mb-4"
                                style="background-color: #ff8a80; color:white">
                                <p>Corrige los siguientes errores:</p>
                                <ul>
                                    @foreach ($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach

                                </ul>
                            </div>
                        @else
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase text-center bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Número
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Código de la reserva
                                        </th>
                                        <div id="tooltipDia" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Indica la fecha de salida del bus.
                                        </div>
                                        <th scope="col" class="px-6 py-3">
                                            <div class = "flex gap-2 justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                    height="20" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    data-tooltip-target="tooltipDia">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="16" x2="12" y2="12" />
                                                    <line x1="12" y1="8" x2="12" y2="8" />
                                                </svg>
                                                Día de la reserva
                                            </div>
                                        </th>
                                        <div id="tooltipFecha" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Indica la fecha en que el cliente realizó la reserva.
                                        </div>
                                        <th scope="col" class="px-6 py-3">
                                            <div class = "flex gap-2 justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                    height="20" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    data-tooltip-target="tooltipFecha">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="16" x2="12" y2="12" />
                                                    <line x1="12" y1="8" x2="12" y2="8" />
                                                </svg>
                                                Fecha de la reserva
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ciudad de origen
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ciudad de destino
                                        </th>
                                        <div id="tooltipAsientos" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Indica la cantidad de asientos reservados por el cliente.
                                        </div>
                                        <th scope="col" class="px-6 py-3 ">
                                            <div class = "flex gap-2 justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="20" height="20" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    data-tooltip-target="tooltipAsientos">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="16" x2="12" y2="12" />
                                                    <line x1="12" y1="8" x2="12" y2="8" />
                                                </svg>
                                                Cantidad de asientos
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($tickets as $ticket)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $numero++ }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $ticket->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ date('d/m/Y', strtotime($ticket->date)) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ date('d/m/Y', strtotime($ticket->created_at)) }}
                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $ticket->travelDates->origin }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $ticket->travelDates->destination }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $ticket->seat }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $ticket->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        @else
            <center>
                <div class="alert alert-danger text-white px-3 py-2 text-sm font-medium"
                    style = "background-color:#ff8a80"role="alert">
                    No hay reservas en sistema.
                </div>
            </center>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).ready(function() {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>
        @endif
    </body>
@endsection
