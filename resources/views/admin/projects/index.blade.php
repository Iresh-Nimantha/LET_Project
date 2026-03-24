<x-admin-layout title="Projects">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Projects Management') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage your portfolio, upload project images, and organize categories.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center rounded-lg bg-gold px-5 py-2.5 text-sm font-bold text-white shadow-md hover:bg-gold-600 focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Add New Project
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
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider w-20">Image</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Title</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Category</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($projects as $project)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6">
                                    @if($project->image_path)
                                        <img src="{{ str_starts_with($project->image_path, 'data:image') ? $project->image_path : Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="h-10 w-16 object-cover rounded-md border border-gray-200 shadow-sm">
                                    @else
                                        <div class="h-10 w-16 bg-gray-100 rounded-md border border-gray-200 flex items-center justify-center">
                                            <i class="fa-regular fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium text-gray-900">{{ $project->title }}</div>
                                    @if($project->url)
                                        <div class="text-xs text-blue-500 mt-1 hover:underline"><a href="{{ $project->url }}" target="_blank"><i class="fa-solid fa-link mr-1"></i>Link</a></div>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    <span class="bg-gold/10 text-gold font-medium py-1 px-3 rounded-full text-xs">{{ $project->category ?? 'Uncategorized' }}</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors" title="Edit">
                                            <i class="fa-solid fa-pen text-xs"></i>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-colors" onclick="return confirm('Are you sure you want to delete this project?')" title="Delete">
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
                                        <i class="fa-solid fa-hammer text-2xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">No projects found.</p>
                                    <p class="text-sm text-gray-400 mt-1">Start building your portfolio by adding a project.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($projects->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
