@php
    $setting = \App\Models\SiteSetting::first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'London Elite Trades') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-white selection:bg-gold selection:text-white">
        <div class="min-h-screen flex flex-col md:flex-row">
            
            <!-- Left Side - Image & Branding -->
            <div class="hidden md:flex md:w-1/2 bg-gray-900 relative items-center justify-center p-12">
                <div class="absolute inset-0 z-0">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop" class="w-full h-full object-cover opacity-30" alt="Background">
                </div>
                
                <div class="relative z-10 text-white max-w-lg">
                    <h1 class="text-4xl md:text-5xl font-bold font-outfit mb-6 leading-tight">
                        Transform Your Home or Premises.
                    </h1>
                    <p class="text-lg opacity-80 mb-8 border-l-4 border-gold pl-4">
                        Secure administrative portal for managing content, projects, and leads. Authorized personnel only.
                    </p>
                    
                    <a href="{{ route('home') }}" class="inline-flex items-center text-gold hover:text-white font-medium transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Return to Main Website
                    </a>
                </div>
            </div>

            <!-- Right Side - Auth Form -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-8 bg-gray-50/50">
                <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden p-8 border border-gray-100">
                    
                    <div class="flex justify-center mb-8">
                        <a href="/">
                            @if(isset($setting) && $setting->logo_path)
                                <img src="{{ str_starts_with($setting->logo_path, 'data:image') ? $setting->logo_path : Storage::url($setting->logo_path) }}" alt="{{ $setting->site_name ?? 'London Elite Trades' }}" class="h-16 w-auto object-contain">
                            @else
                                <div class="text-3xl font-bold text-gray-900 leading-none block font-outfit uppercase tracking-wider text-center">
                                    London<br><span class="text-sm text-gold">Elite Trades</span>
                                </div>
                            @endif
                        </a>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 text-center mb-6 font-outfit">Welcome Back</h2>

                    {!! $slot !!}

                </div>

                <div class="mt-8 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} {{ $setting->site_name ?? 'London Elite Trades' }}. All rights reserved.
                </div>
            </div>

        </div>
    </body>
</html>

