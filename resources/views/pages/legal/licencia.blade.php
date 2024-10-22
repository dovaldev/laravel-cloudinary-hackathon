@section('seo')
    <x-tools.seo title="Licencias de Imágenes y otros recursos - profileAI.top"
        description="Licencias de Imágenes y otros recursos utilizados en profileAI.top. En esta página encontrarás las licencias de las imágenes y otros recursos utilizados en profileAI.top."
        robots="noindex, nofollow" />
@endsection
@php
    $licences = [
        [
            'title' => 'Pixabay',
            'author' => 'Sammy-Sander',
            'author_link' => 'https://pixabay.com/es/users/sammy-sander-10634669/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=5892131',
            'source' => 'https://pixabay.com/es//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=5892131'
],
        [
            'title' => 'midudev',
            'author' => 'midudevr',
            'author_link' => 'https://x.com/midudev',
            'source' => 'https://images.app.goo.gl/yJoWNFyQwkbaLRqY6'
        ]
    ]
@endphp
<x-guest-layout>
    <section class="container max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center text-primary mb-10">Licencias de Imágenes y otros recursos</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($licences as $license )
                <div class="bg-google-decoration border border-gray-700 rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex flex-col justify-center items-center p-6 h-full w-full">
                        <h2 class="text-xl font-semibold text-accent mb-2 w-full text-left my-0">{{ $license['title'] }}</h2>
                        <p class="text-gray-100 w-full">
                            Imagen de <a href="{{ $license['author_link'] }}" class="text-red-500 hover:text-red-700 transition-colors duration-200">{{ $license['author'] }}</a> en <a href="{{ $license['source'] }}" class="text-red-500 hover:text-red-700 transition-colors duration-200">{{ $license['title'] }}</a>
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</x-guest-layout>
