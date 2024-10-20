
@php
    $url = url()->current();
    $baseUrl = url('/');
    $siteTwitter = '@dovaldev';
@endphp
@props([
    'title' => 'Crea imagenes para tus redes sociales con profileAI.TOP',
    'description' => 'Crea imagenes para tus redes sociales con profileAI.TOP, usando la tecnología de IA Generativa de Cloudinary.',
    'robots' => 'index, follow',
    'ogImage' => '/images/profileai-top-og.webp',
    'twImage' => '/images/profileai-top-og.webp',
    'twImageAlt' => 'Crea imagenes para tus redes sociales con profileAI.TOP',
    'urlCanonical' => ''
])


<title>{{$title}}</title>
<meta name="description"
    content="{{$description}}">
<meta name="robots" content="{{$robots}}">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{$title}}">
<meta property="og:description"
    content="{{$description}}">
<meta property="og:image" content="@if($ogImage){{$baseUrl}}/{{$ogImage}}@else @endif">
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{$title}}">
<meta property="twitter:description"
    content="{{$description}}">
<meta property="twitter:image" content="@if($twImage){{$baseUrl}}/{{$twImage}}@else @endif">
<meta property="twitter:image:alt" content="{{$twImageAlt}}">
<meta property="twitter:site" content="{{$siteTwitter}}">
<!-- Canonical -->
<link rel="canonical" href="{{ $urlCanonical ? $urlCanonical : $url }}">
