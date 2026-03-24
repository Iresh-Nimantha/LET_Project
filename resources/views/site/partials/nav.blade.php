<header class="sticky top-0 z-40 border-b border-white/10 bg-zinc-950/80 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-red-500 to-orange-400 shadow-[0_0_0_1px_rgba(255,255,255,0.08)]"></div>
                <div class="leading-tight">
                    <div class="text-sm font-semibold tracking-wide">London Elite Trades</div>
                    <div class="text-xs text-zinc-400">Premium renovations</div>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-6 text-sm">
                <a class="text-zinc-300 hover:text-white" href="{{ route('services.index') }}">Services</a>
                <a class="text-zinc-300 hover:text-white" href="{{ route('projects.index') }}">Projects</a>
                <a class="text-zinc-300 hover:text-white" href="{{ route('blogs.index') }}">Blog</a>
                <a class="text-zinc-300 hover:text-white" href="{{ route('contact.create') }}">Contact</a>
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-flex items-center rounded-lg bg-white/10 px-3 py-2 text-sm font-medium text-white hover:bg-white/15">
                        Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center rounded-lg bg-white/10 px-3 py-2 text-sm font-medium text-white hover:bg-white/15">
                        Login
                    </a>
                @endauth

                <a href="{{ route('contact.create') }}" class="inline-flex items-center rounded-lg bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow hover:bg-red-400">
                    Get a quote
                </a>

                <button
                    class="md:hidden inline-flex items-center justify-center rounded-lg border border-white/10 bg-white/5 p-2 text-zinc-200 hover:bg-white/10"
                    type="button"
                    aria-label="Open menu"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 6h14a1 1 0 010 2H3a1 1 0 010-2zm0 6h14a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="md:hidden border-t border-white/10 py-3 flex flex-wrap gap-4 text-sm">
            <a class="text-zinc-300 hover:text-white" href="{{ route('services.index') }}">Services</a>
            <a class="text-zinc-300 hover:text-white" href="{{ route('projects.index') }}">Projects</a>
            <a class="text-zinc-300 hover:text-white" href="{{ route('blogs.index') }}">Blog</a>
            <a class="text-zinc-300 hover:text-white" href="{{ route('contact.create') }}">Contact</a>
        </div>
    </div>
</header>

