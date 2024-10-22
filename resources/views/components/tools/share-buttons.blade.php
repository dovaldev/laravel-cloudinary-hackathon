@props(['image_url'])
@php
    // obtener image url y convertir los espacio es blanco en %20
    $image_url = str_replace(' ', '%20', $image_url);
@endphp
<section id="compartir-articulo" class="flex flex-col mt-10 min-h-10 w-full max-w-md mx-auto bg-google-decoration p-6 border border-gray-800 rounded-xl">
    <span class="text-primary-ligth text-xl font-bold text-center w-full">Compartir imagen transformada</span>
    <div class="flex justify-center items-center gap-5 mt-5">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $image_url }}"
            class="text-gray-300 hover:text-primary">
            <x-icons.facebook class="size-6" />
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ $image_url }}"
            class="text-gray-300 hover:text-primary">
            <x-icons.twitter class="size-6" />
        </a>
        <a href="https://www.linkedin.com/shareArticle?url={{ $image_url }}"
            class="text-gray-300 hover:text-primary">
            <x-icons.linkedin class="size-6" />
        </a>
        <a href="https://api.whatsapp.com/send?text={{ $image_url }}"
            class="text-gray-300 hover:text-primary">
            <x-icons.whatsapp class="size-6" />
        </a>
</section>
