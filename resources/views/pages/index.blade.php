@section('seo')
    <x-tools.seo title="profileAI.top - Crea Imagenes Spoky para Halloween"
        description="Crea imagenes Spoky para Halloween con profileAI.top. Sube tus imagenes y transformalas con la IA Generativa de Cloudinary."
        robots="index, follow" />
@endsection
@section('fonts')
    <link rel="preload" href="fonts/belanosima-bold-webfont.woff2" as="font" type="font/woff2" crossorigin="anonymous">
@endsection

@php

    $featuresCards = [
        [
            'title' => 'Cambia la ropa de las personas',
            'description' =>
                'Cambia el atuendo, la ropa, añade detalles a partir de una descripción o seleccionando los valores por defecto.',
            'cta' => 'Generar',
            'url' => route('cloudinary.generate'),
            'image' => '/images/midudev-loading-after-change-cloth.webp',
        ],
        [
            'title' => 'Cambia el fondo de la imagen',
            'description' =>
                'Cambia el fondo de la imagen, añade efectos, cambia la iluminación y mucho más con la IA Generativa de Cloudinary.',
            'cta' => 'Generar',
            'url' => route('cloudinary.generate'),
            'image' => '/images/midudev-loading-after-change-bg.webp',
        ],
    ];
@endphp

<x-guest-layout class="!py-0 !px-0">
    <section class="relative w-full h-[700px]">
        <img src="images/hero-1-home-profileai.top.webp" alt="Hero image"
            class="w-full h-[700px] object-cover brightness-75">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full px-2">
            <h1
                class="font-belanosima font-bold text-4xl leading-[40px] px-2 md:text-7xl text-white text-center w-full md:leading-[90px] md:px-20">
                Crea imagenes <span>Spoky</span> para Halloween con <span>profileAI.top</span>
            </h1>

            <div
                class="w-full max-w-4xl px-6 py-4 bg-google-decoration flex flex-col mt-5 md:flex-row justify-between items-center mx-auto rounded-full gap-2 leading-4">
                <span class="text-white font-semibold text-lg text-center md:text-left mt-2 md:mt-0">Crear y transformar
                    mis imágenes para Halloween 👉</span>
                <a href="{{ route('cloudinary.generate') }}"
                    class="flex gap-2 text-black bg-accent hover:bg-primary hover:text-black text-left py-1.5 px-4 md:px-3 md:py-3 rounded-full text-base  md:text-xl uppercase font-bold items-center">
                    Subir
                    <svg class="size-6 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                        <path d="M12 9v6m-3-3h6" />
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="17" cy="7" r="1" />
                        <circle cx="7" cy="7" r="1" />
                        <circle cx="17" cy="17" r="1" />
                        <circle cx="7" cy="17" r="1" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="w-full max-w-5xl mx-auto py-10 px-2">
        <h2 class="text-left mt-0 mb-2">Crea imagenes para halloween con la IA Generativa de Cloudinary</h2>
        <p>Con profileAI.top puedes crear imagenes para halloween de manera sencilla y rápida. Sube tus imagenes y
            transformalas con la IA Generativa de Cloudinary.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10">
            @foreach ($featuresCards as $card )

                <div
                    class="bg-google-decoration p-4 rounded-3xl border border-gray-700 flex flex-col items-stretch hover:scale-[1.005] transition-all ease-in-out">
                    <div class="w-full flex flex-col">
                        <img src="{{ $card['image'] }}" alt="Hero image"
                            class="w-full h-54 object-cover rounded-lg">
                        <h3 class="text-primary-ligth font-extrabold my-2">{{ $card['title'] }}</h3>
                        <p>{{ $card['description'] }}</p>

                    </div>
                    <a href="{{ $card['url'] }}"
                        class=" self-end mt-10 px-4 py-2 bg-primary/70 text-white hover:bg-primary-ligth hover:text-black max-w-28 rounded-full text-center uppercase font-extrabold">
                        {{ $card['cta'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-guest-layout>
