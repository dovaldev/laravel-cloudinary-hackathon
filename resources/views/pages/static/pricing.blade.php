@section('seo')
    <x-tools.seo title="profileAI.top - Precios para todos los bolsillos"
        description="¡Precios tan buenos que te reirás! Aquí en profileAI.top, ofrecemos opciones que se adaptan a tu cartera (mientras quede cash, claro)."
        robots="noindex, nofollow" />
@endsection

@php
    $pricings = [
        [
            'name' => 'Plan “De Gratis”',
            'price' => '0€',
            'description' => 'Para los que quieren probar sin aflojar la cartera.',
            'features' => [
                'Hasta 3 transformaciones/día sin cuenta',
                'No necesitas registro',
                '¡Gratis mientras queden créditos!',
                'Ideal para **picar** un rato',
            ],
            'cta' => '¡Empieza Gratis!',
        ],
        [
            'name' => 'Plan “Soy VIP”',
            'price' => '0€',
            'description' => 'Para los que les gusta ir un paso más allá y no van a pagar',
            'features' => [
                'Hasta 10 transformaciones/día',
                '¡Loguéate y sé VIP!',
                '¡Gratis mientras queden créditos!',
                'Acceso a la función **premium**',
                '¡No me das más cuartos, pero yo te doy más magia*!',
            ],
            'cta' => 'Sé VIP',
        ],
        [
            'name' => 'Plan “Forrados”',
            'price' => '∞€',
            'description' => 'Para los que no tienen problema en soltar la chequera.',
            'features' => [
                'Transformaciones ilimitadas',
                'Transforma lo que quieras, cuando quieras',
                '**Premium** a otro nivel',
                '¡Porque puedes!',
            ],
            'cta' => '¡Forrado!',
        ],
    ];
@endphp

<x-guest-layout>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h1 class="mb-4 text-4xl tracking-tight font-extrabold text-primary">¡Precios tan buenos que te reirás!
                </h1>
                <p class="mb-5 font-light text-gray-200 sm:text-xl">Aquí en profileAI.top, ofrecemos opciones que se
                    adaptan a tu cartera (mientras quede cash, claro).</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                @foreach ($pricings as $pricing)
                    <div
                        class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-200 bg-google-decoration rounded-lg border border-gray-100 shadow dark:border-gray-600">
                        <div class="flex flex-col items-stretch h-full">
                            <h3 class="mb-4 text-2xl font-semibold text-primary-ligth">{{ $pricing['name'] }}</h3>
                            <p class="font-light text-gray-300 sm:text-lg">{{ $pricing['description'] }}</p>
                            <div class="flex justify-center items-baseline my-8">
                                <span
                                    class="mr-2 text-5xl font-extrabold text-purple-500">{{ $pricing['price'] }}</span>
                                <span class="text-gray-500">/mes</span>
                            </div>
                            <!-- List -->
                            <ul role="list" class="mb-8 space-y-4 text-left">
                                @foreach ($pricing['features'] as $feature)
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-red-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="#"
                            class="text-black bg-primary hover:bg-primary-ligth hover:text-black font-semibold focus:ring-4 focus:ring-primary-200 rounded-lg text-sm px-5 py-2.5 text-center">{{ $pricing['cta'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
