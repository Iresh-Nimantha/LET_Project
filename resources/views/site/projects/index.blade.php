@extends('layouts.site')

@section('title', '| Projects Portfolio')

@section('content')
<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-gray-50 border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 bg-white/60 z-10"></div>
    <div class="absolute right-0 top-0 text-[15rem] font-bold text-gray-200 opacity-20 -translate-y-20 translate-x-20 font-outfit select-none">P</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
        <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">Our Portfolio</span>
        <h1 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-6">Our Projects</h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">Explore our recent work and discover the uncompromising quality that defines London Elite Trades.</p>
    </div>
</section>

<!-- Projects Gallery -->
<section class="py-24 bg-white" x-data="{ filter: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Controls -->
        @if($categories->count() > 0)
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <button @click="filter = 'all'" :class="{ 'bg-gold text-white border-gold': filter === 'all', 'bg-transparent text-gray-500 border-gray-300 hover:border-gold hover:text-gold': filter !== 'all' }" class="px-6 py-2 rounded-full border transition-all duration-300 font-medium text-sm tracking-wide uppercase shadow-sm">
                All Projects
            </button>
            @foreach($categories as $category)
            <button @click="filter = '{{ Str::slug($category) }}'" :class="{ 'bg-gold text-white border-gold': filter === '{{ Str::slug($category) }}', 'bg-transparent text-gray-500 border-gray-300 hover:border-gold hover:text-gold': filter !== '{{ Str::slug($category) }}' }" class="px-6 py-2 rounded-full border transition-all duration-300 font-medium text-sm tracking-wide uppercase shadow-sm">
                {{ $category }}
            </button>
            @endforeach
        </div>
        @endif

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <div x-show="filter === 'all' || filter === '{{ Str::slug($project->category) }}'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="group relative overflow-hidden rounded-[2rem] bg-gray-100 aspect-[4/3] shadow-lg">
                    
                    @if($project->image_path)
                        <img src="{{ str_starts_with($project->image_path, 'data:image') ? $project->image_path : Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    @else
                        <!-- Layout specific fallback placeholder -->
                        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                        @if($project->category)
                            <span class="text-gold text-xs font-bold uppercase tracking-widest mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $project->category }}</span>
                        @endif
                        <h3 class="text-2xl font-bold font-outfit text-white mb-4 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">{{ $project->title }}</h3>
                        <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center text-white text-sm font-medium hover:text-gold transition-colors transform translate-y-4 group-hover:translate-y-0 duration-300 delay-100">
                            View Project <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-12">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fa-solid fa-images text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl text-gray-900 font-outfit font-semibold mb-2">No Projects Available</h3>
                    <p class="text-gray-500">We haven't uploaded any projects yet. Check back soon!</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            {{ $projects->links() }}
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative bg-beige overflow-hidden mx-4 sm:mx-8 mb-24 max-w-[90rem] xl:mx-auto rounded-[4rem]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold font-outfit text-gray-900 mb-6 drop-shadow-sm">Inspired by our work?</h2>
        <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto leading-relaxed">Let's discuss how we can bring your vision to life. Our team is ready to tackle your next big project.</p>
        <a href="{{ route('contact.create') }}" class="inline-flex items-center bg-gold text-white font-bold py-4 px-10 rounded uppercase tracking-widest text-sm hover:bg-gold-600 transition-all shadow-lg">
            Start Your Project <i class="fa-solid fa-chevron-right ml-3 text-xs"></i>
        </a>
    </div>
</section>
@endsection

