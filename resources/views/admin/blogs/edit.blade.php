<x-admin-layout title="Edit Post">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <a href="{{ route('admin.blogs.index') }}" class="text-sm font-medium text-gray-400 hover:text-gray-900 mb-2 inline-block transition-colors"><i class="fa-solid fa-arrow-left mr-2"></i>Back to Blogs</a>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Edit Post:') }} <span class="text-gold">{{ Str::limit($blog->title, 40) }}</span>
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Post Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" value="{{ old('title', $blog->title) }}" required>
                            @error('title') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <x-image-upload 
                                name="image_base64" 
                                label="Cover Image" 
                                helperText="PNG, JPG, WEBP up to 5MB. Uploading a new image will replace the current one."
                                :value="$blog->cover_image_path"
                            />
                            @error('image_base64') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="excerpt" class="block text-sm font-bold text-gray-700 mb-2">Excerpt <span class="text-red-500">*</span></label>
                            <textarea name="excerpt" id="excerpt" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
                            @error('excerpt') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Main Content <span class="text-red-500">*</span></label>
                            <textarea name="content" id="content" rows="12" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors font-mono" placeholder="Write your full article here...">{{ old('content', $blog->content) }}</textarea>
                            @error('content') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.blogs.index') }}" class="font-medium text-gray-500 hover:text-gray-900 px-4 py-2 transition-colors">Cancel</a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gray-900 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-colors">
                            <i class="fa-solid fa-check mr-2"></i> Update Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <style>
        .ql-toolbar.ql-snow { border-radius: 0.75rem 0.75rem 0 0; border: 1px solid #e5e7eb; background: #f9fafb; padding: 0.75rem; }
        .ql-container.ql-snow { border-radius: 0 0 0.75rem 0.75rem; border: 1px solid #e5e7eb; min-height: 400px; font-family: 'Inter', sans-serif; font-size: 0.875rem; }
        .ql-editor { padding: 1.5rem; }
        .ql-snow .ql-picker.ql-header .ql-picker-label::before { font-weight: 600; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide the original textarea and insert a div for Quill
            const textarea = document.getElementById('content');
            textarea.style.display = 'none';
            
            const quillContainer = document.createElement('div');
            quillContainer.id = 'quill-editor';
            textarea.parentNode.insertBefore(quillContainer, textarea.nextSibling);

            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Write your full article here...',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'align': [] }],
                        ['link', 'video', 'image'],
                        ['clean']
                    ]
                }
            });

            // Set initial value
            if (textarea.value) {
                quill.clipboard.dangerouslyPasteHTML(textarea.value);
            }

            // Sync on form submit
            const form = textarea.closest('form');
            form.addEventListener('submit', function() {
                // Get raw HTML
                textarea.value = quill.root.innerHTML;
            });
        });
    </script>
</x-admin-layout>
