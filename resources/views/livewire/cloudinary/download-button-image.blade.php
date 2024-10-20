<?php

use Livewire\Volt\Component;

new class extends Component {
    public $image_url;
    public $button_text = 'Descargar Imagen';


    public function download()
    {
        // reemplazar todos los espacios por un formato de url
        $url = str_replace(' ', '%20', $this->image_url);
        return response()->streamDownload(function () use ($url) {
            echo file_get_contents($url);
        }, basename($url));
    }
};
?>
<div class="mt-4 text-center h-10 my-5 flex-1">
    <a href="#" wire:click="download"
        class="bg-accent px-4 py-2 rounded hover:bg-primary text-google-dark uppercase font-bold flex items-center gap-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-download">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4" />
            <path d="M12 13l0 9" />
            <path d="M9 19l3 3l3 -3" />
        </svg>
        {{ $button_text }}
    </a>
</div>
