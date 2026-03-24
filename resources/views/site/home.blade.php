@extends('layouts.site')

@section('title', '| Home')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[85vh] lg:min-h-[750px] flex items-center bg-gray-100 overflow-hidden pt-32 lg:pt-40 pb-20">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40 z-10"></div>
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" alt="Pristine interior" class="w-full h-full object-cover">
    </div>

    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-2xl">
            <h1 class="text-5xl md:text-6xl font-bold font-outfit text-white mb-6 leading-tight drop-shadow-md">
                {!! nl2br(e($setting->hero_title ?? "Transform Your Home or \nPremises to Maximise it's Full Potential")) !!}
            </h1>
            
            <ul class="space-y-3 mb-10 text-white font-medium drop-shadow-md">
                <li class="flex items-center"><i class="fa-solid fa-check text-white mr-3"></i> We are a trusted and fully accredited Central London based building company.</li>
                <li class="flex items-center"><i class="fa-solid fa-check text-white mr-3"></i> From bespoke design to flawless craftsmanship.</li>
                <li class="flex items-center"><i class="fa-solid fa-check text-white mr-3"></i> Transparent pricing &amp; detailed project management.</li>
            </ul>

            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <a href="#contact-section" class="bg-gold hover:bg-gold-600 text-white px-8 py-3 rounded shadow-lg transition-colors text-center inline-block">
                    <div class="font-bold text-sm tracking-wide">GET YOUR FREE QUOTE TODAY</div>
                    <div class="text-[0.65rem] opacity-90 uppercase mt-0.5">Response within 1 hour</div>
                </a>
                <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}" class="bg-white hover:bg-gray-100 text-gray-900 font-bold px-8 py-4 rounded shadow-lg transition-colors text-center flex items-center justify-center">
                    CALL: {{ $setting->phone ?? '0203 172 4720' }}
                </a>
            </div>

            <p class="text-white text-sm opacity-90 drop-shadow max-w-xl">
                {{ $setting->hero_description ?? "From design to completion, we manage your entire project from start to finish, to ensure a stress-free and comfortable experience with us." }}
            </p>
        </div>
    </div>
    
    <div class="absolute bottom-0 right-0 z-20 bg-white rounded-tl-[3rem] px-10 pt-8 pb-4 hidden md:flex flex-col items-center shadow-lg">
        <div class="flex text-gold text-2xl space-x-1 mb-2">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            <span class="text-gray-600 text-lg font-medium ml-3 mt-1">Rated 5.0/5</span>
        </div>
        <div class="flex items-center mt-2">
            <svg class="w-8 h-8 mr-3" viewBox="0 0 48 48">
              <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
              <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
              <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
              <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
            </svg>
            <span class="font-medium text-gray-900 text-lg">By Proud London Property Owners</span>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">Our Services</span>
            <h2 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-2">We specialise in all aspects of property</h2>
            <h3 class="text-3xl md:text-4xl text-gray-400 font-light font-outfit">Renovation &amp; improvement, including:</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($services->take(6) as $index => $service)
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

                        <div class="absolute top-4 right-4 bg-white rounded-full w-10 h-10 flex items-center justify-center transform group-hover:bg-gold transition-colors z-20 pointer-events-none">
                            <i class="fa-solid fa-arrow-up-right text-gray-900 group-hover:text-white"></i>
                        </div>
                        
                        <div class="absolute bottom-6 left-6 right-6 text-center z-20 pointer-events-none">
                            <h4 class="text-white text-xl font-bold font-outfit mb-0">{{ $service->title }}</h4>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="text-center max-w-4xl mx-auto">
            <p class="text-gray-500 text-sm mb-8 px-4 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                <a href="{{ route('services.index') }}" class="bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded transition-colors text-sm tracking-wide shadow-md">
                    VIEW MORE SERVICES
                </a>
                <a href="tel:6475736044" class="flex items-center text-gold font-bold text-lg hover:text-gold-600 transition-colors">
                    <div class="w-8 h-8 bg-gold rounded-full flex items-center justify-center text-white mr-3">
                        <i class="fa-solid fa-phone transform rotate-90 text-sm"></i>
                    </div>
                    Call: 647-573-6044
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-24 bg-beige relative rounded-[4rem]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">Our Projects</span>
            <h2 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-4">Our objective is to deliver<br><span class="text-gray-400 font-light">The ultimate project to the highest standards.</span></h2>
            <p class="text-gray-500 text-sm">
                We are committed to exceeding your expectations. Our focus on clear communication, attention to detail, and quality workmanship ensures your project is a success.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @foreach($projects->take(3) as $project)
                <div class="relative h-[450px] rounded-3xl overflow-hidden shadow-xl group">
                    @if($project->image_path)
                        <img src="{{ str_starts_with($project->image_path, 'data:image') ? $project->image_path : Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    @else
                        <!-- Placeholder specific to the image layout style -->
                        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=2000&auto=format&fit=crop" alt="Project" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-center transform translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
                        <h4 class="text-white text-xl font-medium">{{ $project->title }}</h4>
                    </div>
                    <a href="{{ route('projects.show', $project) }}" class="absolute inset-0 z-10 w-full h-full"></a>
                </div>
            @endforeach
        </div>
        
        <!-- Action Row -->
        <div class="flex flex-col sm:flex-row justify-center items-center gap-6 mb-12">
            <a href="#contact-section" class="bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded transition-colors text-sm tracking-wide shadow-md">
                GET A FREE QUOTE
            </a>
            <a href="tel:6475736044" class="flex items-center text-gold font-bold text-lg hover:text-gold-600 transition-colors">
                <div class="w-8 h-8 bg-gold rounded-full flex items-center justify-center text-white mr-3">
                    <i class="fa-solid fa-phone transform rotate-90 text-sm"></i>
                </div>
                Call: 647-573-6044
            </a>
        </div>


    </div>
</section>

<!-- Why Choose Us & Vision -->
<section id="about" class="bg-white">
    <!-- Why Choose Us Half -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left Text Box -->
            <div>
                <h2 class="text-4xl md:text-5xl font-light text-gray-900 mb-6 font-outfit">{{ $setting->about_title ?? "Why Choose Us?" }}</h2>
                <p class="text-gray-500 text-sm mb-10 leading-relaxed max-w-md">
                    {{ $setting->about_description ?? "We handle every stage, from initial design to final completion, ensuring a seamless & stress-free experience." }}
                </p>
                
                <div class="flex gap-4 mb-10">
                    <a href="{{ route('services.index') }}" class="bg-gold hover:bg-gold-600 text-white font-bold px-6 py-3 rounded text-sm transition-colors shadow-md tracking-wider">VIEW OUR SERVICES</a>
                    <a href="#contact-section" class="bg-black hover:bg-gray-800 text-white font-bold px-6 py-3 rounded text-sm transition-colors shadow-md tracking-wider">CONTACT US</a>
                </div>

            </div>
            
            <!-- Right Features Box -->
            <div class="relative overflow-hidden rounded-xl bg-gray-50">
                <!-- Decorative Timber Frame image behind cards -->
                <img src="https://images.unsplash.com/photo-1541888081628-6629ec2bf126?q=80&w=800&auto=format&fit=crop" alt="Timber frame" class="absolute inset-0 object-cover w-[150%] h-[150%] -left-1/4 -top-1/4 opacity-10 z-0 grayscale mix-blend-multiply">
                
                <div class="relative z-10 space-y-4 p-8">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-xl shadow-md flex items-center p-6 border border-gray-100 transform hover:-translate-y-1 transition-transform">
                        <div class="w-14 h-14 rounded-xl bg-gold flex items-center justify-center text-white text-2xl shrink-0 shadow-inner">
                            <i class="fa-regular fa-clipboard"></i>
                        </div>
                        <div class="ml-6">
                            <h4 class="text-gray-900 font-bold mb-1 text-sm tracking-wide">PROVEN TRACK RECORD</h4>
                            <p class="text-gray-500 text-xs leading-relaxed max-w-xs">We have successfully completed numerous projects across London and the surrounding areas.</p>
                        </div>
                    </div>
                    <!-- Feature 2 -->
                    <div class="bg-white rounded-xl shadow-md flex items-center p-6 border border-gray-100 transform hover:-translate-y-1 transition-transform">
                        <div class="w-14 h-14 rounded-xl bg-gold flex items-center justify-center text-white text-2xl shrink-0 shadow-inner">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                        <div class="ml-6">
                            <h4 class="text-gray-900 font-bold mb-1 text-sm tracking-wide">DEDICATED PROJECT MANAGEMENT</h4>
                            <p class="text-gray-500 text-xs leading-relaxed max-w-xs">Our team ensures projects are delivered on time and within budget.</p>
                        </div>
                    </div>
                    <!-- Feature 3 -->
                    <div class="bg-white rounded-xl shadow-md flex items-center p-6 border border-gray-100 transform hover:-translate-y-1 transition-transform">
                        <div class="w-14 h-14 rounded-xl bg-gold flex items-center justify-center text-white text-2xl shrink-0 shadow-inner">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <div class="ml-6">
                            <h4 class="text-gray-900 font-bold mb-1 text-sm tracking-wide">QUALITY CRAFTSMANSHIP</h4>
                            <p class="text-gray-500 text-xs leading-relaxed max-w-xs">We maintain traditional tradesman values while embracing modern construction techniques.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Vision Half -->
    <div class="bg-sand py-24 relative overflow-hidden">
        <!-- Background image half -->
        <div class="absolute right-0 bottom-0 w-[45%] h-full hidden lg:block rounded-l-full overflow-hidden shadow-2xl">
            <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=1000&auto=format&fit=crop" alt="Finished interior" class="w-full h-full object-cover">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-xl">
                <span class="text-white font-semibold uppercase tracking-widest text-sm mb-4 block drop-shadow-sm">YOUR VISION, OUR EXPERTISE</span>
                <h2 class="text-4xl md:text-5xl font-bold font-outfit text-white mb-2 leading-tight">With you, whatever. From complex</h2>
                <h3 class="text-3xl md:text-4xl text-white/70 font-light font-outfit mb-8">Structural works to the fine finishing detail.</h3>
                
                <p class="text-white/80 text-sm mb-8 leading-relaxed">
                    London Elite Trades is a leading construction company in London, specialising in high-quality home and commercial renovations. With a team of experienced project managers, architects, and skilled tradespeople, we deliver exceptional results on every project.
                </p>

                <a href="{{ route('services.index') }}" class="inline-block bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded text-sm transition-colors shadow-md mb-12 tracking-wider">
                    OUR SERVICES
                </a>

            </div>
        </div>
    </div>
</section>

<!-- Section 6: Serving London & Beyond -->
<section class="py-24 bg-[#EAE6D7] relative border-t border-white/50 border-b border-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12 items-center">
            <div class="lg:w-3/5">
                <h2 class="text-4xl md:text-5xl font-light text-gray-900 mb-6 font-outfit">Serving London &amp; Beyond</h2>
                <p class="text-gray-500 text-sm mb-8 leading-relaxed max-w-2xl">
                    With our head office based in Central London, we proudly serve homeowners and businesses throughout Greater London, Essex, Kent, Surrey, Hertfordshire, Buckinghamshire, and Berkshire.
                </p>
                <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 font-outfit">Client Satisfaction is Our Priority</h3>
                <p class="text-gray-500 text-sm mb-10 leading-relaxed max-w-2xl">
                    We are committed to exceeding your expectations. Our focus on clear communication, attention to detail, and quality workmanship ensures your project is a success.
                </p>
                
                <!-- Regional Cards -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
                    @php
                        $regions = ['Greater London', 'Essex', 'Kent', 'Surrey', 'Hertfordshire', 'Buckinghamshire', 'Berkshire'];
                        $images = [
                            'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?q=80&w=400&fit=crop',
                            'https://images.unsplash.com/photo-1577995817088-348df8403bc6?q=80&w=400&fit=crop',
                            'https://images.unsplash.com/photo-1563721345435-08e01fd5d309?q=80&w=400&fit=crop',
                            'https://images.unsplash.com/photo-1590480927764-9be11ff833b1?q=80&w=400&fit=crop',
                            'https://images.unsplash.com/photo-1549488344-c7da4194017a?q=80&w=400&fit=crop',
                            'https://images.unsplash.com/photo-1621376829707-1d54fb4a22e8?q=80&w=400&fit=crop',
                            'https://images.unsplash.com/photo-1555029323-83ea1c9f2851?q=80&w=400&fit=crop'
                        ];
                    @endphp
                    @foreach($regions as $index => $region)
                        <div class="bg-white rounded-xl shadow overflow-hidden transform hover:-translate-y-1 transition-transform">
                            <img src="{{ $images[$index] }}" alt="{{ $region }}" class="w-full h-24 object-cover">
                            <div class="p-3 text-center">
                                <h4 class="text-xs font-semibold text-gray-800">{{ $region }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-6 mb-10">
                    <a href="{{ route('services.index') }}" class="bg-white border border-gray-200 hover:border-gold hover:text-gold text-gray-900 font-bold px-8 py-3 rounded-md text-sm transition-colors shadow-sm tracking-widest uppercase">
                        Get Our Services
                    </a>
                    <a href="tel:6475736044" class="flex items-center text-gold font-bold text-lg hover:text-gold-600 transition-colors">
                        <div class="w-8 h-8 bg-gold rounded-full flex items-center justify-center text-white mr-3 shadow-md">
                            <i class="fa-solid fa-phone transform rotate-90 text-sm"></i>
                        </div>
                        Call: 647-573-6044
                    </a>
                </div>


            </div>
            
            <div class="lg:w-2/5 flex justify-center opacity-80">
                <!-- Simple abstract map vector path placeholder with gold tint -->
                <svg class="w-full max-w-sm text-gold filter drop-shadow-xl" viewBox="0 0 200 300" fill="currentColor">
                    <path d="M60 20 L70 10 L100 0 L130 15 L145 10 L155 30 L180 50 L190 70 L170 80 L160 110 L175 140 L165 170 L145 180 L130 220 L160 250 L180 280 L150 290 L110 270 L80 280 L50 260 L60 230 L30 220 L10 200 L20 170 L0 150 L10 120 L40 130 L60 100 L50 70 Z"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Testimonials & FAQ -->
<section id="reviews" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 leading-tight">See What Customers<br><span class="font-light text-gray-500">Are Saying About Us</span></h2>
            </div>
            <a href="#" class="bg-gold hover:bg-gold-600 text-white font-bold px-6 py-3 rounded text-xs transition-colors shadow-md uppercase tracking-wider mt-6 md:mt-0">
                READ MORE REVIEWS FROM OUR HAPPY CLIENTS
            </a>
        </div>

        <!-- Masonry-like Grid / Flex layout for reviews -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 items-start">
            @foreach($testimonials->take(5) as $testimonial)
            <div class="bg-white border border-gray-200 rounded-xl p-8 relative shadow-sm hover:shadow-lg transition-shadow">
                <i class="fa-solid fa-quote-right absolute top-6 right-6 text-4xl text-gold/20"></i>
                <div class="flex text-gold text-sm mb-4">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-gray-600 text-sm mb-8 leading-relaxed italic">
                    {{ $testimonial->quote }}
                </p>
                <div class="flex items-center">
                    @if($testimonial->image_path)
                        <img src="{{ str_starts_with($testimonial->image_path, 'data:image') ? $testimonial->image_path : Storage::url($testimonial->image_path) }}" alt="{{ $testimonial->name }}" class="w-10 h-10 rounded-full object-cover grayscale mr-4">
                    @else
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-4 text-gray-500 font-bold">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    @endif
                    <h4 class="text-gray-900 font-bold text-sm">{{ $testimonial->name }}</h4>
                </div>
            </div>
            @endforeach
        </div>


        <!-- FAQ Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-5 relative">
                <div class="absolute -left-16 -top-16 text-[15rem] font-bold text-gold opacity-10 leading-none select-none font-outfit">?</div>
                <h2 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 leading-tight relative z-10">Frequently<br>Asked<br><span class="text-gold">Question</span></h2>
            </div>
            
            <div class="lg:col-span-7 space-y-4">
                @forelse($faqs as $index => $faq)
                    <div x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }" class="bg-[#EAE6D7] rounded p-5 cursor-pointer shadow-sm transition-colors" :class="{'bg-gold text-white': open, 'text-gray-800 hover:bg-[#e0dccb]': !open}" @click="open = !open">
                        <div class="flex justify-between items-center font-medium text-sm">
                            <span class="pr-4">{{ $faq->question }}</span>
                            <i class="fa-solid fa-chevron-down" x-show="!open"></i>
                            <i class="fa-solid fa-chevron-up" x-show="open" x-cloak></i>
                        </div>
                        <div x-show="open" x-cloak class="mt-4 text-xs opacity-90 border-t border-black/10 pt-3 leading-relaxed font-light" :class="{'border-white/20': open}">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm italic py-4">Questions and Answers will appear here soon.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Section 8: Contact -->
<section id="contact-section" class="py-24 relative overflow-hidden flex items-center min-h-[700px]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <img src="https://images.unsplash.com/photo-1545620894-67d1db1973fe?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
    </div>

    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="text-white">
                <h1 class="text-5xl md:text-6xl font-bold font-outfit mb-12 leading-tight drop-shadow-lg">Ready to Start Your<br>Project?</h1>
                
                <div class="space-y-4 mb-16">
                    <div class="bg-white/95 backdrop-blur rounded p-4 flex items-center shadow-lg w-max pr-12">
                        <div class="w-10 h-10 rounded-full bg-gold flex items-center justify-center text-white mr-4 shadow-inner">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}" class="text-gray-900 font-bold">Call Us On: {{ $setting->phone ?? '0203 172 4720' }}</a>
                    </div>
                    <div class="bg-white/95 backdrop-blur rounded p-4 flex items-center shadow-lg w-max pr-12">
                        <div class="w-10 h-10 rounded-full bg-gold flex items-center justify-center text-white mr-4 shadow-inner">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <a href="mailto:{{ $setting->email ?? 'info@londonelitetrades.co.uk' }}" class="text-gray-900 font-bold">Mail To: {{ $setting->email ?? 'info@londonelitetrades.co.uk' }}</a>
                    </div>
                </div>

                <h3 class="text-2xl font-bold font-outfit mb-3">Get Your Free Quote Today</h3>
                <p class="text-white/80 text-sm max-w-md leading-relaxed">
                    Contact us today to discuss your building project. There's no obligation - just expert advice from our friendly team.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl">
                <h3 class="text-xl font-bold font-outfit text-gray-900 text-center mb-8 uppercase tracking-widest">DROP US A LINE</h3>
                
                @if(session('success'))
                    <div class="mb-6 bg-green-50 text-green-600 px-4 py-3 rounded border border-green-200 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="name" placeholder="Name" required class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                        <input type="text" name="subject" placeholder="Company/Subject Name" class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <input type="email" name="email" placeholder="Email" required class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                        <input type="tel" name="phone" placeholder="Phone" class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                    </div>
                    <div class="mb-4">
                        <textarea name="message" rows="5" placeholder="Your Query" required class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors resize-none"></textarea>
                    </div>
                    
                    <div class="mb-6 flex items-start">
                        <input type="checkbox" id="terms" required class="mt-1 text-gold focus:ring-gold rounded border-gray-300">
                        <label for="terms" class="ml-3 text-xs text-gray-500 leading-relaxed">I agree that by submitting this form, I accept your website terms of use, privacy policy and cookie policy.</label>
                    </div>

                    <button type="submit" class="w-full bg-gold hover:bg-gold-600 text-white font-bold py-4 rounded text-sm transition-colors shadow-md tracking-widest uppercase">
                        SEND
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</section>

<!-- Section 9: Our Latest Blog -->
<section id="blogs" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <h2 class="text-4xl md:text-5xl font-light font-outfit text-gray-900 leading-tight">Our Latest Blog</h2>
            <a href="{{ route('blogs.index') }}" class="bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded text-xs transition-colors shadow-md uppercase tracking-wider mt-6 md:mt-0">
                READ MORE BLOG
            </a>
        </div>

        @if($blogs->count() >= 1)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Large Left Article -->
            <div class="flex flex-col">
                <div class="relative h-[450px] rounded-3xl overflow-hidden mb-6 group">
                    @if($blogs[0]->cover_image_path)
                        <img src="{{ str_starts_with($blogs[0]->cover_image_path, 'data:image') ? $blogs[0]->cover_image_path : Storage::url($blogs[0]->cover_image_path) }}" alt="{{ $blogs[0]->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    @else
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    @endif
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $blogs[0]->title }}</h3>
                <p class="text-gray-500 text-sm line-clamp-2 mb-2">{{ $blogs[0]->excerpt }}</p>
                <a href="{{ route('blogs.show', $blogs[0]) }}" class="text-gray-500 hover:text-gold text-sm font-medium transition-colors mb-6">... Read More</a>

            </div>

            <!-- Two Smaller Right Articles -->
            <div class="flex flex-col gap-8">
                @foreach($blogs->skip(1)->take(2) as $blog)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                    <div class="relative h-48 rounded-3xl overflow-hidden group">
                        @if($blog->cover_image_path)
                            <img src="{{ str_starts_with($blog->cover_image_path, 'data:image') ? $blog->cover_image_path : Storage::url($blog->cover_image_path) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @else
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @endif
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-900 mb-2">{{ $blog->title }}</h3>
                        <p class="text-gray-500 text-xs line-clamp-3 mb-2 leading-relaxed">{{ $blog->excerpt }}</p>
                        <a href="{{ route('blogs.show', $blog) }}" class="text-gray-500 hover:text-gold text-xs font-medium transition-colors mb-4 block">... Read More</a>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

