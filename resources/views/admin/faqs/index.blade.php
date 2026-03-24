<x-admin-layout title="FAQ Management">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('FAQs (Q&A)') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage dynamically displayed frequently asked questions.</p>
            </div>
            <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center justify-center rounded-lg bg-gold px-5 py-2.5 text-sm font-bold text-white shadow-md hover:bg-gold-600 focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i> Add New FAQ
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
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Sort</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Question</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Answer</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider text-center">Status</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($faqs as $faq)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-bold text-gray-400">
                                    {{ $faq->sort_order }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium text-gray-900 max-w-xs truncate" title="{{ $faq->question }}">{{ $faq->question }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-sm text-gray-500 max-w-sm truncate" title="{{ $faq->answer }}">{{ $faq->answer }}</div>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    @if($faq->is_active)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Active</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">Hidden</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors" title="Edit">
                                            <i class="fa-solid fa-pen text-xs"></i>
                                        </a>
                                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-colors" onclick="return confirm('Are you sure you want to delete this FAQ?')" title="Delete">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 px-6 text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                                        <i class="fa-solid fa-circle-question text-2xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">No FAQs found.</p>
                                    <p class="text-sm text-gray-400 mt-1">Get started by adding a new Question & Answer snippet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($faqs->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $faqs->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
