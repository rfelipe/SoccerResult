<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Laravel')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        {{-- Seção do Header --}}
        @yield('header')

        {{-- Seção do Conteúdo Principal --}}
        @yield('main')

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            {{-- Conteúdo do footer, se desejar --}}
        </footer>
    </body>
</html