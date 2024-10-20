
@php
    $url = url()->current();
    $baseUrl = url('/');
    $siteTwitter = '@enlace.top';
@endphp
@props([
    'title' => 'enlace.TOP - El mejor acortador de enlaces',
    'description' => 'Acorta tus enlaces de forma rápida y sencilla. Comparte tus URLs personalizadas cortas y de la forma más simple. Temporales y con contraseña.',
    'robots' => 'index, follow',
    'ogImage' => '/images/og/og-image-enlace.webp',
    'twImage' => '/images/og/og-image-enlace.webp',
    'twImageAlt' => 'Acortador de enlaces enlace.top',
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
