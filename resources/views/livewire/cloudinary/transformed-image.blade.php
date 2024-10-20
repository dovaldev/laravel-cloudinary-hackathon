<?php

use Livewire\Volt\Component;

new class extends Component {
    public $image_transformed;
    public $is_loading = true;
    public $retry_count = 0;
    public $max_retries = 3;

    #[On('image-loaded')]
    public function imageLoaded()
    {
        $this->is_loading = false;
    }

    #[On('image-error')]
    public function imageError()
    {
        if ($this->retry_count < $this->max_retries) {
            $this->retry_count++;
            $this->dispatch('retry-image-load');
        } else {
            $this->is_loading = false;
            // Opcional: Aquí podrías mostrar un mensaje de error al usuario.
        }
    }
};
?>

<div>
    @if ($is_loading)
        <div class="relative h-[600px] w-full overflow-hidden rounded-lg">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 animate-gradient"
                style="background-size: 200% 100%; animation: gradientMove 3s linear infinite;">
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-white text-2xl font-bold">Transformando y Cargando la imagen...</span>
            </div>
        </div>
    @endif

    <img
        id="transformed-image"
        src="{{ $image_transformed }}"
        alt="Transformed image"
        class="w-full h-[600px] object-contain {{ $is_loading ? 'hidden' : '' }}"
        wire:loading.class="hidden"
        x-on:load="$wire.imageLoaded()"
        x-on:error="$wire.imageError()"
    >
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('image-loaded', () => {
            console.log('Imagen cargada');
        });

        Livewire.on('retry-image-load', () => {
            setTimeout(() => {
                const img = document.getElementById('transformed-image');
                img.src = img.src + '?' + new Date().getTime(); // Fuerza la recarga de la imagen
            }, 2000); // Reintentar después de 2 segundos
        });
    });
</script>
