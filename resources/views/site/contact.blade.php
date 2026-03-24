@extends('layouts.site')

@section('title', '| Contact Us')

@section('content')
<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-gray-50 border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 bg-white/60 z-10"></div>
    <div class="absolute right-0 top-0 text-[15rem] font-bold text-gray-200 opacity-20 -translate-y-20 translate-x-20 font-outfit select-none">C</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
        <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">Get In Touch</span>
        <h1 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-6">Contact Us</h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">Get in touch with London Elite Trades for reliable electrical, plumbing, and construction services.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-24 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-8 shadow-xl relative overflow-hidden">
                    <h2 class="text-3xl font-bold font-outfit text-gray-900 mb-8">Send us a Message</h2>
                    
                    @if(session('success'))
                        <div class="mb-8 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg flex items-center shadow-sm">
                            <i class="fa-regular fa-circle-check text-2xl mr-4 flex-shrink-0 text-green-600"></i>
                            <div>
                                <h4 class="font-bold mb-1">Success!</h4>
                                <p class="text-sm font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Full Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                                    class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:ring-gold focus:border-gold transition-colors shadow-sm" placeholder="John Doe">
                                @error('name') <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Email Address *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                                    class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:ring-gold focus:border-gold transition-colors shadow-sm" placeholder="john@example.com">
                                @error('email') <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="phone" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Phone Number</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                                    class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:ring-gold focus:border-gold transition-colors shadow-sm" placeholder="+44 20 1234 5678">
                                @error('phone') <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                                    class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:ring-gold focus:border-gold transition-colors shadow-sm" placeholder="How can we help?">
                                @error('subject') <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="message" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Message *</label>
                            <textarea name="message" id="message" rows="6" required 
                                class="w-full bg-white border border-gray-300 text-gray-900 rounded-lg px-4 py-3 focus:ring-gold focus:border-gold transition-colors shadow-sm resize-none" placeholder="Provide details about your project or inquiry...">{{ old('message') }}</textarea>
                            @error('message') <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="w-full sm:w-auto px-10 py-4 bg-gold text-white font-bold rounded hover:bg-gold-600 transition-all shadow-md uppercase tracking-widest text-sm flex items-center justify-center">
                            Send Message <i class="fa-regular fa-paper-plane ml-3"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Information & Map -->
            <div class="lg:col-span-5">
                <div class="bg-beige rounded-2xl p-8 mb-8 border border-gold/20 shadow-lg relative overflow-hidden">
                    
                    <h3 class="text-2xl font-bold font-outfit text-gray-900 mb-8">Contact Information</h3>
                    
                    <ul class="space-y-8">
                        <li class="flex items-start">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-gold shrink-0 shadow-sm border border-gray-100">
                                <i class="fa-solid fa-map-location-dot text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-gray-900 font-bold mb-1 font-outfit">Office Location</h4>
                                <p class="text-gray-600 text-sm leading-relaxed font-light">{!! nl2br(e($setting->address ?? "London Elite Trades Ltd 4th Floor\nSilverstream House 45 Fitzroy Street\nFitzrovia London W1T 6EB")) !!}</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-gold shrink-0 shadow-sm border border-gray-100">
                                <i class="fa-solid fa-phone-volume text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-gray-900 font-bold mb-1 font-outfit">Phone Number</h4>
                                <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}" class="text-gray-600 hover:text-gold text-sm mb-1 block font-light transition-colors">{{ $setting->phone ?? '0203 172 4720' }}</a>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-gold shrink-0 shadow-sm border border-gray-100">
                                <i class="fa-solid fa-envelope text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-gray-900 font-bold mb-1 font-outfit">Email Address</h4>
                                <a href="mailto:{{ $setting->email ?? 'info@londonelitetrades.co.uk' }}" class="text-gray-600 hover:text-gold text-sm font-light transition-colors">{{ $setting->email ?? 'info@londonelitetrades.co.uk' }}</a>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-gold shrink-0 shadow-sm border border-gray-100">
                                <i class="fa-regular fa-clock text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-gray-900 font-bold mb-1 font-outfit">Business Hours</h4>
                                <p class="text-gray-600 text-sm font-light leading-relaxed">{!! nl2br(e($setting->opening_hours ?? "Monday - Friday 9am - 5:30pm\nClosed at weekends")) !!}</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Map Box -->
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-200 shadow-xl h-[300px] sticky top-32">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.7281066703!2d-0.24168139920561736!3d51.52877184087612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sus!4v1698246738947!5m2!1sen!2sus" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
