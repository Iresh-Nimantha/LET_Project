<x-admin-layout title="Contact Leads">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Contact Leads') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage inquiries, messages, and quote requests.</p>
            </div>
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
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider w-20">Status</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Contact Info</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Subject & Message</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider">Date</th>
                            <th class="py-4 px-6 bg-gray-50 border-b border-gray-100 font-bold uppercase text-xs text-gray-400 tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($contacts as $contact)
                            <tr class="hover:bg-gray-50/50 transition-colors {{ !$contact->is_read ? 'bg-blue-50/30' : '' }}">
                                <td class="py-4 px-6">
                                    @if($contact->is_read)
                                        <span class="inline-flex items-center justify-center px-2.5 py-1 text-xs font-bold text-gray-500 bg-gray-100 rounded-lg"><i class="fa-solid fa-check-double mr-1"></i> Read</span>
                                    @else
                                        <span class="inline-flex items-center justify-center px-2.5 py-1 text-xs font-bold text-blue-700 bg-blue-100 rounded-lg"><i class="fa-solid fa-envelope mr-1"></i> New</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">{{ $contact->name }}</div>
                                    <div class="text-sm text-gray-500 mt-1">
                                        <a href="mailto:{{ $contact->email }}" class="hover:text-gold transition-colors block"><i class="fa-regular fa-envelope mr-1"></i> {{ $contact->email }}</a>
                                        <a href="tel:{{ $contact->phone }}" class="hover:text-gold transition-colors block mt-1"><i class="fa-solid fa-phone mr-1 text-xs"></i> {{ $contact->phone }}</a>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900 max-w-xs truncate" title="{{ $contact->subject ?? 'No Subject' }}">{{ $contact->subject ?? 'No Subject' }}</div>
                                    <div class="text-sm text-gray-500 mt-1 max-w-xs truncate" title="{{ $contact->message }}">
                                        {{ $contact->message }}
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    <div class="font-medium text-gray-700">{{ $contact->created_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-400 mt-1">{{ $contact->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex justify-end gap-2 items-center">
                                        @if(!$contact->is_read)
                                            <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 font-semibold text-xs hover:bg-blue-600 hover:text-white transition-colors" title="Mark Read">
                                                    Mark Read
                                                </button>
                                            </form>
                                        @endif
                                        
                                        <button onclick="document.getElementById('msg_{{ $contact->id }}').classList.toggle('hidden')" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-50 text-gray-600 hover:bg-gray-200 hover:text-gray-900 transition-colors" title="View Full Message">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </button>
                                        
                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-colors" onclick="return confirm('Are you sure you want to delete this message?')" title="Delete">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr id="msg_{{ $contact->id }}" class="hidden bg-gray-50/80 border-b border-gray-100">
                                <td colspan="5" class="py-6 px-8">
                                    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm relative">
                                        <div class="absolute top-6 right-6 text-gray-300">
                                            <i class="fa-solid fa-quote-right text-4xl"></i>
                                        </div>
                                        <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-3">Full Message Content</h4>
                                        <p class="text-gray-700 whitespace-pre-wrap leading-relaxed relative z-10">{{ $contact->message }}</p>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 px-6 text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                                        <i class="fa-solid fa-inbox text-2xl text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">No contact messages received yet.</p>
                                    <p class="text-sm text-gray-400 mt-1">Inquiries from the website will appear here.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($contacts->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $contacts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
