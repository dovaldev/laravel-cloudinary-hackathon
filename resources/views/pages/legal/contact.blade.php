@section('seo')
    <x-tools.seo title="Página no encontrada no se encuentra el enlace o ha caducado"
        description="Esta es la página a la que vas cuando estás más perdido que un pulpo en un garaje o un junior que no sabe por donde empezar para ser Senior."
        robots="noindex, nofollow" />
@endsection
<x-guest-layout>
    <section class="w-full h-full">
        <div class="py-12 px-4 h-full mx-auto max-w-screen-xl lg:py-24 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <div class="w-full relative">
                    <img src="{{ asset('images/calabaza-404.webp') }}" alt="404" class="z-0 size-48 absolute -top-24 rotate-[15deg] right-24" />
                    <h1 class="mb-4 text-9xl font-extrabold !text-red-700 !z-10">404</h1></div>
                <p class="mb-4 text-3xl tracking-tight font-bold text-primary md:text-4xl">
                    Esta redirección no existe o ha sido borrada!</p>
                <p class="mb-4 text-lg font-light text-gray-200 ">¡A saber que carallo estás buscando!</p>
                <a href="/"
                    class="inline-flex text-black uppercase bg-accent focus:ring-4 focus:outline-none focus:ring-primary-300 font-bold rounded-3xl text-base px-5 py-2.5 text-center my-4">
                    Volver a la página principal
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
