<?php

use Livewire\Volt\Component;

new class extends Component {
    public $image;
}; ?>

<a href="{{ route('cloudinary.images.show', $image) }}"
    class="relative hover:brightness-110 hover:scale-[1.02] transform ease-out duration-300 rounded-lg overflow-hidden group">
    <img class="h-full max-w-full rounded-lg object-cover z-0" src="{{ $image->transformed_url }}" alt="Gallery image "
        lazy>

</a>
