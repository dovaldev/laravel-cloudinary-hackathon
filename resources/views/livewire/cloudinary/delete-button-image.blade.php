<?php

use Livewire\Volt\Component;

new class extends Component {
    public $cloudinaryImage;

    public function deleteImage()
    {
        // delete image in db
        $this->cloudinaryImage->delete();
        // delete image in cloudinary
        try {
            cloudinary()->destroy($this->cloudinaryImage->public_id);
        } catch (\Exception $e) {
            // log error
            logger($e->getMessage());
        }
        // redirect to my-images
        redirect()->route('cloudinary.my-gallery');
    }
}; ?>

<div class="w-full bg-google-decoration px-2 py-3">
    <div class="w-full flex justify-end items-center gap-4 max-w-5xl mx-auto">
        <button wire:click="deleteImage" wire:confirm="¿Estas seguro de que quieres borrar esta imagen?"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Eliminar
        </button>

    </div>
</div>
