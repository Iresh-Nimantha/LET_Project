@extends('layouts.site')

@section('title', '| ' . $blog->title)

@section('content')
<!-- Article Header -->
<section class="relative pt-32 pb-20 bg-gray-50 border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 bg-white/60 z-10"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
        <div class="mb-8">
            <a href="{{ route('blogs.index') }}" class="inline-flex items-center text-gold hover:text-gold-600 transition-colors tracking-widest text-sm font-semibold uppercase">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back to Articles
            </a>
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold font-outfit text-gray-900 mb-8 leading-tight">{{ $blog->title }}</h1>
        <div class="flex items-center justify-center space-x-6 text-gray-500 text-sm font-medium tracking-wide uppercase">
            <span class="flex items-center"><i class="fa-regular fa-calendar text-gold mr-3"></i> {{ $blog->created_at->format('F d, Y') }}</span>
            <span class="flex items-center"><i class="fa-regular fa-clock text-gold mr-3"></i> 5 min read</span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-8 lg:col-start-3">
                
                @if($blog->cover_image_path)
                    <div class="mb-12 rounded-2xl overflow-hidden shadow-xl border border-gray-200">
                        <img src="{{ str_starts_with($blog->cover_image_path, 'data:image') ? $blog->cover_image_path : Storage::url($blog->cover_image_path) }}" alt="{{ $blog->title }}" class="w-full h-auto object-cover max-h-[500px]">
                    </div>
                @endif
                
                <div class="prose prose-lg max-w-none text-gray-700 font-light leading-relaxed prose-headings:font-outfit prose-headings:text-gray-900 prose-headings:font-bold prose-a:text-gold hover:prose-a:text-gold-600 prose-img:rounded-xl">
                    {!! $blog->content !!}
                </div>
                
                <!-- Share -->
                <div class="mt-16 pt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <h4 class="text-gray-900 font-bold font-outfit text-xl">Share this article:</h4>
                    <div class="flex space-x-4">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="w-12 h-12 rounded-full bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-[#1DA1F2] hover:text-white hover:border-[#1DA1F2] shadow-sm transition-all">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-12 h-12 rounded-full bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-[#4267B2] hover:text-white hover:border-[#4267B2] shadow-sm transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="w-12 h-12 rounded-full bg-gray-50 border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-[#0077B5] hover:text-white hover:border-[#0077B5] shadow-sm transition-all">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</section>

<!-- Recent Articles -->
@if($recentBlogs->count() > 0)
<section class="py-20 bg-beige mx-4 sm:mx-8 mb-24 max-w-[90rem] xl:mx-auto rounded-[4rem] mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold font-outfit text-gray-900 mb-10 flex items-center justify-center">
            <span class="text-gold font-semibold uppercase tracking-widest text-sm mr-4 block mt-1">More to read</span> Recent Articles
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($recentBlogs as $recent)
                <article class="bg-white border border-gray-100 shadow-md rounded-2xl overflow-hidden group hover:border-gold/30 transition-colors">
                    <div class="p-8">
                        <div class="text-gold text-xs tracking-widest uppercase font-bold mb-4">{{ $recent->created_at->format('M d, Y') }}</div>
                        <h3 class="text-xl font-bold font-outfit text-gray-900 mb-4 group-hover:text-gold transition-colors leading-snug">
                            <a href="{{ route('blogs.show', $recent) }}" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                {{ $recent->title }}
                            </a>
                        </h3>
                        <p class="text-gray-500 text-sm font-light leading-relaxed line-clamp-3">{{ $recent->excerpt }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

