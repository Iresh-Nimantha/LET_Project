<x-admin-layout title="Blogs">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Blogs Management') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage your articles, news updates, and publications.</p>
            </div>
            <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center justify-center rounded-lg bg-gold px-5 py-2.5 text-sm font-bold text-white shadow-md hover:bg-gold-600 focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Add New Post
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
                <div class="flex items-center">
                    <i class="fa-solid fa-circle-check text-green-500 mr-3 text-lg"></i>
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider w-20">Cover</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Title</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Date</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($blogs as $blog)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6">
                                    @if($blog->cover_image_path)
                                        <img src="{{ str_starts_with($blog->cover_image_path, 'data:image') ? $blog->cover_image_path : Storage::url($blog->cover_image_path) }}" alt="{{ $blog->title }}" class="h-10 w-16 object-cover rounded-md border border-gray-200 shadow-sm">
                                    @else
                                        <div class="h-10 w-16 bg-gray-100 rounded-md border border-gray-200 flex items-center justify-center">
                                            <i class="fa-regular fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium text-gray-900 truncate max-w-xs">{{ $blog->title }}</div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    <span class="bg-gray-100 text-gray-600 font-medium py-1 px-3 rounded-full text-xs"><i class="fa-regular fa-calendar mr-1"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors" title="Edit">
                                            <i class="fa-solid fa-pen text-xs"></i>
                                        </a>
                                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-colors" onclick="return confirm('Are you sure you want to delete this post?')" title="Delete">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-12 px-6 text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                                        <i class="fa-solid fa-file-pen text-2xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">No blogs found.</p>
                                    <p class="text-sm text-gray-400 mt-1">Start writing your first article today.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($blogs->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $blogs->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
