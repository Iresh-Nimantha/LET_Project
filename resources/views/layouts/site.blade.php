<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($setting) && $setting->site_name ? $setting->site_name : config('app.name', 'London Elite Trades') }} @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <!-- Favicon -->
        @if(isset($setting) && $setting->logo_path)
            <link rel="icon" href="{{ str_starts_with($setting->logo_path, 'data:image') ? $setting->logo_path : Storage::url($setting->logo_path) }}" />
        @else
            <link rel="icon" href="/favicon.ico" />
        @endif

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            [x-cloak] { display: none !important; }
            body { font-family: 'Inter', sans-serif; }
            h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
            
            /* Custom Scrollbar for light premium theme */
            ::-webkit-scrollbar { width: 10px; }
            ::-webkit-scrollbar-track { background: #f9fafb; }
            ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 5px; }
            ::-webkit-scrollbar-thumb:hover { background: #A68A36; }
        </style>
    </head>
    <body x-data="{ loading: true }" x-init="window.addEventListener('load', () => setTimeout(() => loading = false, 400))" class="font-sans antialiased bg-white text-gray-900 flex flex-col min-h-screen selection:bg-gold selection:text-white">
        
        <!-- Premium Global Preloader -->
        <div x-show="loading" x-transition.opacity.duration.600ms class="fixed inset-0 z-[100] bg-white flex flex-col items-center justify-center">
            <div class="relative w-16 h-16 mb-4">
                <div class="absolute inset-0 rounded-full border-t-2 border-gold animate-spin"></div>
                <div class="absolute inset-2 rounded-full border-r-2 border-gray-900 animate-spin" style="animation-direction: reverse; animation-duration: 1.5s;"></div>
            </div>
            <div class="text-gold tracking-widest uppercase text-xs font-bold animate-pulse">Loading</div>
        </div>
        <!-- Navbar -->
        @include('site.partials.navbar')

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('site.partials.footer')

    </body>
</html>
