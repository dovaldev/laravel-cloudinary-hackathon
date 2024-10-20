<x-guest-layout>
    <h1 class="text-3xl font-bold text-center text-primary px-2 mb-10">Imagen original y transformada</h1>
    <livewire:cloudinary.two-image
        :image_original="$cloudinaryImage->url"
        :image_transformed="$cloudinaryImage->transformed_url"
    />
    <x-tools.share-buttons :image_url="$cloudinaryImage->transformed_url" />
</x-guest-layout>
