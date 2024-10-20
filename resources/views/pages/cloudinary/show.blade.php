<x-guest-layout>
    <h1 class="text-3xl font-bold text-center text-primary px-2 mb-10">Imagen original y transformada</h1>
    <div class="w-full my-4 max-w-xl mx-auto">
        <p class="w-full text-center text-balance">La imágen está tardando más de lo normal en cargar o no se ha podido cargar. Prueba a
            <a href="{{url('/')}}/image/{{$cloudinaryImage->id}}" class="font-bold"> recargar</a> esta página.
        </p>
    </div>
    <livewire:cloudinary.two-image
        :image_original="$cloudinaryImage->url"
        :image_transformed="$cloudinaryImage->transformed_url"
    />
    <x-tools.share-buttons :image_url="$cloudinaryImage->transformed_url" />
</x-guest-layout>
