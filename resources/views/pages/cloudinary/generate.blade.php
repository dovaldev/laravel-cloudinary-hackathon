@section('seo')
    <x-tools.seo title="Crear imagenes Spoky para Halloween - profileAI.top"
        description="Crear imagenes Spoky para Halloween. En esta página encontrarás una herramienta para crear imagenes Spoky para Halloween."
        robots="index, follow" />
@endsection
<x-guest-layout>
    <section class="w-full flex flex-col gap-2">
        <livewire:cloudinary.upload-image />
    </section>
</x-guest-layout>
