<!-- Navbar -->
<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)" 
     :class="{ 'bg-white shadow-md': scrolled || open, 'bg-white': !scrolled && !open }" 
     class="fixed w-full z-50 transition-all duration-300">
    
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    @if(isset($setting) && $setting->logo_path)
                        <img src="{{ str_starts_with($setting->logo_path, 'data:image') ? $setting->logo_path : Storage::url($setting->logo_path) }}" alt="{{ $setting->site_name ?? 'London Elite Trades' }}" class="h-12 w-auto object-contain">
                    @else
                        <div class="relative w-12 h-12 flex items-center justify-center text-gold">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                                <path d="M4 19v2h16v-2H4zm0-4v2h16v-2H4zm0-4v2h16v-2H4zm0-4v2h16V7H4zm0-4v2h16V3H4z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900 leading-none block font-outfit uppercase tracking-wider">{{ explode(' ', $setting->site_name ?? 'London Elite Trades')[0] ?? 'London' }}</span>
                            <span class="text-xs text-gold font-semibold uppercase tracking-widest block">{{ implode(' ', array_slice(explode(' ', $setting->site_name ?? 'London Elite Trades'), 1)) }}</span>
                        </div>
                    @endif
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-gold font-medium text-sm transition-colors">Home</a>
                <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-gold font-medium text-sm transition-colors">Our Services</a>
                <a href="{{ url('/') }}#about" class="text-gray-700 hover:text-gold font-medium text-sm transition-colors">About Us</a>
                <a href="{{ route('blogs.index') }}" class="text-gray-700 hover:text-gold font-medium text-sm transition-colors">Blogs</a>
                <a href="{{ url('/') }}#reviews" class="text-gray-700 hover:text-gold font-medium text-sm transition-colors">Client Reviews</a>
                <a href="{{ route('contact.create') }}" class="text-gray-700 hover:text-gold font-medium text-sm transition-colors">Contact Us</a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:flex items-center">
                <a href="{{ route('contact.create') }}" class="bg-gold hover:bg-gold-600 text-white px-6 py-3 rounded text-center transition-colors shadow-lg">
                    <div class="font-bold text-sm tracking-wide">GET YOUR FREE QUOTE TODAY</div>
                    <div class="text-[0.65rem] opacity-90 uppercase mt-0.5">Response within 1 hour</div>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" type="button" class="text-gray-700 hover:text-gold focus:outline-none focus:text-gold transition-colors">
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div x-show="open"
         x-transition:enter="transition-opacity ease-linear duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-400"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-900/80 z-40 backdrop-blur-sm md:hidden"
         @click="open = false" x-cloak></div>

    <!-- Mobile Drawer -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-500 transform"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-400 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed inset-y-0 left-0 w-[80%] max-w-sm bg-white shadow-2xl z-50 md:hidden flex flex-col h-full overflow-y-auto" x-cloak>
         
        <div class="px-6 py-6 border-b border-gray-100 flex items-center justify-between">
            <div class="font-outfit font-bold text-xl uppercase tracking-wider text-gray-900">Elite Trades</div>
            <button @click="open = false" class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:text-gold hover:bg-gray-100 transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('home') }}" @click="open = false" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-900 border border-transparent hover:border-gray-100 hover:text-gold hover:bg-gray-50 transition-all"><i class="fa-solid fa-house w-6 text-gray-400"></i> Home</a>
            <a href="{{ route('services.index') }}" @click="open = false" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-900 border border-transparent hover:border-gray-100 hover:text-gold hover:bg-gray-50 transition-all"><i class="fa-solid fa-screwdriver-wrench w-6 text-gray-400"></i> Our Services</a>
            <a href="{{ url('/') }}#about" @click="open = false" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-900 border border-transparent hover:border-gray-100 hover:text-gold hover:bg-gray-50 transition-all"><i class="fa-solid fa-circle-info w-6 text-gray-400"></i> About Us</a>
            <a href="{{ route('blogs.index') }}" @click="open = false" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-900 border border-transparent hover:border-gray-100 hover:text-gold hover:bg-gray-50 transition-all"><i class="fa-solid fa-newspaper w-6 text-gray-400"></i> Blogs</a>
            <a href="{{ url('/') }}#reviews" @click="open = false" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-900 border border-transparent hover:border-gray-100 hover:text-gold hover:bg-gray-50 transition-all"><i class="fa-solid fa-star w-6 text-gray-400"></i> Reviews</a>
            <a href="{{ route('contact.create') }}" @click="open = false" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-900 border border-transparent hover:border-gray-100 hover:text-gold hover:bg-gray-50 transition-all"><i class="fa-solid fa-envelope w-6 text-gray-400"></i> Contact Us</a>
        </div>

        <div class="p-6 border-t border-gray-100 bg-gray-50">
            <a href="{{ route('contact.create') }}" class="flex flex-col w-full text-center bg-gold text-white px-4 py-3.5 rounded-xl font-bold shadow-md hover:bg-gold-600 transition-colors">
                <span class="text-sm tracking-widest">GET YOUR FREE QUOTE</span>
                <span class="text-[0.65rem] font-normal opacity-90 mt-1 uppercase">Response within 1 hour</span>
            </a>
        </div>
    </div>
</nav>

