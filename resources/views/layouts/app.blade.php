<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title', 'Resultados de Futebol ao Vivo')</title>
    
    <meta name="description" content="@yield('meta_description', 'Acompanhe os resultados ao vivo dos principais campeonatos de futebol.')">
    <meta name="keywords" content="futebol, resultados ao vivo, jogos de futebol, campeonatos, placar ao vivo">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Soccer Results">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (Para compartilhamento em redes sociais) -->
    <meta property="og:title" content="@yield('title', 'Resultados de Futebol ao Vivo')">
    <meta property="og:description" content="@yield('meta_description', 'Acompanhe os resultados ao vivo dos principais campeonatos de futebol.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', asset('images/seo-image.jpg'))">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Resultados de Futebol ao Vivo')">
    <meta name="twitter:description" content="@yield('meta_description', 'Acompanhe os resultados ao vivo dos principais campeonatos de futebol.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/seo-image.jpg'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @yield('header')
    @yield('main')

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        &copy; {{ date('Y') }} Soccer Results - Todos os direitos reservados.
    </footer>
</body>
</html>
