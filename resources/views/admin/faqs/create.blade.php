<x-admin-layout title="Create FAQ">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <a href="{{ route('admin.faqs.index') }}" class="text-sm font-medium text-gray-400 hover:text-gray-900 mb-2 inline-block transition-colors"><i class="fa-solid fa-arrow-left mr-2"></i>Back to FAQs</a>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Create New FAQ') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.faqs.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <div>
                            <label for="question" class="block text-sm font-bold text-gray-700 mb-2">Question / Topic <span class="text-red-500">*</span></label>
                            <input type="text" name="question" id="question" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="e.g. Do you provide free quotes?" value="{{ old('question') }}" required>
                            @error('question') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="answer" class="block text-sm font-bold text-gray-700 mb-2">Answer / Description <span class="text-red-500">*</span></label>
                            <textarea name="answer" id="answer" rows="5" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="Explain the details..." required>{{ old('answer') }}</textarea>
                            @error('answer') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-gray-100">
                            <div>
                                <label for="sort_order" class="block text-sm font-bold text-gray-700 mb-2">Sort Order priority</label>
                                <input type="number" name="sort_order" id="sort_order" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" value="{{ old('sort_order', 0) }}">
                                <span class="text-gray-400 text-xs mt-1 block">Lower numbers appear first.</span>
                                @error('sort_order') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex items-center h-full pt-6">
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" name="is_active" class="sr-only" value="1" {{ old('is_active', true) ? 'checked' : '' }} onchange="this.nextElementSibling.classList.toggle('bg-gold'); this.nextElementSibling.classList.toggle('bg-gray-200'); this.nextElementSibling.firstElementChild.classList.toggle('translate-x-full'); this.nextElementSibling.firstElementChild.classList.toggle('border-white');">
                                        <div class="block w-14 h-8 rounded-full transition-colors {{ old('is_active', true) ? 'bg-gold' : 'bg-gray-200' }}">
                                            <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition transform {{ old('is_active', true) ? 'translate-x-full border-white' : '' }}"></div>
                                        </div>
                                    </div>
                                    <div class="ml-3 font-bold text-gray-700 text-sm">
                                        Publish Active
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.faqs.index') }}" class="font-medium text-gray-500 hover:text-gray-900 px-4 py-2 transition-colors">Cancel</a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gray-900 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-colors">
                            <i class="fa-solid fa-check mr-2"></i> Save FAQ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
