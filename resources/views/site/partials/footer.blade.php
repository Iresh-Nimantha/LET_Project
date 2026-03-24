<!-- Footer -->
<footer class="bg-[#2D291F] text-white/90 relative overflow-hidden">
    <!-- Accreditation Logos Row -->
    <div class="border-b border-white/10 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center py-6 gap-6 md:gap-4 opacity-80">
                <!-- Example logos text/icons approximating the screenshot brands -->
                <div class="flex flex-col items-center">
                    <i class="fa-solid fa-house text-2xl text-orange-400 mb-1"></i>
                    <span class="text-[10px] uppercase font-bold text-orange-400 leading-none">Exclusive Builders</span>
                </div>
                <!-- DPA (Damp Proofing Association) -->
                <div class="flex flex-col items-center">
                    <i class="fa-solid fa-house-chimney-crack text-xl text-gray-300 mb-1"></i>
                    <span class="text-[10px] uppercase font-bold text-gray-300">DPA</span>
                </div>
                <!-- Google Reviews -->
                <div class="flex items-center">
                    <svg viewBox="0 0 24 24" class="w-8 h-8 mr-2"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                </div>
                <!-- BBA -->
                <div class="border border-white/20 px-3 py-1 flex items-center justify-center">
                    <span class="text-xl font-bold text-blue-500 tracking-wider">BBA</span>
                </div>
                <!-- CITB SMSTS -->
                <div class="flex items-center gap-2">
                    <div class="bg-blue-600 rounded-full w-8 h-8 flex items-center justify-center font-bold text-xs">citb</div>
                    <span class="text-[10px] text-purple-400 font-bold uppercase">SMSTS</span>
                </div>
                <!-- SSIP -->
                <div class="flex items-center">
                    <span class="text-xl font-serif">SSIP</span>
                    <i class="fa-solid fa-bookmark text-blue-400 ml-1 text-sm"></i>
                </div>
                <!-- COVEA -->
                <div class="flex items-center">
                    <span class="text-xl font-bold text-red-500">CO<span class="text-orange-400">vea</span></span>
                </div>
                <!-- NABC -->
                <div class="flex flex-col items-center">
                    <span class="text-lg font-bold text-teal-400 leading-none">"NABC"</span>
                    <span class="text-[8px] uppercase">National Association<br>of Building Contractors</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10 flex flex-col lg:flex-row gap-12">
        
        <!-- Left Footer Content (Text, Links, Info) -->
        <div class="lg:w-[60%] space-y-12">
            <!-- Brand & Intro -->
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-6 inline-flex">
                    <div class="text-white">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                            <path d="M4 19v2h16v-2H4zm0-4v2h16v-2H4zm0-4v2h16v-2H4zm0-4v2h16V7H4zm0-4v2h16V3H4z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-white leading-none block font-outfit uppercase tracking-wider">{{ explode(' ', $setting->site_name ?? 'London Elite Trades')[0] ?? 'London' }}</span>
                        <span class="text-[10px] text-white/70 font-semibold uppercase tracking-widest block">{{ implode(' ', array_slice(explode(' ', $setting->site_name ?? 'London Elite Trades'), 1)) }}</span>
                    </div>
                </a>
                <p class="text-xs text-white/60 leading-relaxed max-w-lg">
                    {{ $setting->footer_description ?? "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s." }}
                </p>
            </div>

            <!-- Links Grid -->
            <div class="grid grid-cols-2 gap-8 text-sm">
                <div>
                    <h4 class="text-lg font-outfit mb-6 text-white font-medium">Quick Links</h4>
                    <ul class="space-y-4 text-xs text-white/70">
                        <li><a href="{{ route('home') }}" class="hover:text-gold transition-colors block border-b border-transparent w-max">&raquo; HOME</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-gold transition-colors block border-b border-transparent w-max">&raquo; OUR SERVICES</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors block border-b border-transparent w-max">&raquo; ABOUT US</a></li>
                        <li><a href="{{ route('blogs.index') }}" class="hover:text-gold transition-colors block border-b border-transparent w-max">&raquo; BLOGS</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors block border-b border-transparent w-max lg:hidden">&raquo; CLIENT REVIEWS</a></li>
                        <li><a href="{{ route('contact.create') }}" class="hover:text-gold transition-colors block border-b border-transparent w-max lg:hidden">&raquo; CONTACT US</a></li>
                    </ul>
                </div>
                <!-- 2nd Quick links col for desktop -->
                <div class="hidden lg:block -ml-8">
                    <h4 class="text-lg font-outfit mb-6 text-transparent select-none">.</h4>
                    <ul class="space-y-4 text-xs text-white/70">
                        <li><a href="#" class="hover:text-gold transition-colors block border-b border-transparent w-max">&raquo; CLIENT REVIEWS</a></li>
                        <li><a href="{{ route('contact.create') }}" class="hover:text-gold transition-colors block border-b border-transparent w-max">&raquo; CONTACT US</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-outfit mb-6 text-white font-medium">Services</h4>
                    <ul class="space-y-4 text-xs text-white/70">
                        <li><a href="{{ route('services.index') }}" class="hover:text-gold transition-colors flex items-start gap-2"><span class="mt-0.5">&raquo;</span> LOFT CONVERSIONS AND EXTENSIONS</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-gold transition-colors flex items-start gap-2"><span class="mt-0.5">&raquo;</span> COMPLETE PROPERTY REFURBISHMENTS</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-gold transition-colors flex items-start gap-2"><span class="mt-0.5">&raquo;</span> BASEMENT RENOVATIONS &amp; CONVERSIONS</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-gold transition-colors flex items-start gap-2"><span class="mt-0.5">&raquo;</span> COMMERCIAL DEVELOPMENTS &amp; REFURBISHMENTS</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-6 border-t border-white/10">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-white flex items-center justify-center text-gray-900 shrink-0">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-white mb-1">OFFICE</h5>
                        <p class="text-[10px] text-white/70 leading-relaxed">
                            {!! nl2br(e($setting->address ?? "London Elite Trades Ltd 4th Floor\nSilverstream House 45 Fitzroy Street\nFitzrovia London W1T 6EB")) !!}
                        </p>
                    </div>
                </div>
                <!-- Time -->
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-white flex items-center justify-center text-gray-900 shrink-0">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-white mb-1">OPENING TIMES</h5>
                        <p class="text-[10px] text-white/70 leading-relaxed">
                            {!! nl2br(e($setting->opening_hours ?? "Monday - Friday 9am - 5:30pm\nClosed at weekends")) !!}
                        </p>
                    </div>
                </div>
                <!-- Phone -->
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-white flex items-center justify-center text-gray-900 shrink-0">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-white mb-1">Call On</h5>
                        <a href="tel:{{ str_replace(' ', '', $setting->phone ?? '0203 172 4720') }}" class="text-[10px] text-white/70 hover:text-white leading-relaxed">
                            {{ $setting->phone ?? '0203 172 4720' }}
                        </a>
                    </div>
                </div>
                <!-- Mail -->
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded bg-white flex items-center justify-center text-gray-900 shrink-0">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h5 class="text-xs font-bold text-white mb-1">Mail</h5>
                        <a href="mailto:{{ $setting->email ?? 'info@londonelitetrades.co.uk' }}" class="text-[10px] text-white/70 hover:text-white leading-relaxed truncate block max-w-full" title="{{ $setting->email ?? 'info@londonelitetrades.co.uk' }}">
                            {{ $setting->email ?? 'info@londonelitetrades.co.uk' }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright & Small Links -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-10 text-[10px] text-white/50">
                <div class="flex items-center gap-6">
                    <p>&copy; 2026 London Elite Trades Limited</p>
                    <p>Company number: 10994476</p>
                </div>
                
                <div class="flex gap-3">
                    <a href="{{ $setting->social_facebook ?? '#' }}" class="w-6 h-6 rounded-full border border-white/30 flex items-center justify-center hover:bg-gold hover:text-white hover:border-gold transition-colors">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="{{ $setting->social_instagram ?? '#' }}" class="w-6 h-6 rounded-full border border-white/30 flex items-center justify-center hover:bg-gold hover:text-white hover:border-gold transition-colors">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="{{ $setting->social_linkedin ?? '#' }}" class="w-6 h-6 rounded-full border border-white/30 flex items-center justify-center hover:bg-gold hover:text-white hover:border-gold transition-colors">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>

                <div class="flex flex-wrap items-center gap-4">
                    <p>Website designed by <span class="text-white">Iresh.Dev</span></p>
                    <a href="#" class="hover:text-white">Terms &amp; Conditions</a>
                    <a href="#" class="hover:text-white">Privacy Policy</a>
                    <a href="#" class="hover:text-white">Sitemap</a>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Right Side Decorative Images (Desktop only) -->
    <div class="absolute right-0 top-0 bottom-0 w-[40%] hidden lg:block z-0 pointer-events-none">
        <!-- Top large angled image (Bathroom) -->
        <div class="absolute top-0 right-0 w-[120%] h-[70%] transform rotate-[15deg] translate-x-12 -translate-y-16 rounded-[4rem] overflow-hidden border-8 border-[#2D291F] shadow-2xl z-10">
            <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover transform -rotate-[15deg] scale-125">
        </div>
        
        <!-- Bottom intersecting image (Hallway/Glass) -->
        <div class="absolute bottom-0 right-[10%] w-[80%] h-[60%] transform rotate-[15deg] translate-y-16 rounded-[4rem] overflow-hidden border-[12px] border-gold/40 shadow-xl z-20">
            <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transform -rotate-[15deg] scale-125">
        </div>
        
        <!-- Gold Accent Shape -->
        <div class="absolute bottom-1/4 right-0 w-48 h-48 bg-gold transform rotate-[45deg] translate-x-1/2 z-0 rounded-3xl opacity-80"></div>
    </div>
</footer>
