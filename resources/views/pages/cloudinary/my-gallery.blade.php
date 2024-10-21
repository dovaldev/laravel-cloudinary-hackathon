@section('seo')
    <x-tools.seo title="profileAI.top - Mi galeria de imagenes transformadas"
        description="Mi galeria de imagenes transformadas en profileAI.top. En esta página encontrarás mi galeria de imagenes transformadas."
        robots="noindex, follow" />
@endsection
<x-guest-layout>
    <h1 class="text-3xl font-bold text-center text-primary px-2">Mi galeria de imagenes transformadas</h1>
    @if ($cloudinaryImages->isEmpty())
        <p class="text-center text-lg text-gray-500">No hay imagenes para mostrar</p>
    @else
        <section class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full max-w-5xl mx-auto mt-10 px-2">
            @foreach ($cloudinaryImages->chunk(3) as $chunk)
                <div class="grid gap-4">
                    @foreach ($chunk as $image)
                        <livewire:cloudinary.gallery-image-item :$image :key="$image->id" />
                    @endforeach
                </div>
            @endforeach
        </section>
    @endif

    <div class="mt-12 max-w-5xl mx-auto paginate px-2">
        {{ $cloudinaryImages->links() }}
    </div>

</x-guest-layout>
