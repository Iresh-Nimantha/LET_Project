@extends('layouts.site')

@section('title', '| Home')

@section('content')

<!-- Hero Section -->
<section
    class="relative min-h-[85vh] lg:min-h-[750px] flex items-center bg-gray-100 pt-32 lg:pt-40 pb-20 rounded-b-[2.5rem]">

    <!-- Background Image -->
    <div class="absolute inset-0 z-0 overflow-hidden rounded-b-[2.5rem]">
        <div class="absolute inset-0 bg-black/40 z-10"></div>
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop"
            alt="Pristine interior" class="w-full h-full object-cover">
    </div>

    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-12">
        <div class="max-w-2xl">

            @php
                $heroLines = explode("\n", $setting->hero_title ?? "Transform Your Home or\nPremises to Maximise it's Full Potential");
                $boldLine = $heroLines[0] ?? '';
                $lightLine = isset($heroLines[1]) ? $heroLines[1] : '';
            @endphp

            <h1 class="text-5xl md:text-6xl text-white mb-6 leading-tight drop-shadow-md">
                <span class="font-bold font-outfit">{{ trim($boldLine) }}</span><br>
                <span class="font-light font-outfit opacity-90">{{ trim($lightLine) }}</span>
            </h1>

            <ul class="space-y-2 mb-10 text-white font-medium drop-shadow-md text-[15px]">
                <li class="flex items-start"><span class="mr-3">✓</span> Trusted & accredited London builders</li>
                <li class="flex items-start"><span class="mr-3">✓</span> Bespoke design & craftsmanship</li>
                <li class="flex items-start"><span class="mr-3">✓</span> Transparent pricing & management</li>
            </ul>

            <div class="flex flex-col sm:flex-row gap-3 mb-8">
                <a href="#contact-section"
                    class="bg-[#C9A24A] hover:bg-[#a88133] text-white px-8 py-3 rounded-md shadow-lg text-center">
                    GET YOUR FREE QUOTE
                </a>

                <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}"
                    class="bg-white hover:bg-gray-100 text-gray-900 px-8 py-3 rounded-md shadow-lg text-center">
                    CALL: {{ $setting->phone ?? '0203 172 4720' }}
                </a>
            </div>

            <p class="text-white text-[13px] opacity-80 max-w-lg font-light">
                {{ $setting->hero_description ?? "We manage your full project from start to finish with a stress-free experience." }}
            </p>

        </div>
    </div>
    <!-- Grouped Bottom Right Elements Wrapper -->
    <div class="absolute bottom-0 right-0 z-30 hidden lg:flex flex-col items-end">
        
        <!-- 🔥 Top Right Inverse Curve (Outside the card, perfectly stacked) -->
        <div class="w-[2.5rem] h-[2.5rem] text-white">
            <svg viewBox="0 0 100 100" fill="currentColor" class="w-full h-full">
                <path d="M100 100 V0 C100 55.228 55.228 100 0 100 Z" />
            </svg>
        </div>

        <!-- 🔥 White filler extending the right edge upwards -->
        <div class="w-[2.5rem] h-[10rem] bg-white"></div>

        <!-- Bottom Right Card -->
        <div class="bg-white rounded-tl-[2.5rem] pl-16 pr-12 pt-8 pb-8 flex flex-col items-start relative w-auto">

            <!-- 🔥 Bottom Left Curve -->
            <div class="absolute bottom-0 -left-[2.5rem] w-[2.5rem] h-[2.5rem] text-white">
                <svg viewBox="0 0 100 100" fill="currentColor" class="w-full h-full">
                    <path d="M100 100 V0 C100 55.228 55.228 100 0 100 Z" />
                </svg>
            </div>

            <!-- ⭐ Rating -->
            <div class="flex items-center mb-4">
                <div class="flex text-[#FBBC04] space-x-1.5 text-2xl">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <span class="text-gray-500 font-medium ml-4 text-[1.15rem]">
                    Rated 5.0/5
                </span>
            </div>

            <!-- 🔍 Google Review -->
            <div class="flex items-center">
                <svg class="w-[2.2rem] h-[2.2rem] mr-4" viewBox="0 0 48 48">
                    <path fill="#EA4335"
                        d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z" />
                    <path fill="#4285F4"
                        d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z" />
                    <path fill="#FBBC05"
                        d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z" />
                    <path fill="#34A853"
                        d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
                </svg>

                <span class="font-medium text-gray-900 text-[1.15rem] tracking-tight">
                    By Proud London Property Owners
                </span>
            </div>

        </div>
    </div>
</section>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-white relative">

        <!-- Inverse Corner Fillet — hero bottom-left -->
        <div class="absolute top-0 left-0 w-[2.5rem] h-[2.5rem] text-white z-10 pointer-events-none">
            <svg viewBox="0 0 100 100" fill="currentColor" class="w-full h-full">
                <path d="M0 0 H100 C44.772 0 0 44.772 0 100 Z" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">Our Services</span>
                <h2 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-2">We specialise in all aspects of
                    property</h2>
                <h3 class="text-3xl md:text-4xl text-gray-400 font-light font-outfit">Renovation &amp; improvement,
                    including:</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($services->take(6) as $index => $service)
                    <div>
                        <!-- Card Image -->
                        <div
                            class="relative h-[400px] rounded-2xl overflow-hidden mb-4 group cursor-pointer shadow-lg transform hover:-translate-y-1 transition-transform duration-300">
                            @if($service->image_path)
                                <img src="{{ str_starts_with($service->image_path, 'data:image') ? $service->image_path : Storage::url($service->image_path) }}"
                                    alt="{{ $service->title }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @else
                                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2000&auto=format&fit=crop"
                                    alt="{{ $service->title }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent pointer-events-none">
                            </div>

                            <a href="{{ route('services.show', $service) }}" class="absolute inset-0 z-10 w-full h-full"></a>

                            <div
                                class="absolute top-4 right-4 bg-white rounded-full w-10 h-10 flex items-center justify-center transform group-hover:bg-gold transition-colors z-20 pointer-events-none">
                                <i class="fa-solid fa-arrow-right -rotate-45 text-gray-900 group-hover:text-white"></i>
                            </div>

                            <div class="absolute bottom-6 left-6 right-6 text-center z-20 pointer-events-none">
                                <h4 class="text-white text-xl font-bold font-outfit mb-0">{{ $service->title }}</h4>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-faq-item 
                                :question="$service->faq_question ?: 'What does this service include?'"
                                :answer="$service->faq_answer ?: 'From initial design and planning to final completion, we manage your entire project from start to finish, ensuring a stress-free and comfortable experience.'"
                            />
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="text-center max-w-4xl mx-auto">
                <p class="text-gray-500 text-sm mb-8 px-4 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                    <a href="{{ route('services.index') }}"
                        class="bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded transition-colors text-sm tracking-wide shadow-md">
                        VIEW MORE SERVICES
                    </a>
                    <a href="tel:6475736044"
                        class="flex items-center text-gold font-bold text-lg hover:text-gold-600 transition-colors">
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
    <section id="projects" class="py-24 bg-beige relative rounded-3xl my-8 mx-4 lg:mx-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">Our Projects</span>
                <h2 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-4">Our objective is to
                    deliver<br><span class="text-gray-400 font-light">The ultimate project to the highest standards.</span>
                </h2>
                <p class="text-gray-500 text-sm">
                    We are committed to exceeding your expectations. Our focus on clear communication, attention to detail,
                    and quality workmanship ensures your project is a success.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                @foreach($projects->take(3) as $project)
                    <div class="relative h-[450px] rounded-2xl overflow-hidden shadow-md group transform hover:-translate-y-1 transition-transform duration-300">
                        @if($project->image_path)
                            <img src="{{ str_starts_with($project->image_path, 'data:image') ? $project->image_path : Storage::url($project->image_path) }}"
                                alt="{{ $project->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=2000&auto=format&fit=crop"
                                alt="Project" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-center transform translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
                            <h4 class="text-white text-xl font-medium tracking-wide">{{ $project->title }}</h4>
                        </div>
                        <a href="{{ route('projects.show', $project) }}" class="absolute inset-0 z-10 w-full h-full"></a>
                    </div>
                @endforeach
            </div>

            <!-- Action Row -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-6 mb-12">
                <a href="#contact-section"
                    class="bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded transition-colors text-sm tracking-wide shadow-md">
                    GET A FREE QUOTE
                </a>
                <a href="tel:6475736044"
                    class="flex items-center text-gold font-bold text-lg hover:text-gold-600 transition-colors">
                    <div class="w-8 h-8 bg-gold rounded-full flex items-center justify-center text-white mr-3">
                        <i class="fa-solid fa-phone transform rotate-90 text-sm"></i>
                    </div>
                    Call: 647-573-6044
                </a>
            </div>

            <!-- Global Projects FAQs -->
            <div class="flex flex-col sm:flex-row gap-4 max-w-4xl mx-auto">
                <div class="flex-1">
                    <x-faq-item 
                        :question="$setting->projects_faq_1_question ?? 'What types of projects do you handle?'"
                        :answer="$setting->projects_faq_1_answer ?? 'We undertake a comprehensive range of construction and renovation projects, from complete residential extensions and custom structural works to bespoke commercial fit-outs and high-end property refurbishment.'"
                    />
                </div>
                <div class="flex-1">
                    <x-faq-item 
                        :question="$setting->projects_faq_2_question ?? 'How do you ensure project quality?'"
                        :answer="$setting->projects_faq_2_answer ?? 'Our dedicated project managers oversee every project detail. We employ experienced tradespeople, utilise premium materials, and maintain rigorous quality control inspections throughout every building phase.'"
                    />
                </div>
            </div>


        </div>
    </section>

<!-- Why Choose Us & Vision -->
<section id="about" class="bg-white">

    <!-- Why Choose Us Half -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 pb-0">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            <!-- Left Text Box -->
            <div class="pb-0">
                <h2 class="text-4xl md:text-5xl font-light text-gray-900 mb-5 font-outfit">
                    {{ $setting->about_title ?? "Why Choose Us?" }}
                </h2>

                <p class="text-gray-500 text-sm mb-8 leading-relaxed max-w-md">
                    {{ $setting->about_description ?? "We handle every stage, from initial design to final completion, ensuring a seamless & stress-free experience." }}
                </p>

                <div class="flex gap-4 mb-7">
                    <a href="{{ route('services.index') }}"
                        class="bg-gold hover:bg-gold-600 text-white font-bold px-7 py-3 rounded text-sm transition-colors shadow-md tracking-wider">
                        VIEW OUR SERVICES
                    </a>

                    <a href="#contact-section"
                        class="bg-black hover:bg-gray-800 text-white font-bold px-7 py-3 rounded text-sm transition-colors shadow-md tracking-wider">
                        CONTACT US
                    </a>
                </div>

                <div class="max-w-md mb-8">
                    <x-faq-item 
                        :question="$setting->why_choose_us_faq_question ?: 'What makes us different?'"
                        :answer="$setting->why_choose_us_faq_answer ?: 'We combine extensive local expertise with an unwavering dedication to premium quality. Each project benefits from our seasoned network of professionals and tradesmen.'"
                    />
                </div>

                <!-- Construction Image — overflows below -->
                <div class="w-[125%] hidden md:block -ml-12 relative z-10 drop-shadow-2xl transition-transform duration-700 hover:-translate-y-1">
                    <img 
                        src="https://truewesthomes.ca/wp-content/uploads/2025/11/truewest-house-rafters.webp"
                        alt="Timber frame construction"
                        class="w-full h-auto object-cover rounded-[1.5rem]">
                </div>
            </div>

            <!-- Right Features Box -->
            <div class="space-y-5 pt-4">

                <!-- Feature 1 -->
                <div class="bg-white rounded-2xl shadow-premium flex items-center p-7 border border-gray-100 hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-20 h-20 rounded-2xl bg-gold flex items-center justify-center text-white text-3xl shrink-0 shadow-md">
                        <i class="fa-regular fa-clipboard"></i>
                    </div>
                    <div class="ml-7">
                        <h4 class="text-gray-900 font-bold mb-2 text-sm tracking-wide">PROVEN TRACK RECORD</h4>
                        <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                            We have successfully completed numerous projects across London and the surrounding areas.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-2xl shadow-premium flex items-center p-7 border border-gray-100 hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-20 h-20 rounded-2xl bg-gold flex items-center justify-center text-white text-3xl shrink-0 shadow-md">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                    </div>
                    <div class="ml-7">
                        <h4 class="text-gray-900 font-bold mb-2 text-sm tracking-wide">DEDICATED PROJECT MANAGEMENT</h4>
                        <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                            Our team ensures projects are delivered on time and within budget.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-2xl shadow-premium flex items-center p-7 border border-gray-100 hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-20 h-20 rounded-2xl bg-gold flex items-center justify-center text-white text-3xl shrink-0 shadow-md">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <div class="ml-7">
                        <h4 class="text-gray-900 font-bold mb-2 text-sm tracking-wide">QUALITY CRAFTSMANSHIP</h4>
                        <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                            We maintain traditional tradesman values while embracing modern construction techniques.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Vision Half -->
    <div class="py-24 relative overflow-hidden" style="background-color: #8B7355;">

        <!-- Full-height right image -->
        <div class="absolute right-0 top-0 w-[45%] h-full hidden lg:block">
            <img 
                src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=1200&auto=format&fit=crop"
                alt="Finished interior"
                class="w-full h-full object-cover">
        </div>

        <!-- Subtle dark overlay on left to improve text legibility -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/30 via-black/10 to-transparent hidden lg:block pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-[500px]">

                <span class="text-white/80 font-semibold uppercase tracking-widest text-xs mb-5 block">
                    YOUR VISION, OUR EXPERTISE
                </span>

                <h2 class="text-4xl md:text-5xl font-bold font-outfit text-white mb-2 leading-tight">
                    With you, whatever. From complex
                </h2>

                <h3 class="text-3xl md:text-4xl text-white/60 font-light font-outfit mb-7">
                    Structural works to the fine finishing detail.
                </h3>

                <p class="text-white/75 text-sm mb-7 leading-relaxed max-w-sm">
                    London Elite Trades is a leading construction company in London, specialising in high-quality home and commercial renovations. With a team of experienced project managers, architects, and skilled tradespeople, we deliver exceptional results on every project.
                </p>

                <a href="{{ route('services.index') }}"
                    class="inline-block bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded text-sm transition-colors shadow-md mb-8 tracking-wider">
                    OUR SERVICES
                </a>

                <div class="space-y-3 max-w-md">
                    <x-faq-item 
                        :question="$setting->vision_faq_1_question ?: 'How do you handle structural changes?'"
                        :answer="$setting->vision_faq_1_answer ?: 'Our expert engineers and architects carefully calculate and execute any required structural alterations.'"
                    />
                    <x-faq-item 
                        :question="$setting->vision_faq_2_question ?: 'Do you manage obtaining planning permissions?'"
                        :answer="$setting->vision_faq_2_answer ?: 'Yes, our team handles all planning approvals and council coordination.'"
                    />
                </div>

            </div>
            </div>
        </div>
    </div>

    <!-- Vision Highlights Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
            
            <!-- Three image cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                @php
                    $display_highlights = (isset($vision_highlights) && count($vision_highlights) > 0) ? $vision_highlights->take(3) : collect([
                        (object)[
                            'title' => 'Precise Details In<br>Every Room',
                            'image_path' => 'https://images.squarespace-cdn.com/content/v1/64c7abe374529062ff1e813d/0ee53a2a-000e-45a9-852f-e91fd1c613ae/PortlandRoad14.jpg',
                        ],
                        (object)[
                            'title' => 'Ultra Modern Design',
                            'image_path' => 'https://www.londonelitetrades.co.uk/assets/home-page/home-block-5/1762073717-Mask%20Group%2020.webp',
                        ],
                        (object)[
                            'title' => 'Perfect Exterior Lines',
                            'image_path' => 'https://www.londonelitetrades.co.uk/assets/home-page/home-block-5/1762073697-Mask%20Group%2021.webp',
                        ],
                    ]);
                @endphp

                @foreach($display_highlights as $highlight)
                    <div class="flex flex-col">
                        <div class="relative h-[380px] lg:h-[420px] rounded-xl overflow-hidden group">
                            @if(isset($highlight->image_path) && $highlight->image_path)
                                <img src="{{ !str_starts_with($highlight->image_path, 'http') && !str_starts_with($highlight->image_path, 'data:image') ? Storage::url($highlight->image_path) : $highlight->image_path }}" alt="{!! strip_tags($highlight->title) !!}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @else
                                <img src="https://images.unsplash.com/photo-1541888086925-920a0b63303c?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent pointer-events-none"></div>
                            
                            <div class="absolute bottom-6 left-0 right-0 text-center z-10 px-6 font-outfit">
                                <h4 class="text-white text-xl tracking-wide font-normal" style="font-family: inherit">{!! $highlight->title !!}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Global Vision Highlights FAQs (Below the 3 cards) -->
            <div class="flex flex-col sm:flex-row gap-6 mt-5 mb-8">
                <div class="flex-1">
                    <x-faq-item 
                        :question="$setting->vision_highlights_faq_1_question ?: 'Lorem Ipsum is simply dummy text of the ?'"
                        :answer="$setting->vision_highlights_faq_1_answer ?: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'"
                        class="!border-[#C2A350] !border-l-[4px] !shadow-none !rounded-none !bg-white px-5 py-4"
                    />
                </div>
                <div class="flex-1">
                    <x-faq-item 
                        :question="$setting->vision_highlights_faq_2_question ?: 'Lorem Ipsum is simply dummy text of the ?'"
                        :answer="$setting->vision_highlights_faq_2_answer ?: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'"
                        class="!border-[#C2A350] !border-l-[4px] !shadow-none !rounded-none !bg-white px-5 py-4"
                    />
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- Section 6: Serving London & Beyond -->
    <section class="py-24 bg-beige relative rounded-3xl my-12 mx-4 lg:mx-8 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-3/5">
                    <h2 class="text-4xl md:text-5xl font-light text-gray-900 mb-6 font-outfit">Serving London &amp; Beyond
                    </h2>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed max-w-2xl">
                        With our head office based in Central London, we proudly serve homeowners and businesses throughout
                        Greater London, Essex, Kent, Surrey, Hertfordshire, Buckinghamshire, and Berkshire.
                    </p>
                    <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 font-outfit">Client Satisfaction is Our
                        Priority</h3>
                    <p class="text-gray-500 text-sm mb-10 leading-relaxed max-w-2xl">
                        We are committed to exceeding your expectations. Our focus on clear communication, attention to
                        detail, and quality workmanship ensures your project is a success.
                    </p>

                    <!-- Regional Cards -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
                        @php
                            $regions = ['Greater London', 'Essex', 'Kent', 'Surrey', 'Hertfordshire', 'Buckinghamshire', 'Berkshire'];
                            $images = [
                                'https://assets.cityexperiences.com/wp-content/uploads/2023/10/1V5A2358-1024x683.jpg',
                                'https://burnhamyachtharbour.co.uk/wp-content/uploads/2021/07/DJI_0063-edit-scaled.jpg',
                                'https://live.staticflickr.com/3562/3389632363_7df72d1d82_b.jpg',
                                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1egEWfXQfQqhV98Vc5_aW-1CGcwwDzeKKEeKdzFBeAvNtYYc&s',
                                'https://i2-prod.mylondon.news/article26055383.ece/ALTERNATES/s1200b/4_GettyImages-1225367351.jpg',
                                'https://www.dignityfunerals.co.uk/_next/image?url=/sites/default/files/locations/High%20Wycombe.jpg&w=1200&q=75',
                                'https://safilestravprod.blob.core.windows.net/images-public/1738-2010/DT%20Basildon%20Park%20370215918.jpg?se=2039-12-31&sp=r&sv=2022-11-02&sr=c&sig=3eupriYfqcmzkvOS/pVb6h32VVAFX6Q3FJBas6qM83s='
                            ];
                        @endphp
                        @foreach($regions as $index => $region)
                            <div
                                class="bg-white rounded-xl shadow overflow-hidden transform hover:-translate-y-1 transition-transform">
                                <img src="{{ $images[$index] }}" alt="{{ $region }}" class="w-full h-24 object-cover">
                                <div class="p-3 text-center">
                                    <h4 class="text-xs font-semibold text-gray-800">{{ $region }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-6 mb-8">
                        <a href="{{ route('services.index') }}"
                            class="bg-white border border-gray-200 hover:border-gold hover:text-gold text-gray-900 font-bold px-8 py-3 rounded-md text-sm transition-colors shadow-sm tracking-widest uppercase">
                            Get Our Services
                        </a>
                        <a href="tel:6475736044"
                            class="flex items-center text-gold font-bold text-lg hover:text-gold-600 transition-colors">
                            <div
                                class="w-8 h-8 bg-gold rounded-full flex items-center justify-center text-white mr-3 shadow-md">
                                <i class="fa-solid fa-phone transform rotate-90 text-sm"></i>
                            </div>
                            Call: 647-573-6044
                        </a>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mb-4">
                        <div class="flex-1">
                            <x-faq-item 
                                :question="$setting->region_faq_1_question ?: 'Do you cover areas outside of London?'"
                                :answer="$setting->region_faq_1_answer ?: 'Yes, we frequently manage projects across surrounding Home Counties including Essex, Surrey, Kent, and Hertfordshire, bringing our London-tier expertise directly to you.'"
                            />
                        </div>
                        <div class="flex-1">
                            <x-faq-item 
                                :question="$setting->region_faq_2_question ?: 'How do you coordinate remote projects?'"
                                :answer="$setting->region_faq_2_answer ?: 'We deploy dedicated regional site managers and utilize robust digital tracking tools, ensuring seamless communication and oversight regardless of the site location.'"
                            />
                        </div>
                    </div>

                </div>

                <div class="lg:w-2/5 flex justify-center items-center opacity-100 relative mt-16 lg:mt-0">
                    <!-- United Kingdom SVG Map Gold Filter -->
                    <img src="https://www.thepropertysourcingcompany.co.uk/wp-content/uploads/2024/01/Sourcing-UK-768x1365.png" 
                         alt="Map of UK and Ireland" 
                         class="w-full max-w-[420px] drop-shadow-2xl" 
                         style="filter: brightness(0) saturate(100%) invert(60%) sepia(34%) saturate(731%) hue-rotate(6deg) brightness(96%) contrast(85%);">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Testimonials & FAQ -->
    <section id="reviews" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 leading-tight">See What
                        Customers<br><span class="font-light text-gray-500">Are Saying About Us</span></h2>
                </div>
                <a href="#"
                    class="bg-gold hover:bg-gold-600 text-white font-bold px-6 py-3 rounded text-xs transition-colors shadow-md uppercase tracking-wider mt-6 md:mt-0">
                    READ MORE REVIEWS FROM OUR HAPPY CLIENTS
                </a>
            </div>

            <!-- Masonry-like Grid / Flex layout for reviews -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 items-start">
                @foreach($testimonials->take(5) as $testimonial)
                    <div
                        class="bg-white rounded-2xl p-8 relative shadow-premium border border-transparent hover:-translate-y-1 hover:shadow-premium-hover transition-all duration-300">
                        <i class="fa-solid fa-quote-right absolute top-6 right-6 text-4xl text-gold/20"></i>
                        <div class="flex text-gold text-sm mb-4">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-gray-600 text-sm mb-8 leading-relaxed italic">
                            {{ $testimonial->quote }}
                        </p>
                        <div class="flex items-center">
                            @if($testimonial->image_path)
                                <img src="{{ str_starts_with($testimonial->image_path, 'data:image') ? $testimonial->image_path : Storage::url($testimonial->image_path) }}"
                                    alt="{{ $testimonial->name }}" class="w-10 h-10 rounded-full object-cover grayscale mr-4">
                            @else
                                <div
                                    class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-4 text-gray-500 font-bold">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            @endif
                            <h4 class="text-gray-900 font-bold text-sm">{{ $testimonial->name }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mb-20 justify-center">
                @if($setting->review_faq_1_question && $setting->review_faq_1_answer)
                    <div class="w-full sm:w-1/3">
                        <x-faq-item 
                            :question="$setting->review_faq_1_question"
                            :answer="$setting->review_faq_1_answer"
                        />
                    </div>
                @endif
                @if($setting->review_faq_2_question && $setting->review_faq_2_answer)
                    <div class="w-full sm:w-1/3">
                        <x-faq-item 
                            :question="$setting->review_faq_2_question"
                            :answer="$setting->review_faq_2_answer"
                        />
                    </div>
                @endif
            </div>

            <!-- FAQ Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mt-24">
                <div class="lg:col-span-5 relative pl-4">
                    <div
                        class="absolute -left-4 -top-12 font-bold leading-none select-none z-0 tracking-tighter" style="font-family: Arial, sans-serif; color: #EFECE5; font-size: 22rem;">
                        ?</div>
                    <div class="relative z-10 pt-12 pl-4">
                        <h2 class="text-5xl md:text-6xl font-outfit text-gray-900 font-normal tracking-tight" style="line-height: 1.1;">
                            Frequently<br>Asked<br><span class="font-bold" style="color: #A78536; font-size: 1.1em;">Question</span></h2>
                    </div>
                </div>

                <div class="lg:col-span-7 mt-8 lg:mt-0 relative z-10" style="display: flex; flex-direction: column; gap: 4px;">
                    @forelse($faqs as $index => $faq)
                        <div x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }"
                            class="px-6 py-4 cursor-pointer transition-all rounded-sm"
                            :style="open ? 'background-color: #A78536; color: white;' : 'background-color: #E5E1D5; color: #2B2B2B;'"
                            @mouseenter="if(!open) $el.style.backgroundColor = '#ded9cc'"
                            @mouseleave="if(!open) $el.style.backgroundColor = '#E5E1D5'"
                            @click="open = !open">
                            
                            <div class="flex justify-between items-center text-sm lg:text-base">
                                <span class="pr-6 tracking-wide" :class="{'font-medium': true}">{{ $faq->question }}</span>
                                <i class="fa-solid fa-angle-down text-sm opacity-80 font-light" style="color: #2B2B2B;" x-show="!open"></i>
                                <i class="fa-solid fa-angle-up text-sm font-light text-white opacity-90" x-show="open" x-cloak></i>
                            </div>
                            
                            <div x-show="open" x-cloak
                                class="mt-4 pt-3 flex items-start" style="border-top: 1px solid rgba(255,255,255,0.2); font-size: 13px; opacity: 0.95;">
                                <span class="mr-2 text-white font-bold tracking-tighter self-start select-none" style="font-family: Arial, sans-serif; margin-top: 2px;">»</span> 
                                <div style="line-height: 1.7; letter-spacing: 0.01em;">{!! nl2br(e($faq->answer)) !!}</div>
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
            <img src="https://elvemobilya.com/wp-content/uploads/2024/12/arya-living-room-collection-210126-14.jpg"
                class="w-full h-full object-cover">
        </div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="text-white">
                    <h1 class="text-5xl md:text-6xl font-bold font-outfit mb-12 leading-tight drop-shadow-lg">Ready to Start
                        Your<br>Project?</h1>

                    <div class="space-y-4 mb-16">
                        <div class="bg-white/95 backdrop-blur rounded p-4 flex items-center shadow-lg w-max pr-12">
                            <div
                                class="w-10 h-10 rounded-full bg-gold flex items-center justify-center text-white mr-4 shadow-inner">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}"
                                class="text-gray-900 font-bold">Call Us On: {{ $setting->phone ?? '0203 172 4720' }}</a>
                        </div>
                        <div class="bg-white/95 backdrop-blur rounded p-4 flex items-center shadow-lg w-max pr-12">
                            <div
                                class="w-10 h-10 rounded-full bg-gold flex items-center justify-center text-white mr-4 shadow-inner">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <a href="mailto:{{ $setting->email ?? 'info@londonelitetrades.co.uk' }}"
                                class="text-gray-900 font-bold">Mail To: {{ $setting->email ??
                                'info@londonelitetrades.co.uk' }}</a>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold font-outfit mb-3">Get Your Free Quote Today</h3>
                    <p class="text-white/80 text-sm max-w-md leading-relaxed">
                        Contact us today to discuss your building project. There's no obligation - just expert advice from
                        our friendly team.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl">
                    <h3 class="text-xl font-bold font-outfit text-gray-900 text-center mb-8 uppercase tracking-widest">DROP
                        US A LINE</h3>

                    @if(session('success'))
                        <div class="mb-6 bg-green-50 text-green-600 px-4 py-3 rounded border border-green-200 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <input type="text" name="name" placeholder="Name" required
                                class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                            <input type="text" name="subject" placeholder="Company/Subject Name"
                                class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <input type="email" name="email" placeholder="Email" required
                                class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                            <input type="tel" name="phone" placeholder="Phone"
                                class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors">
                        </div>
                        <div class="mb-4">
                            <textarea name="message" rows="5" placeholder="Your Query" required
                                class="w-full bg-transparent border border-gray-300 rounded px-4 py-3 text-sm focus:border-gold focus:ring-1 focus:ring-gold outline-none transition-colors resize-none"></textarea>
                        </div>

                        <div class="mb-6 flex items-start">
                            <input type="checkbox" id="terms" required
                                class="mt-1 text-gold focus:ring-gold rounded border-gray-300">
                            <label for="terms" class="ml-3 text-xs text-gray-500 leading-relaxed">I agree that by submitting
                                this form, I accept your website terms of use, privacy policy and cookie policy.</label>
                        </div>

                        <button type="submit"
                            class="w-full bg-gold hover:bg-gold-600 text-white font-bold py-4 rounded text-sm transition-colors shadow-md tracking-widest uppercase">
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
                <a href="{{ route('blogs.index') }}"
                    class="bg-gold hover:bg-gold-600 text-white font-bold px-8 py-3 rounded text-xs transition-colors shadow-md uppercase tracking-wider mt-6 md:mt-0">
                    READ MORE BLOG
                </a>
            </div>

            @if($blogs->count() >= 1)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Large Left Article -->
                    <div class="flex flex-col">
                        <div class="relative h-[450px] rounded-2xl overflow-hidden mb-6 group shadow-md hover:-translate-y-1 transition-transform duration-300">
                            @if($blogs[0]->cover_image_path)
                                <img src="{{ str_starts_with($blogs[0]->cover_image_path, 'data:image') ? $blogs[0]->cover_image_path : Storage::url($blogs[0]->cover_image_path) }}"
                                    alt="{{ $blogs[0]->title }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @else
                                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1200&auto=format&fit=crop"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $blogs[0]->title }}</h3>
                        <p class="text-gray-500 text-sm line-clamp-2 mb-2">{{ $blogs[0]->excerpt }}</p>
                        <a href="{{ route('blogs.show', $blogs[0]) }}"
                            class="text-gray-500 hover:text-gold text-sm font-medium transition-colors mb-4 block">... Read
                            More</a>

                        <div class="mt-auto">
                            <x-faq-item 
                                :question="$blogs[0]->faq_question ?: 'Curious about this topic?'"
                                :answer="$blogs[0]->faq_answer ?: 'Read our full article to explore detailed insights and expert advice on this subject.'"
                            />
                        </div>

                    </div>

                    <!-- Two Smaller Right Articles -->
                    <div class="flex flex-col gap-8">
                        @foreach($blogs->skip(1)->take(2) as $blog)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                                <div class="relative h-48 rounded-2xl overflow-hidden group shadow-md hover:-translate-y-1 transition-transform duration-300">
                                    @if($blog->cover_image_path)
                                        <img src="{{ str_starts_with($blog->cover_image_path, 'data:image') ? $blog->cover_image_path : Storage::url($blog->cover_image_path) }}"
                                            alt="{{ $blog->title }}"
                                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop"
                                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-gray-900 mb-2">{{ $blog->title }}</h3>
                                    <p class="text-gray-500 text-xs line-clamp-3 mb-2 leading-relaxed">{{ $blog->excerpt }}</p>
                                    <a href="{{ route('blogs.show', $blog) }}"
                                        class="text-gray-500 hover:text-gold text-xs font-medium transition-colors mb-4 block">...
                                        Read More</a>

                                    <div class="mt-auto">
                                        <x-faq-item 
                                            :question="$blog->faq_question ?: 'Want to know more?'"
                                            :answer="$blog->faq_answer ?: 'Check out the complete article for a comprehensive breakdown.'"
                                            class="p-3 bg-gray-50/50"
                                        />
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection