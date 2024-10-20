<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;
use App\Tools\Helpers;
use App\Models\CloudinaryImage;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Background;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Effect;
use App\Tools\ImagePrompts;

new class extends Component {
    use WithFileUploads; // 1MB Max

    #[Rule('image|max:1024')]
    public $image;

    public $text = '';

    #[Rule('required')]
    public $theme = '';

    #[Rule('required')]
    public $format = 'none-format';

    #[Rule('required')]
    public $filter = 'none-filter';

    public $preview;

    public function with()
    {
        $imagePrompts = new ImagePrompts();
        return [
            'themes' => $imagePrompts->themes(),
            'formats' => $imagePrompts->formats(),
            'filters' => $imagePrompts->filters(),
        ];
    }

    public function updatedImage()
    {
        //dd($this->image);
        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            try {
                $this->preview = $this->image->temporaryUrl();
            } catch (\Exception $e) {
                Log::error('Error creating temporary URL: ' . $e->getMessage());
                $this->preview = null;
            }
        } else {
            $this->preview = null;
        }
    }

    public function handleSubmit()
    {
        // cargamos la lib de prompts
        $imagePrompts = new ImagePrompts();

        // validar los campos
        $this->validate();

        // cargar los helpers
        $helpers = new Helpers();

        $user = auth()->user() ?? null;
        // comprobar si puede subir imagenes o ya ha cumplido el limite
        if (!$helpers->canUploadImages($user)) {
            if ($user) {
                $this->addError('image', 'Has alcanzado el límite de subidas de imágenes diarias que está en 10 para evitar abusones.');
            } else {
                $this->addError('image', 'Debes iniciar sesión para subir hasta 10 imágenes por día.');
            }
            return;
        }
        $uploadedFile = null;

        // subir la imagen a cloudinary
        if ($this->format === 'none-format') {
            $uploadedFile = cloudinary()->upload($this->image->getRealPath(), [
                'folder' => 'portfolio_ai',
                'public_id' => pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME),
            ]);
        } else {
            $selectedFormat = $imagePrompts->getFormat($this->format);
            $uploadedFile = cloudinary()->upload($this->image->getRealPath(), [
                'folder' => 'portfolio_ai',
                'public_id' => pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME),
                'transformation' => [
                    'crop' => 'fill',
                    'gravity' => 'auto',
                    'aspect_ratio' => str_replace('ar_', '', explode(',', $selectedFormat['prompt'])[2]),
                ],
            ]);
        }

        // Obtener la URL segura de la imagen desde el objeto de respuesta de Cloudinary
        $secureUrl = $uploadedFile->getSecurePath();

        // Extraer el public_id desde la respuesta
        $publicId = $uploadedFile->getPublicId();

        // Obtener los parámetros relacionados con los efectos de la imagen
        $effect = $imagePrompts->getFilter($this->filter);
        $theme = $imagePrompts->getTheme($this->theme);
        $format = $imagePrompts->getFormat($this->format);

        $prompt_effect = $effect ? $effect['prompt'] : '';
        $prompt_theme = $theme ? $theme['prompt'] . ' ' . $this->text : '';
        $prompt_format = $format ? $format['prompt'] : '';


        // Agregar los efectos válidos a un array
        $transformations = [];

        // Agregar los efectos válidos a un array y filtrar los vacíos
        $transformations = array_filter([$prompt_theme, $prompt_effect, $prompt_format]);

        // Unir las transformaciones con ","
        $transformation = implode(',', $transformations);

        // Limpiar comas repetidas, eliminar /, ,/ o ,,
        $transformation = str_replace([',,', '/,', ',/', ' ,/', '/ ,'], [',', '/', '/', '/', '/'], $transformation);

        // Si no hay transformaciones, dejar vacío
        $transformation = $transformation ?: '';

        // url encode
        $transformation = urlencode($transformation);

        // Modificar la URL para incluir la transformación
        $transformedUrl = str_replace('upload/', "upload/{$transformation}/", $secureUrl);

        // Limpiar comas repetidas, eliminar /, ,/ o ,,
        $transformedUrl = str_replace([',,', '/,', ',/', ' ,/', '/ ,'], [',', '/', '/', '/', '/'], $transformedUrl);


        // Ahora puedes crear el registro en la base de datos usando los datos obtenidos de la subida
        $cloudinaryImage = CloudinaryImage::create([
            'url' => $uploadedFile->getSecurePath(),
            'public_id' => $uploadedFile->getPublicId(),
            'transformed_url' => $transformedUrl,
            'data' => $this->text,
            'user_id' => auth()->id() ?? null,
            'user_ip_hashed' => $helpers->getHasedIp() ?? null,
        ]);

        //dd($secureUrl, $publicId, $transformedUrl);

        if ($cloudinaryImage) {
            // redirigir a la vista de la imagen subida
            return redirect()->route('cloudinary.images.show', $cloudinaryImage);
        } else {
            $this->addError('image', 'Error al subir la imagen, por favor intenta de nuevo.');
        }
    }
}; ?>

<div class="w-full max-w-5xl mx-auto">
    <form wire:submit="handleSubmit" class="grid grid-cols-12 w-full">
        <!-- selectores de imagen -->
        <div class="col-span-4 h-full max-h-[700px] overflow-y-scroll overflow-hidden gap-2 dark-scrollbar">
            <!-- Theme selector Background -->
            <section>
                <h2 class="text-left w-full my-0 text-sm mb-4">Cambiar fondo de imagen o atuendo</h2>
                <div class="flex flex-wrap gap-4 justify-start">
                    @foreach ($themes as $theme)
                        <label class="image-option select-none w-20 flex flex-col items-center cursor-pointer">
                            <input type="radio" name="theme" value="{{ $theme['value'] }}" wire:model="theme"
                                required />
                            <img src="{{ $theme['image'] }}" alt="{{ $theme['label'] }}" class="size-16"
                                draggable="false" title="Crear imagen con {{$theme['label']}}" />
                            <span class="text-white w-full text-center">{{ $theme['label'] }}</span>
                        </label>
                    @endforeach
                </div>
                @error('theme')
                    <span class="error text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </section>




            <!-- Format selector Background -->
            <section>
                <h2 class="text-left w-full text-sm mb-4">Cambiar formato de la imagen</h2>
                <div class="flex flex-wrap gap-4 justify-start">
                    @foreach ($formats as $index => $format)
                        <label class="image-option select-none w-20 flex flex-col items-center cursor-pointer">
                            <input type="radio" name="format" value="{{ $format['value'] }}" wire:model="format"
                                required />
                            <img src="{{ $format['image'] }}" alt="{{ $format['label'] }}" class="size-16"
                                draggable="false" title="Crear imagen con {{$theme['label']}}" />
                            <span class="text-white w-full text-center">{{ $format['label'] }}</span>
                        </label>
                    @endforeach
                </div>
                @error('format')
                    <span class="error text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </section>


            <!-- Filter selector Background -->
            <section>
                <h2 class="text-left w-full text-sm mb-4">Cambiar Filtro de la imagen</h2>
                <div class="flex flex-wrap gap-4 justify-start">
                    @foreach ($filters as $index => $filter)
                        <label class="image-option select-none w-20 flex flex-col items-center cursor-pointer">
                            <input type="radio" name="filter" value="{{ $filter['value'] }}" wire:model="filter"
                                required />
                            <img src="{{ $filter['image'] }}" alt="{{ $filter['label'] }}" class="size-16"
                                draggable="false" title="Crear imagen con {{$theme['label']}}" />
                            <span class="text-white w-full text-center">{{ $filter['label'] }}</span>
                        </label>
                    @endforeach
                </div>
                @error('filter')
                    <span class="error text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </section>
        </div>

        <!-- preview de la imagen -->
        <div class=" col-span-8 flex flex-col pl-4">
            <div class="mb-4 flex flex-col w-full">
                <label for="image-upload" class="block text-sm font-medium text-gray-100 mb-2">
                    Selecciona una imagen
                </label>
                <div
                    class="mt-1 flex justify-center items-center self-center max-w-lg w-full px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md aspect-square">
                    <div class="space-y-1 text-center">
                        @if ($preview)
                            <img src="{{ $preview }}" alt="Preview" class="mx-auto max-h-[500px] mb-2">
                        @else
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @endif
                        <div class="flex text-sm text-gray-600 items-center justify-center w-full">
                            <label for="image-upload" title="Cargar imagen"
                                class="relative cursor-pointer bg-gray-700 px-4 py-2 rounded-full font-medium text-primary hover:text-primary-ligth focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                <span>Cargar imagen</span>
                                <input id="image-upload" wire:model="image" type="file" accept="image/*"
                                    class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 1MB</p>
                    </div>
                </div>
                @error('image')
                    <span class="error text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-5">
                <label for="text-input" class="block text-sm font-medium text-gray-100 mb-2 ">
                    Añade más personalización
                </label>
                <textarea id="text-input"
                    class="w-full p-2 border border-gray-300 rounded bg-google-dark text-gray-100 focus:ring-offset-1 focus:ring-offset-inherit"
                    rows="2" placeholder="Una pata de Adamantium estilo Wolverine..." maxlength="120" wire:model="text"></textarea>
                @error('text')
                    <span class="error text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-primary text-google-decoration font-extrabold text-xl uppercase py-2 px-4 rounded hover:bg-primary-ligth transition duration-300 flex items-center justify-center"
                wire:loading.class="opacity-50">
                <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                </svg>
                Cargar y Transformar
            </button>
            <div wire:loading class="text-gray-200 flex flex-col gap-4 mt-5">
                <div class="flex flex-row items-center justify-center gap-3">
                    <x-icons.suerte class="size-10" />
                    <span>El dev ha trabajado para que se suba la imagen...</span>
                </div>
                <span>Estamos intentando subir la imagen a los servidores de Cloudinary y transformando...</span>
            </div>
        </div>
    </form>
</div>
