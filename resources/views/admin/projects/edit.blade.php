<x-admin-layout title="Edit Project">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">Edit Project: {{ $project->title }}</h2>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900">&larr; Back to Projects</a>
        </div>
    </x-slot>

    <div class="py-6">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-4xl">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Project Title</label>
                    <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold focus:ring-gold">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Category</label>
                    <input type="text" name="category" value="{{ old('category', $project->category) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold focus:ring-gold">
                </div>

                <!-- URL -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Project URL (optional)</label>
                    <input type="url" name="url" value="{{ old('url', $project->url) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold focus:ring-gold">
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold focus:ring-gold">{{ old('description', $project->description) }}</textarea>
                </div>

                <!-- FAQ Question -->
                <div class="md:col-span-2 border-t pt-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">FAQ Section (Optional)</h3>
                    <label class="block text-sm font-bold text-gray-700 mb-2">FAQ Question</label>
                    <input type="text" name="faq_question" value="{{ old('faq_question', $project->faq_question) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold focus:ring-gold">
                </div>

                <!-- FAQ Answer -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">FAQ Answer</label>
                    <textarea name="faq_answer" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold focus:ring-gold">{{ old('faq_answer', $project->faq_answer) }}</textarea>
                </div>
                
                <!-- Image Upload -->
                <div class="md:col-span-2 border-t pt-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Update Project Image</label>
                    @if($project->image_path)
                        <div class="mb-3">
                            <img src="{{ str_starts_with($project->image_path, 'data:image') ? $project->image_path : Storage::url($project->image_path) }}" class="h-32 rounded object-cover shadow-sm">
                        </div>
                    @endif
                    <input type="file" id="imageInput" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gold file:text-white hover:file:bg-gold-600 cursor-pointer border border-gray-200 rounded-lg">
                    <input type="hidden" name="image_base64" id="imageBase64">
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-100">
                <button type="submit" class="bg-gold text-white px-6 py-2 rounded-lg font-bold shadow-md hover:bg-gold-600">Update Project</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if(!file) return;
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('imageBase64').value = event.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>
</x-admin-layout>
