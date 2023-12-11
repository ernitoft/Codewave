@extends('layouts.app')

@section('content')
    <style>
        .marginAuto{
            display: grid;
        }
    </style>
    <body>
        <div style="background-color: #f4f4f4">
            <div class="mt-4 flex flex-1 justify-center items-center my-6">
                <button onclick="location.href='{{route('travels.index')}}'" class="items-centerm-4 inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <svg class="w-3.5 h-3.5 ms-2 rotate-180 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                      </svg>
                    Volver
                </button>
            </div>
            @if ($validRows || $invalidRows || $duplicatedRows)
            <div class="flex flex-1 flex-col gap-2 m-4">
                <div class="my-8 mx-auto">
                    <a class="px-6 py-3 hover:bg-green-700 transition-all text-white font-semibold " style="background-color: #a8e6cf" href="{{route('dashboard')}}">Finalizar</a>
                </div>
                @if (count($validRows) > 0)
                    <h3 class="text-2xl text-black font-semibold uppercase text-center m-4">Listado de viajes agregados
                        correctamente
                    </h3>
                    <div class="relative overflow-x-auto sm:rounded-lg mb-2">
                        <table class="w-1/2 mx-auto text-sm text-left ">
                            <thead class="text-xs  uppercase  " style="background-color:  #a8e6cf">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Origen
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Destino
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Cantidad de asientos
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Tarifa base
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($validRows as $validRow)
                                    <tr class=" border-b "style="background-color:  #a8e6cf" >
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
                                            {{ $validRow['origen'] }}
                                        </th>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $validRow['destino'] }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $validRow['cantidad_de_asientos'] }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $validRow['tarifa_base'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @if (count($invalidRows))
                    <h3 class="text-2xl text-black font-semibold uppercase text-center">
                        Listado de viajes que presentaron errores
                    </h3>
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-1/2 mx-auto text-sm text-left  mb-2">
                            <thead class="text-xs  uppercase  " style="background-color:  #ff8a80">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Origen
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Destino
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Cantidad de asientos
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Tarifa base
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invalidRows as $invalidRow)
                                    <tr class=" border-b  " style="background-color:  #FF8A80">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
                                            {{ $invalidRow['origen'] ? $invalidRow['origen'] : '---' }}
                                        </th>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $invalidRow['destino'] ? $invalidRow['destino'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $invalidRow['cantidad_de_asientos'] ? $invalidRow['cantidad_de_asientos'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $invalidRow['tarifa_base'] ? $invalidRow['tarifa_base'] : '---' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if (count($duplicatedRows))
                    <h3 class="text-2xl text-black font-semibold uppercase text-center">
                        Listado de viajes que se encuentran duplicados
                    </h3>
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-1/2 mx-auto text-sm text-left   mb-2">
                            <thead class="text-xs  uppercase  " style="background-color:  #e4e6a8">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Origen
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Destino
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Cantidad de asientos
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-black font-bold">
                                        Tarifa base
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($duplicatedRows as $duplicatedRow)
                                    <tr class=" border-b " style="background-color:  #e4e6a8">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
                                            {{ $duplicatedRow['origen'] }}
                                        </th>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $duplicatedRow['destino'] }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $duplicatedRow['cantidad_de_asientos'] }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $duplicatedRow['tarifa_base'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            @else

            <div class="flex flex-1 justify-center items-center my-6">
                <form class="flex flex-col items-center w-1/2" action="{{ route('travel.check') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="tooltipIndex" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Se debe ingresar un archivo excel, no debe sobrepasar los 5MB y asegúrese que tenga el formato correcto.
                    </div>

                    <div>
                        <input type="file" name="document" data-tooltip-target="tooltipIndex">

                        @error('document')
                            <p class="my-4 text-lg text-center px-4 py-3" style="background-color: #ff8a80">
                                {{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="m-4 inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                        <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                        <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                        </svg>
                        Importar viajes
                    </button>
                </form>
            </div>
            @endif
            </div>
        </div>
        <div class="flex flex-1 justify-center items-center my-6">
            @if (session()-> has('lecturaError'))
                    <p class="my-4 text-lg text-center px-4 py-3" style="background-color: #ff8a80">
                        {{ session()->get('lecturaError') }}
                    </p>
            @endif
        </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
@endsection
