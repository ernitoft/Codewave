@extends('layouts.app')


@section('content')
<style>
    .left {
        float: left;
        margin-right: 15px;
    }
    body {
            background-color: #EAEAEA;
            display: grid;
            min-height: 100vh;
            grid-template-rows: auto 1fr auto;
        }

</style>
<body>
    <div style="background-color: #f4f4f4">
            <div class="shadow-lg py-16 sm:py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                  <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Turjoy | Administrador</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Herramientas utilizadas</p>
                    <p class="mt-2 text-lg leading-8 text-gray-600">El proyecto "Sistema Web – Reserva de pasajes Turjoy" tiene como objetivo principal la conceptualización, diseño y desarrollo de una plataforma web moderna y atractiva para CodeWave, una empresa líder en tecnología y desarrollo de software.</p>
                  </div>
                  <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none  lg:gap-y-16">
                      <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900 m-2 mx-auto">
                            <img src="img/githubLogo.png" alt="gitHubLogo" height="30" width="30" class="left">
                            <aside>Github</aside>
                        </dt>
                        <dd class="text-base leading-7 text-gray-600">Ha posibilitado el seguimiento de problemas, la revisión de código, la integración continua, optimizando así la eficiencia y la calidad del desarrollo del sitio web.</dd>
                      </div>
                      <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900 m-2 mx-auto">
                            <img src="img/xamppLogo.png" alt="gitHubLogo" height="30" width="30" class="left">
                            <aside>Xampp</aside>
                        </dt>
                        <dd class="text-base leading-7 text-gray-600">Es esencial para la gestión de la base de datos, proporcionando un entorno local donde hemos desarrollado, probado y optimizado la estructura y funcionalidad de la base de datos antes de implementarla en el entorno de producción.</dd>
                      <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900 m-2 mx-auto">
                            <img src="img/laravelLogo.png" alt="gitHubLogo" height="30" width="30" class="left">
                            <aside>Laravel</aside>
                        </dt>
                        <dd class="text-base leading-7 text-gray-600">Como marco de desarrollo PHP robusto y altamente eficiente, nos ha permitido crear un sitio web dinámico y escalable con facilidad.</dd>
                      </div>
                      <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900 m-2 mx-auto">
                            <img src="img/vsLogo.png" alt="gitHubLogo" height="30" width="30" class="left">
                            <aside>Visual Studio Code</aside>

                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">Con su interfaz ligera y potentes características, nos ha permitido escribir y editar código de manera eficiente, así como integrar extensiones útiles para facilitar el desarrollo y la colaboración. </dd>
                      </div>
                      <p class="m-4 relative mx-auto">Esta combinación de herramientas ha facilitado la creación de un sitio web de alta calidad, con un código bien estructurado y funcionalidades optimizadas, cumpliendo así con los estándares y la visión de CodeWave.</p>
                    </dl>
                  </div>
                </div>
              </div>
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
@endsection
