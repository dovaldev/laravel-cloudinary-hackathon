@section('seo')
    <x-tools.seo title="Imagen Spoky para Halloween - profileAI.top"
        description="Imagen Spoky para Halloween. En esta página encontrarás una imagen Spoky para Halloween."
        robots="noindex, follow" />
@endsection
<x-guest-layout class="pt-0">
    <livewire:cloudinary.delete-button-image :cloudinaryImage="$cloudinaryImage" />
    <h1 class="text-3xl font-bold text-center text-primary px-2 mb-10">Imagen original y transformada</h1>
    <div class="w-full my-4 max-w-xl mx-auto">
        <p class="w-full text-center text-balance">Si la imágen está tardando más de lo normal en cargar o no se ha podido cargar. Prueba a
            <a href="{{url('/')}}/image/{{$cloudinaryImage->id}}" class="font-bold"> recargar</a> esta página.
        </p>
    </div>
    <livewire:cloudinary.two-image
        :image_original="$cloudinaryImage->url"
        :image_transformed="$cloudinaryImage->transformed_url"
    />
    <x-tools.share-buttons :image_url="$cloudinaryImage->transformed_url" />
</x-guest-layout>
