<x-admin-layout title="Dashboard">
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-3xl font-outfit font-bold text-gray-900">Dashboard</h1>
                <p class="mt-1 text-sm text-gray-500">Quick snapshot of your content and leads.</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.services.create') }}" class="inline-flex items-center rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 border border-gray-200 hover:bg-gray-50 hover:text-gold transition-colors shadow-sm">
                    <i class="fa-solid fa-plus mr-2 text-gray-400"></i>
                    Add Service
                </a>
                <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center rounded-lg bg-gold px-4 py-2 text-sm font-bold text-white shadow-md hover:bg-gold-600 focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 transition-colors">
                    <i class="fa-solid fa-pen-nib mr-2"></i>
                    Write Blog
                </a>
            </div>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Dashboard Card 1 -->
        <a href="{{ route('admin.services.index') }}" class="group rounded-2xl bg-white p-6 shadow-sm border border-gray-100 hover:border-gold hover:shadow-md transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-gray-50 rounded-full group-hover:bg-gold/5 transition-colors"></div>
            <div class="relative z-10 flex flex-col justify-between h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 rounded-lg bg-gold/10 text-gold flex items-center justify-center">
                        <i class="fa-solid fa-screwdriver-wrench text-lg"></i>
                    </div>
                    <div class="text-sm text-gray-400 font-medium group-hover:text-gold transition-colors">Manage &rarr;</div>
                </div>
                <div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">Services</div>
                    <div class="text-3xl font-bold font-outfit text-gray-900">{{ $counts['services'] ?? 0 }}</div>
                </div>
            </div>
        </a>

        <!-- Dashboard Card 2 -->
        <a href="{{ route('admin.projects.index') }}" class="group rounded-2xl bg-white p-6 shadow-sm border border-gray-100 hover:border-gold hover:shadow-md transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-gray-50 rounded-full group-hover:bg-gold/5 transition-colors"></div>
            <div class="relative z-10 flex flex-col justify-between h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 rounded-lg bg-gold/10 text-gold flex items-center justify-center">
                        <i class="fa-solid fa-hammer text-lg"></i>
                    </div>
                    <div class="text-sm text-gray-400 font-medium group-hover:text-gold transition-colors">Manage &rarr;</div>
                </div>
                <div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">Projects</div>
                    <div class="text-3xl font-bold font-outfit text-gray-900">{{ $counts['projects'] ?? 0 }}</div>
                </div>
            </div>
        </a>

        <!-- Dashboard Card 3 -->
        <a href="{{ route('admin.blogs.index') }}" class="group rounded-2xl bg-white p-6 shadow-sm border border-gray-100 hover:border-gold hover:shadow-md transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-gray-50 rounded-full group-hover:bg-gold/5 transition-colors"></div>
            <div class="relative z-10 flex flex-col justify-between h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 rounded-lg bg-gold/10 text-gold flex items-center justify-center">
                        <i class="fa-solid fa-newspaper text-lg"></i>
                    </div>
                    <div class="text-sm text-gray-400 font-medium group-hover:text-gold transition-colors">Manage &rarr;</div>
                </div>
                <div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">Blogs</div>
                    <div class="text-3xl font-bold font-outfit text-gray-900">{{ $counts['blogs'] ?? 0 }}</div>
                </div>
            </div>
        </a>

        <!-- Dashboard Card 4 -->
        <a href="{{ route('admin.testimonials.index') }}" class="group rounded-2xl bg-white p-6 shadow-sm border border-gray-100 hover:border-gold hover:shadow-md transition-all duration-300 relative overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-gray-50 rounded-full group-hover:bg-gold/5 transition-colors"></div>
            <div class="relative z-10 flex flex-col justify-between h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 rounded-lg bg-gold/10 text-gold flex items-center justify-center">
                        <i class="fa-solid fa-star text-lg"></i>
                    </div>
                    <div class="text-sm text-gray-400 font-medium group-hover:text-gold transition-colors">Manage &rarr;</div>
                </div>
                <div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1">Testimonials</div>
                    <div class="text-3xl font-bold font-outfit text-gray-900">{{ $counts['testimonials'] ?? 0 }}</div>
                </div>
            </div>
        </a>
    </div>

    <!-- Leads Banner -->
    <div class="mt-8 rounded-2xl border border-gray-200 bg-white p-8 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6 relative overflow-hidden">
        <div class="absolute inset-0 z-0 bg-gold/5"></div>
        <div class="absolute right-0 top-0 h-full w-1/3 bg-gradient-to-l from-gold/10 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10">
            <div class="text-xs font-bold uppercase tracking-widest text-gold mb-2">Lead Generation</div>
            <div class="text-3xl md:text-4xl font-bold font-outfit text-gray-900 flex items-end">
                {{ $counts['contacts_unread'] ?? 0 }}
                <span class="text-base font-medium text-gray-500 ml-2 mb-1 border-l border-gray-300 pl-2">unread messages</span>
            </div>
            <div class="mt-2 text-sm text-gray-500 flex items-center">
                <i class="fa-solid fa-inbox mr-2 text-gray-400"></i>
                {{ $counts['contacts_total'] ?? 0 }} total lifetime inquiries
            </div>
        </div>
        
        <a href="{{ route('admin.contacts.index') }}" class="relative z-10 inline-flex items-center rounded-xl bg-gray-900 px-6 py-4 text-sm font-bold text-white shadow-lg hover:bg-gray-800 transition-all hover:-translate-y-0.5 whitespace-nowrap">
            Review Leads Hub
            <i class="fa-solid fa-arrow-right ml-3"></i>
        </a>
    </div>
</x-admin-layout>

