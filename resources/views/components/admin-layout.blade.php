@php
    $nav = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'fa-solid fa-chart-line'],
        ['label' => 'Services', 'route' => 'admin.services.index', 'icon' => 'fa-solid fa-screwdriver-wrench'],
        ['label' => 'Projects', 'route' => 'admin.projects.index', 'icon' => 'fa-solid fa-hammer'],
        ['label' => 'Blogs', 'route' => 'admin.blogs.index', 'icon' => 'fa-solid fa-newspaper'],
        ['label' => 'Testimonials', 'route' => 'admin.testimonials.index', 'icon' => 'fa-solid fa-star'],
        ['label' => 'FAQs (Q&A)', 'route' => 'admin.faqs.index', 'icon' => 'fa-solid fa-circle-question'],
        ['label' => 'Contact Leads', 'route' => 'admin.contacts.index', 'icon' => 'fa-solid fa-envelope'],
        ['label' => 'Admins', 'route' => 'admin.users.index', 'icon' => 'fa-solid fa-user-shield'],
        ['label' => 'Site Settings', 'route' => 'admin.settings.edit', 'icon' => 'fa-solid fa-gear'],
    ];

    $current = request()->route()?->getName();
    $setting = \App\Models\SiteSetting::first();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @if(!blank($title ?? ''))
                {{ $title }} Â· {{ $setting->site_name ?? config('app.name', 'London Elite Trades') }}
            @else
                {{ $setting->site_name ?? config('app.name', 'London Elite Trades') }} - Admin
            @endif
        </title>

        <!-- Fonts & Icons -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-gray-50 text-gray-900" x-data="{ sidebarOpen: false, desktopCollapsed: false }">
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-gray-900/80 backdrop-blur-sm lg:hidden transition-opacity" @click="sidebarOpen = false"></div>

        <!-- Sidebar / Drawer -->
        <aside :class="[
                sidebarOpen ? 'translate-x-0' : '-translate-x-full',
                desktopCollapsed ? 'lg:w-20' : 'lg:w-72'
            ]" 
            class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-gray-200 transition-all duration-300 ease-in-out lg:translate-x-0 lg:fixed lg:inset-y-0 lg:flex lg:flex-col shadow-drawer lg:shadow-none h-screen overflow-y-auto">
            
            <div class="flex items-center justify-between h-20 px-6 border-b border-gray-100 transition-all duration-300" :class="desktopCollapsed ? 'lg:px-0 lg:justify-center' : ''">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3" :class="desktopCollapsed ? 'lg:mx-auto' : ''">
                    @if(isset($setting) && $setting->logo_path)
                        <img src="{{ str_starts_with($setting->logo_path, 'data:image') ? $setting->logo_path : Storage::url($setting->logo_path) }}" alt="Logo" class="h-10 w-auto object-contain transition-all duration-300" :class="desktopCollapsed ? 'lg:h-8' : ''">
                        <span x-show="!desktopCollapsed" class="font-bold text-gray-900 lg:inline hidden"></span>
                    @else
                        <div class="text-xl font-bold font-outfit uppercase tracking-wider text-gray-900 transition-all duration-300" :class="desktopCollapsed ? 'lg:text-xs lg:text-center' : ''">
                            <span x-show="!desktopCollapsed" class="inline lg:inline">London</span>
                            <span x-show="desktopCollapsed" class="hidden lg:block">LDN</span>
                            <span x-show="!desktopCollapsed" class="text-primary-500 block text-xs inline lg:block">Elite Trades</span>
                        </div>
                    @endif
                </a>
                
                <button @click="sidebarOpen = false" class="lg:hidden text-gray-500 hover:text-gray-900 focus:outline-none">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="px-6 py-4 transition-all duration-300" :class="desktopCollapsed ? 'lg:px-0 lg:text-center' : ''">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest" :class="desktopCollapsed ? 'lg:hidden' : ''">Admin Panel</span>
                <i class="fa-solid fa-ellipsis text-gray-400 hidden lg:hidden" :class="desktopCollapsed ? 'lg:inline-block' : 'hidden'"></i>
            </div>

            <nav class="flex-1 px-4 pb-4 space-y-1 overflow-x-hidden">
                @foreach($nav as $item)
                    @php
                        $isActive = $current === $item['route'] || str_starts_with((string) $current, str_replace('.index', '.', $item['route']));
                    @endphp
                    <a
                        href="{{ route($item['route']) }}"
                        :title="desktopCollapsed ? '{{ $item['label'] }}' : ''"
                        @class([
                            'flex items-center rounded-xl p-3 text-sm font-medium transition-all duration-200 group',
                            'bg-primary-50 text-primary-600 shadow-sm' => $isActive,
                            'text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:shadow-sm' => !$isActive,
                        ])
                        :class="desktopCollapsed ? 'lg:justify-center lg:px-0' : 'gap-3 px-4'"
                    >
                        <div class="flex items-center justify-center w-6">
                            <i class="{{ $item['icon'] }} text-lg transition-colors {{ $isActive ? 'text-primary-500' : 'text-gray-400 group-hover:text-primary-500' }}"></i>
                        </div>
                        <span class="whitespace-nowrap transition-all duration-300" :class="desktopCollapsed ? 'lg:hidden lg:opacity-0' : 'opacity-100'">
                            {{ $item['label'] }}
                        </span>
                    </a>
                @endforeach
            </nav>
            
            <div class="p-4 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" :title="desktopCollapsed ? 'Logout' : ''" :class="desktopCollapsed ? 'lg:justify-center lg:px-0' : 'gap-3 px-4'" class="flex w-full items-center rounded-xl p-3 text-sm font-medium text-red-600 hover:bg-red-50 hover:shadow-sm transition-all group">
                        <div class="flex items-center justify-center w-6">
                            <i class="fa-solid fa-arrow-right-from-bracket text-lg"></i>
                        </div>
                        <span class="whitespace-nowrap transition-all duration-300" :class="desktopCollapsed ? 'lg:hidden lg:opacity-0' : 'opacity-100'">
                            Logout
                        </span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-h-screen transition-all duration-300" :class="desktopCollapsed ? 'lg:pl-20' : 'lg:pl-72'">
            
            <!-- Top Header -->
            <header class="sticky top-0 z-30 flex items-center h-20 px-4 sm:px-6 lg:px-8 bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm transition-all duration-300">
                
                <div class="flex items-center gap-4">
                    <!-- Mobile trigger -->
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-500 hover:text-gray-900 focus:outline-none bg-gray-50 p-2 rounded-lg transition-colors">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>

                    <!-- Desktop collapse trigger -->
                    <button @click="desktopCollapsed = !desktopCollapsed" class="hidden lg:flex text-gray-500 hover:text-primary-600 focus:outline-none bg-gray-50 hover:bg-primary-50 w-10 h-10 items-center justify-center rounded-lg transition-colors">
                        <i class="fa-solid transition-transform duration-300" :class="desktopCollapsed ? 'fa-indent' : 'fa-outdent'"></i>
                    </button>

                    <div class="font-outfit font-semibold text-xl text-gray-800 tracking-tight hidden sm:block">
                        @isset($title)
                            {{ $title }}
                        @endisset
                    </div>
                </div>

                <div class="flex-1 flex justify-end items-center">
                    <div class="flex items-center gap-4 border-l border-gray-200 pl-4">
                        <div class="text-sm font-medium text-gray-700 hidden sm:block">
                            <span class="text-gray-400 text-xs mr-1">Logged in as:</span>
                            {{ auth()->user()?->name }}
                        </div>
                        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-50 hover:bg-primary-500 hover:text-white text-gray-500 transition-colors shadow-sm" title="View Site">
                            <i class="fa-solid fa-globe"></i>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    @isset($header)
                        <div class="mb-8">
                            {{ $header }}
                        </div>
                    @endisset

                    <div class="animate-fade-in">
                        {{ $slot }}
                    </div>
                </div>
            </main>
            
        </div>

        <style>
            .animate-fade-in {
                animation: fadeIn 0.4s ease-out forwards;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </body>
</html>

