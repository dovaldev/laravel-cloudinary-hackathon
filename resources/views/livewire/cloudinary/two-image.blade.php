<?php

use Livewire\Volt\Component;

new class extends Component {
    public $image_original;
    public $image_transformed;


    public function with()
    {
        return [
            'image_original' => $this->image_original,
            'image_transformed' => $this->image_transformed,
        ];
    }
}; ?>

<div class="w-auto max-w-4xl mx-auto rounded-xl overflow-hidden select-none">
    <two-up>
        <div >
            <img id="original-image" src="{{ $image_original }}" alt="Original image" class="w-full h-[600px] object-contain">
        </div>
        <livewire:cloudinary.transformed-image :image_transformed="$image_transformed" key="image-transform" lazy/>
    </two-up>
    <div class="max-w-4xl flex flex-wrap justify-between gap-4 items-center">
        <livewire:cloudinary.download-button-image :image_url="$image_original" key="download-original" button_text="Descargar Original"/>
        <livewire:cloudinary.download-button-image :image_url="$image_transformed" key="download-transformed" button_text="Descargar Transformada"/>
    </div>
</div>
