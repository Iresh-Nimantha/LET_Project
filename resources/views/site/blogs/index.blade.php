@extends('layouts.site')

@section('title', '| News & Articles')

@section('content')
<!-- Page Header -->
<section class="relative pt-32 pb-20 bg-gray-50 border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 bg-white/60 z-10"></div>
    <div class="absolute right-0 top-0 text-[15rem] font-bold text-gray-200 opacity-20 -translate-y-20 translate-x-20 font-outfit select-none">B</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 text-center">
        <span class="text-gold font-semibold uppercase tracking-widest text-sm mb-4 block">Our Journal</span>
        <h1 class="text-4xl md:text-5xl font-bold font-outfit text-gray-900 mb-6">News & Articles</h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">Stay updated with the latest news, trade tips, and project spotlights from London Elite Trades.</p>
    </div>
</section>

<!-- Blog Listing -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($blogs as $blog)
                <article class="bg-white border border-gray-100 rounded-2xl overflow-hidden group hover:border-gold/30 transition-colors shadow-md hover:shadow-xl">
                    <div class="relative h-64 overflow-hidden border-b border-gray-100">
                        @if($blog->cover_image_path)
                            <img src="{{ str_starts_with($blog->cover_image_path, 'data:image') ? $blog->cover_image_path : Storage::url($blog->cover_image_path) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gray-50 flex items-center justify-center transform group-hover:scale-105 transition-transform duration-700">
                                <i class="fa-solid fa-newspaper text-gray-300 text-5xl"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4 bg-gold text-white text-xs tracking-widest uppercase font-bold px-4 py-2 rounded shadow-md">
                            {{ $blog->created_at->format('M d, Y') }}
                        </div>
                    </div>
                    <div class="p-8 flex flex-col h-[calc(100%-16rem)]">
                        <h3 class="text-2xl font-bold font-outfit text-gray-900 mb-4 group-hover:text-gold transition-colors leading-tight">
                            <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-6 flex-grow font-light leading-relaxed">{{ Str::limit($blog->excerpt, 120) }}</p>
                        <a href="{{ route('blogs.show', $blog) }}" class="inline-flex items-center text-sm font-bold text-gray-900 group-hover:text-gold transition-colors mt-auto tracking-widest uppercase">
                            Read Article <i class="fa-solid fa-arrow-right ml-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-16 bg-gray-50 border border-gray-100 rounded-2xl shadow-inner">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm border border-gray-100">
                        <i class="fa-solid fa-pen-nib text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-3xl text-gray-900 font-outfit font-semibold mb-4">No Articles Yet</h3>
                    <p class="text-gray-500 text-lg max-w-md mx-auto">We are currently preparing some amazing content for you. Please check back later.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div class="mt-20 flex justify-center">
            {{ $blogs->links() }}
        </div>
    </div>
</section>

<!-- Newsletter CTA -->
<section class="py-20 relative bg-beige overflow-hidden mx-4 sm:mx-8 mb-24 max-w-[90rem] xl:mx-auto rounded-[4rem]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="w-20 h-20 bg-gold/10 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fa-regular fa-envelope-open text-3xl text-gold"></i>
        </div>
        <h2 class="text-3xl md:text-4xl font-bold font-outfit text-gray-900 mb-4">Subscribe to our newsletter</h2>
        <p class="text-gray-600 text-lg mb-10 max-w-2xl mx-auto font-light">Get the latest news, trade tips, and special offers directly in your inbox.</p>
        
        <form class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
            <input type="email" placeholder="Enter your email address" class="flex-grow px-6 py-4 rounded bg-white border border-gray-200 text-gray-900 placeholder-gray-400 focus:ring-gold focus:border-gold shadow-sm" required>
            <button type="submit" class="px-8 py-4 bg-gold text-white font-bold rounded hover:bg-gold-600 transition-colors shadow-lg tracking-widest uppercase text-sm">Subscribe</button>
        </form>
    </div>
</section>
@endsection

