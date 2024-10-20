<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('seo')
        @yield('seo')
    @else
        <title>profileAI.top - Hackathon Cloudinary Halloween AI </title>
    @endif

    <!-- Fonts -->
    @hasSection('fonts')
        @yield('fonts')
    @endif

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon-48x48.png" sizes="48x48" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @cloudinaryJS
    <!-- Styles -->
    @livewireStyles
</head>

<body class="flex flex-col justify-between min-h-screen">
    <x-structure.navbar />
    <div {{ $attributes->merge(['class' => 'font-sans text-gray-900 antialiased flex-1 px-2 py-10']) }}>
        {{ $slot }}
    </div>
    <x-structure.footer />

    @livewireScripts
</body>

</html>
