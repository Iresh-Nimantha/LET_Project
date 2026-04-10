<x-admin-layout title="Create Vision Highlight">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <a href="{{ route('admin.vision-highlights.index') }}" class="text-sm font-medium text-gray-400 hover:text-gray-900 mb-2 inline-block transition-colors"><i class="fa-solid fa-arrow-left mr-2"></i>Back to Highlights</a>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Add New Vision Highlight') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.vision-highlights.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="e.g. Precise Details In Every Room" value="{{ old('title') }}" required>
                            @error('title') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="sort_order" class="block text-sm font-bold text-gray-700 mb-2">Display Order <span class="text-red-500">*</span></label>
                                <input type="number" name="sort_order" id="sort_order" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" value="{{ old('sort_order', 1) }}" required>
                                @error('sort_order') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex items-center mt-8">
                                <input type="checkbox" name="is_active" id="is_active" class="h-5 w-5 rounded border-gray-300 text-gold focus:ring-gold" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label for="is_active" class="ml-3 block text-sm font-bold text-gray-700">Active (Visible)</label>
                            </div>
                        </div>

                        <div>
                            <x-image-upload 
                                name="image_base64" 
                                label="Highlight Image" 
                                helperText="PNG, JPG, WEBP recommended a portrait format (e.g. 800x1200)"
                            />
                            @error('image_base64') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="border-t border-gray-100 pt-6 mt-6">
                            <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-widest">Highlight FAQ (Optional)</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="faq_question" class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                                    <input type="text" name="faq_question" id="faq_question" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="Q. Lorem Ipsum is simply dummy text?" value="{{ old('faq_question') }}">
                                    @error('faq_question') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="faq_answer" class="block text-sm font-medium text-gray-700 mb-1">Answer</label>
                                    <textarea name="faq_answer" id="faq_answer" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="Provide the answer here...">{{ old('faq_answer') }}</textarea>
                                    @error('faq_answer') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.vision-highlights.index') }}" class="font-medium text-gray-500 hover:text-gray-900 px-4 py-2 transition-colors">Cancel</a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gray-900 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-colors">
                            <i class="fa-solid fa-check mr-2"></i> Save Highlight
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
