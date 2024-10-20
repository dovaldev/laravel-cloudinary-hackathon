<x-guest-layout>
    <h1 class="text-3xl font-bold text-center text-primary px-2">Mi galeria de imagenes transformadas</h1>
    <section class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full max-w-5xl mx-auto mt-10 px-2">
        @foreach ($cloudinaryImages->chunk(3) as $chunk)
            <div class="grid gap-4">
                @foreach ($chunk as $image)
                    <a href="{{ route('cloudinary.images.show', $image) }}"
                        class="hover:brightness-105 hover:scale-[1.02] transform ease-out duration-300">
                        <img class="h-full max-w-full rounded-lg object-cover" src="{{ $image->transformed_url }}"
                            alt="Gallery image" lazy>
                    </a>
                @endforeach
            </div>
        @endforeach
    </section>

    <div class="mt-12 max-w-5xl mx-auto paginate px-2">
        {{ $cloudinaryImages->links() }}
    </div>

</x-guest-layout>
