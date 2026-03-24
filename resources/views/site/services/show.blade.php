@extends('layouts.site')

@section('title', '| ' . $service->title)

@section('content')
<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-gray-50 border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 bg-white/60 z-10"></div>
    <div class="absolute right-0 top-0 text-[15rem] font-bold text-gray-200 opacity-20 -translate-y-20 translate-x-20 font-outfit select-none">S</div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
        <div class="flex justify-center mb-6">
            <a href="{{ route('services.index') }}" class="text-gold hover:text-gold-600 transition-colors uppercase tracking-widest text-sm font-semibold flex items-center">
                <i class="fa-solid fa-arrow-left mr-2"></i> All Services
            </a>
        </div>
        <h1 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-6">{{ $service->title }}</h1>
    </div>
</section>

<!-- Main Content -->
<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Service Details -->
            <div class="lg:col-span-2">
                <div class="bg-gray-50 border border-gray-100 shadow-md rounded-xl p-8 mb-8">
                    <div class="flex items-center mb-8 border-b border-gray-200 pb-6">
                        <div class="w-20 h-20 bg-white border border-gray-100 shadow-md rounded-lg flex items-center justify-center mr-6">
                            <i class="{{ $service->icon_class ?? 'fa-solid fa-wrench' }} text-4xl text-gold"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold font-outfit text-gray-900">Service Overview</h2>
                        </div>
                    </div>
                    
                    <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed font-light">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>

                <div class="bg-beige border border-gold/20 rounded-xl p-8 flex flex-col sm:flex-row items-center justify-between shadow-lg">
                    <div class="mb-4 sm:mb-0 text-center sm:text-left">
                        <h3 class="text-2xl font-bold font-outfit text-gray-900 mb-2">Ready to start?</h3>
                        <p class="text-gray-600 font-light">Our team is ready to deliver this service for you.</p>
                    </div>
                    <a href="{{ route('contact.create') }}" class="inline-flex items-center bg-gold text-white font-bold py-3 px-8 rounded hover:bg-gold-600 transition-colors shadow-md tracking-wider uppercase text-sm">
                        Request a Quote
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 border border-gray-100 shadow-xl rounded-xl p-8 sticky top-32">
                    <h3 class="text-xl font-bold font-outfit text-gray-900 mb-6 flex items-center">
                        <span class="w-1.5 h-6 bg-gold mr-3 rounded-full shadow-inner"></span> Other Services
                    </h3>
                    
                    <ul class="space-y-4">
                        @foreach($otherServices as $other)
                            <li>
                                <a href="{{ route('services.show', $other) }}" class="group flex items-center p-3 rounded bg-white hover:bg-gray-50 border border-gray-100 hover:border-gold/30 transition-all duration-300 shadow-sm">
                                    <div class="w-10 h-10 bg-gray-50 group-hover:bg-gold/10 rounded flex items-center justify-center mr-4 transition-colors">
                                        <i class="{{ $other->icon_class ?? 'fa-solid fa-wrench' }} text-gray-400 group-hover:text-gold transition-colors"></i>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-gray-900 font-medium transition-colors">{{ $other->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h3 class="text-xl font-bold font-outfit text-gray-900 mb-4">Need Help?</h3>
                        <p class="text-gray-500 text-sm mb-6 leading-relaxed">If you have any questions regarding our services, please contact us.</p>
                        <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}" class="flex items-center text-gold hover:text-gold-600 font-semibold mb-4 transition-colors">
                            <div class="w-8 h-8 rounded-full bg-gold/10 flex items-center justify-center mr-3">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </div>
                            {{ $setting->phone ?? '0203 172 4720' }}
                        </a>
                        <a href="mailto:{{ $setting->email ?? 'info@londonelitetrades.co.uk' }}" class="flex items-center text-gold hover:text-gold-600 font-semibold transition-colors">
                            <div class="w-8 h-8 rounded-full bg-gold/10 flex items-center justify-center mr-3">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            Email Us Support
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
