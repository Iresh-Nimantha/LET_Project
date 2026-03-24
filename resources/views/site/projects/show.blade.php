@extends('layouts.site')

@section('title', '| ' . $project->title)

@section('content')
<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-gray-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center space-x-4 mb-4">
            <a href="{{ route('projects.index') }}" class="text-gold hover:text-gold-600 font-medium transition-colors"><i class="fa-solid fa-arrow-left mr-2"></i> Back to Gallery</a>
        </div>
        @if($project->category)
            <span class="inline-block px-3 py-1 bg-white text-gold text-sm font-bold uppercase tracking-wider rounded-full shadow-sm mb-4 border border-gold/20">{{ $project->category }}</span>
        @endif
        <h1 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-4">{{ $project->title }}</h1>
        <div class="w-16 h-1 bg-gold rounded-full"></div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Project Hero Image -->
        <div class="mb-16 w-full h-[50vh] min-h-[400px] max-h-[600px] rounded-2xl overflow-hidden shadow-lg relative border border-gray-100">
            @if($project->image_path)
                <img src="{{ str_starts_with($project->image_path, 'data:image') ? $project->image_path : Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gray-50 flex items-center justify-center">
                    <i class="fa-solid fa-image text-gray-300 text-6xl"></i>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Project Description -->
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold font-outfit text-gray-900 mb-6">About the Project</h2>
                <div class="prose prose-lg max-w-none text-gray-600 font-light leading-relaxed mb-8">
                    {!! nl2br(e($project->description)) !!}
                </div>
            </div>

            <!-- Project Meta -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 border border-gold/20 rounded-2xl p-8 shadow-sm">
                    <h3 class="text-xl font-bold font-outfit text-gray-900 mb-6 border-b border-gray-200 pb-4">Project Details</h3>
                    
                    <ul class="space-y-6">
                        <li>
                            <div class="text-sm font-medium text-gray-500 mb-1">Completed</div>
                            <div class="text-gray-900 font-bold flex items-center"><i class="fa-regular fa-calendar text-gold mr-3 text-lg"></i> {{ $project->created_at->format('F Y') }}</div>
                        </li>
                        <li>
                            <div class="text-sm font-medium text-gray-500 mb-1">Category</div>
                            <div class="text-gray-900 font-bold flex items-center"><i class="fa-solid fa-tag text-gold mr-3 text-lg"></i> {{ $project->category ?? 'General' }}</div>
                        </li>
                        @if($project->url)
                        <li>
                            <div class="text-sm font-medium text-gray-500 mb-1">Live Sub-project / Link</div>
                            <div class="text-gray-900 font-bold">
                                <a href="{{ $project->url }}" target="_blank" class="text-gray-900 hover:text-gold transition-colors flex items-center">
                                    <i class="fa-solid fa-link text-gold mr-3 text-lg"></i> View Project <i class="fa-solid fa-external-link-alt ml-2 text-xs text-gray-400"></i>
                                </a>
                            </div>
                        </li>
                        @endif
                    </ul>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-gray-500 text-sm mb-4 font-medium text-center">Want something similar?</p>
                        <a href="{{ route('contact.create') }}" class="w-full inline-flex justify-center items-center bg-gray-900 text-white font-bold py-4 px-6 rounded-xl hover:bg-gold shadow-md hover:shadow-lg transition-all duration-300">
                            Request Quote
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Related Projects -->
@if(isset($relatedProjects) && $relatedProjects->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold font-outfit text-gray-900 mb-10 flex items-center">
            <span class="w-1.5 h-8 bg-gold mr-3 rounded-full"></span> Related Projects
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedProjects as $related)
                <div class="group relative overflow-hidden rounded-2xl bg-white aspect-[4/3] border border-gray-100 shadow-sm hover:shadow-xl hover:border-gold/50 transition-all duration-500">
                    @if($related->image_path)
                        <img src="{{ str_starts_with($related->image_path, 'data:image') ? $related->image_path : Storage::url($related->image_path) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gray-50 flex items-center justify-center">
                            <i class="fa-solid fa-image text-gray-300 text-5xl transform group-hover:scale-110 transition-transform duration-500"></i>
                        </div>
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3 class="text-xl font-bold font-outfit text-white mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $related->title }}</h3>
                        <a href="{{ route('projects.show', $related) }}" class="inline-flex w-10 h-10 rounded-full bg-gold text-white items-center justify-center hover:bg-white hover:text-gold transition-colors transform translate-y-4 group-hover:translate-y-0 duration-300 mt-2 shadow-md">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

