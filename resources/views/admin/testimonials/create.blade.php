<x-admin-layout title="Add Testimonial">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <a href="{{ route('admin.testimonials.index') }}" class="text-sm font-medium text-gray-400 hover:text-gray-900 mb-2 inline-block transition-colors"><i class="fa-solid fa-arrow-left mr-2"></i>Back to Testimonials</a>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Add New Testimonial') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Client Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="e.g. Jane Doe" value="{{ old('name') }}" required>
                                @error('name') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="role" class="block text-sm font-bold text-gray-700 mb-2">Role / Company <span class="text-gray-400 font-normal ml-2">(optional)</span></label>
                                <input type="text" name="role" id="role" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="e.g. CEO, Acme Inc." value="{{ old('role') }}">
                                @error('role') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <x-image-upload 
                                name="image_base64" 
                                label="Client Photo" 
                                helperText="PNG, JPG, WEBP up to 5MB (Square Recommended)"
                            />
                            @error('image_base64') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="quote" class="block text-sm font-bold text-gray-700 mb-2">Testimonial Quote <span class="text-red-500">*</span></label>
                            <textarea name="quote" id="quote" rows="4" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" placeholder="Their review or feedback..." required>{{ old('quote') }}</textarea>
                            @error('quote') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.testimonials.index') }}" class="font-medium text-gray-500 hover:text-gray-900 px-4 py-2 transition-colors">Cancel</a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gray-900 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-colors">
                            <i class="fa-solid fa-check mr-2"></i> Save Testimonial
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
