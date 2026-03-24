<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'London Elite Trades') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-zinc-950 text-zinc-100 antialiased">
        <a href="#content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-zinc-900 focus:text-white focus:px-4 focus:py-2 focus:rounded">
            Skip to content
        </a>

        <div class="min-h-screen">
            @include('site.partials.nav')

            <main id="content">
                {{ $slot }}
            </main>

            @include('site.partials.footer')
        </div>
    </body>
</html>

