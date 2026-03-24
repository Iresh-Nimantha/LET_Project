@extends('layouts.site')

@section('title', '| Our Services')

@section('content')
<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-gray-50 border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 bg-white/60 z-10"></div>
    <!-- Subtle abstract background pattern representing luxury/building -->
    <div class="absolute right-0 top-0 text-[15rem] font-bold text-gray-200 opacity-20 -translate-y-20 translate-x-20 font-outfit select-none">S</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
        <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">What We Offer</span>
        <h1 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-6">Our Services</h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">Comprehensive trade solutions for residential and commercial properties, delivered with precision and expertise.</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
                <div>
                    <!-- Card Image -->
                    <div class="relative h-[400px] rounded-2xl overflow-hidden mb-4 group cursor-pointer shadow-lg">
                        @if($service->image_path)
                            <img src="{{ str_starts_with($service->image_path, 'data:image') ? $service->image_path : Storage::url($service->image_path) }}" alt="{{ $service->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @else
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2000&auto=format&fit=crop" alt="{{ $service->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent pointer-events-none"></div>
                        
                        <a href="{{ route('services.show', $service) }}" class="absolute inset-0 z-10 w-full h-full"></a>

                        <div class="absolute top-4 right-4 bg-white rounded-full w-10 h-10 flex items-center justify-center transform group-hover:bg-gold transition-colors z-20 pointer-events-none shadow-md">
                            <i class="fa-solid fa-arrow-up-right text-gray-900 group-hover:text-white"></i>
                        </div>
                        
                        <div class="absolute bottom-6 left-6 right-6 text-center z-20 pointer-events-none">
                            <h4 class="text-white text-xl font-bold font-outfit mb-0">{{ $service->title }}</h4>
                        </div>
                    </div>
                    
                    <!-- Accordion Item (Using identical styling from homepage) -->
                    <div x-data="{ open: false }" class="border border-gold/40 rounded p-4 cursor-pointer hover:border-gold transition-colors bg-white shadow-sm" @click="open = !open">
                        <div class="flex justify-between items-center text-gray-700 font-medium text-sm">
                            <span class="truncate pr-2">Q. {{ Str::limit($service->description, 40) }} ?</span>
                            <div class="w-5 h-5 rounded-full bg-gold flex items-center justify-center text-white text-xs shrink-0 shadow-inner">
                                <i class="fa-solid fa-chevron-down" x-show="!open"></i>
                                <i class="fa-solid fa-chevron-up" x-show="open" x-cloak></i>
                            </div>
                        </div>
                        <div x-show="open" x-cloak class="mt-4 text-xs text-gray-600 border-t border-gray-100 pt-3 leading-relaxed">
                            {{ $service->description }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-12">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fa-solid fa-folder-open text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl text-gray-900 font-outfit font-semibold mb-2">No Services Available</h3>
                    <p class="text-gray-500">We are currently updating our list of public services. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative bg-beige overflow-hidden rounded-[4rem] mx-4 sm:mx-8 mb-24 max-w-[90rem] xl:mx-auto">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold font-outfit text-gray-900 mb-6 drop-shadow-sm">Need a custom solution?</h2>
        <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto leading-relaxed">We provide tailored services for unique or complex projects. Get in touch with our experts today to discuss your vision.</p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
            <a href="{{ route('contact.create') }}" class="bg-gold hover:bg-gold-600 text-white font-bold py-4 px-10 rounded text-sm transition-colors shadow-lg tracking-widest uppercase">
                Contact Us <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
            <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}" class="flex items-center text-gold font-bold text-lg hover:text-gold-600 transition-colors">
                <div class="w-8 h-8 bg-gold rounded-full flex items-center justify-center text-white mr-3 shadow-md">
                    <i class="fa-solid fa-phone transform rotate-90 text-sm"></i>
                </div>
                Call: {{ $setting->phone ?? '0203 172 4720' }}
            </a>
        </div>
    </div>
</section>
@endsection

