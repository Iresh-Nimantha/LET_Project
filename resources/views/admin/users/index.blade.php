<x-admin-layout title="Admin Staff">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Admin Users') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage personnel with access to this dashboard.</p>
            </div>
            
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center rounded-xl bg-gold px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-gold-600 focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Add New Admin
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-600 font-medium flex items-center shadow-sm">
                <i class="fa-solid fa-circle-check text-green-500 mr-2 text-lg"></i>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600 font-medium flex items-center shadow-sm">
                <i class="fa-solid fa-circle-xmark text-red-500 mr-2 text-lg"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Created At</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-bold text-gray-900">{{ $user->name }}</div>
                                @if(auth()->id() === $user->id)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-green-100 text-green-800 tracking-wide mt-1">
                                        YOU
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-600">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 text-gray-400 hover:text-gold transition-colors bg-white rounded-lg shadow-sm border border-gray-100 hover:border-gold" title="Edit Admin">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('WARNING: Are you sure you want to delete this admin account?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 hover:text-red-500 transition-colors bg-white rounded-lg shadow-sm border border-gray-100 hover:border-red-500" title="Delete Admin" {{ auth()->id() === $user->id ? 'disabled' : '' }}>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                <i class="fa-regular fa-folder-open text-4xl mb-3 text-gray-300"></i>
                                <p class="text-sm font-medium">No admin users found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
