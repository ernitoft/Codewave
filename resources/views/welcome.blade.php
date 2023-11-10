@extends('layouts.app')
@section('title')
    Welcome
@endsection
@section('content')
    <style>
        .just {
            text-align: justify;
        }
        shadow {
            text-shadow: 2px 2px 4px #000000;
        }
    </style>

    <body>
        <div style="background-color: #f4f4f4">
            <!-- Carousel -->
            <div id="animation-carousel" class="relative w-full " data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-200 ease-linear shadow-2xl" data-carousel-item>
                        <img src="img/santiagoCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 hover:shadow-hg dark:hover:shadow-black/30" alt="santiagoIMG">
                        <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                            <h5 class="text-xl text-shadow: 1px 1px 1px #000">Santiago</h5>
                            <p>
                                "La Capital"
                            </p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-200 ease-linears shadow-2xl" data-carousel-item>
                        <img src="img/antofagastaCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="antofagastaIMG">
                        <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                            <h5 class="text-xl text-shadow: 1px 1px 1px #000">Antofagasta</h5>
                            <p>
                                "La Perla del Norte Grande"
                            </p>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-200 ease-linear shadow-2xl" data-carousel-item="active">
                        <img src="img/calamaCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="calamaIMG">
                        <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                            <h5 class="text-xl text-shadow: 1px 1px 1px #000">Calama</h5>
                            <p>
                                "Tierra de Sol y Cobre"
                            </p>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-200 ease-linear shadow-2xl" data-carousel-item>
                        <img src="img/viña.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="viñaIMG">
                        <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                            <h5 class="text-xl text-shadow: 1px 1px 1px #000">Viña del Mar</h5>
                            <p>
                                "La ciudad jardín"
                            </p>
                        </div>
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-200 ease-linear shadow-2xl" data-carousel-item>
                        <img src="img/desiertoCarousel.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="desiertoIMG">
                        <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                            <h5 class="text-xl text-shadow: 1px 1px 1px #000">Desierto de Atacama</h5>
                            <p>
                                "El desierto más árido del mundo"
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Slider pagination -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            <!-- ====== Carousel End -->

            <!-- ====== About Section Start -->
            <section class="bg-white dark:bg-gray-900">
                <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                    <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400 ">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Turjoy: Tu Viaje con Estilo y Comodidad</h2>
                        <p class="mb-4 just">En Turjoy, nos esforzamos por brindar un servicio de transporte excepcional que supere tus expectativas. Nos dedicamos a garantizar la seguridad y comodidad de cada pasajero, así como a proporcionar una amplia selección de rutas y horarios para adaptarnos a tus necesidades</p>
                        <p class="just">Creemos que cada viaje es una oportunidad para crear nuevos recuerdos y vivir aventuras únicas. Te invitamos a unirte a nosotros en esta emocionante travesía para descubrir la belleza y diversidad de nuestro país.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <img class="w-full rounded-lg" src="img/Bus.jpg" alt="bus1_IMG">
                        <img class="mt-4 w-full lg:mt-10 rounded-lg" src="img/Bus2.jpg" alt="bus2_IMG">
                    </div>
                </div>
            </section>
            <!-- ====== About Section End -->

            <!--  Team Section Start -->
            <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
                <div class="container mx-auto">
                    <div class="-mx-4 flex flex-wrap">
                        <div class="w-full px-4">
                        <div class="mx-auto mb-[60px] max-w-[510px] text-center">
                            <h2 class="text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]">
                                La increíble historia de Turjoy
                            </h2>
                            <p class="text-body-color text-base">
                                Muchas variaciones de viajes, demasiados pasajes, él fue el indicado
                                para construir el imperio del transporte.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="mx-4 flex flex-wrap justify-center shadow">
                        <div class="px-4 md:w-1/2 xl:w-1/4">
                            <div class="mx-auto mb-10 w-full max-w-[370px]">
                                <div class="relative overflow-hidden rounded-lg">
                                    <img
                                        src="img/Italo-Donoso.jpg"
                                        alt="image"
                                        class="mx-auto m-4 shadow"
                                        width="200"
                                        height="200"/>
                                    <div class="mx auto bottom-5 left-0 text-center">
                                        <div class="overflow-hidden rounded-lg bg-white py-5 px-3">
                                            <h3 class="text-dark text-base font-semibold">Italo Donoso</h3>
                                            <p class="text-body-color text-sm">CEO de Turjoy</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ====== Team Section End -->
        </div>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
@endsection
