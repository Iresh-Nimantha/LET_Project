@props([
    'name', 
    'id' => '', 
    'value' => '', 
    'label' => 'Upload Image', 
    'helperText' => 'PNG, JPG, WEBP up to 5MB',
    'required' => false
])

@php
    $id = $id ?: $name;
@endphp

<div 
    x-data="imageUploader({
        initialPreview: '{{ $value ? (str_starts_with($value, 'data:image') ? $value : Storage::url($value)) : '' }}',
        fieldName: '{{ $name }}',
        maxSize: 5 * 1024 * 1024 // 5MB
    })"
    class="w-full"
>
    <!-- Label -->
    <div class="flex justify-between items-center mb-2">
        <label for="{{ $id }}_file" class="block text-sm font-bold text-gray-700">
            {{ $label }} 
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
        <span class="text-xs text-gray-400 font-medium">{{ $helperText }}</span>
    </div>

    <!-- Hidden Input for Base64 Data -->
    <input type="hidden" name="{{ $name }}" x-model="base64Data" id="{{ $id }}" {{ $required ? 'x-bind:required="!hasImage"' : '' }}>

    <!-- Upload Area -->
    <div 
        class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-dashed rounded-2xl transition-all duration-300 group overflow-hidden bg-gray-50"
        :class="[
            isDragging ? 'border-primary-500 bg-primary-50' : 'border-gray-300 hover:border-primary-400 hover:bg-gray-100',
            hasError ? 'border-red-500 bg-red-50' : ''
        ]"
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="handleDrop($event)"
    >
        
        <!-- File Input -->
        <input 
            type="file" 
            id="{{ $id }}_file" 
            accept="image/png, image/jpeg, image/webp" 
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
            @change="handleFileSelect($event)"
        >

        <!-- State: Empty / Upload Prompt -->
        <div x-show="!previewUrl" class="flex flex-col items-center justify-center pt-5 pb-6 px-4 text-center pointer-events-none transition-opacity duration-300" :class="isDragging ? 'opacity-50' : 'opacity-100'">
            <div class="w-16 h-16 mb-4 rounded-full bg-white shadow-sm flex items-center justify-center text-primary-500 group-hover:scale-110 transition-transform duration-300">
                <i class="fa-solid fa-cloud-arrow-up text-2xl"></i>
            </div>
            <p class="mb-2 text-sm text-gray-700 font-medium"><span class="font-bold text-primary-600">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-400">SVG, PNG, JPG or WEBP (MAX. 800x400px)</p>
        </div>

        <!-- State: Preview Image -->
        <div x-show="previewUrl" class="absolute inset-0 w-full h-full z-0 pointer-events-none bg-gray-900/5">
            <template x-if="previewUrl">
                <img :src="previewUrl" class="w-full h-full object-contain p-2" alt="Preview">
            </template>
            <!-- Overlay actions on hover -->
            <div class="absolute inset-0 bg-gray-900/40 opacity-0 group-hover:opacity-100 flex items-center justify-center gap-4 transition-opacity duration-300 z-20 pointer-events-auto">
                <button type="button" @click.prevent="clearImage()" class="w-10 h-10 rounded-full bg-white/20 hover:bg-red-500 text-white flex items-center justify-center backdrop-blur-sm transition-colors shadow-lg" title="Remove Image">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

    </div>

    <!-- Error Message -->
    <div x-show="errorMessage" x-transition.opacity class="mt-2 text-sm text-red-600 font-medium flex items-center">
        <i class="fa-solid fa-circle-exclamation mr-1.5"></i>
        <span x-text="errorMessage"></span>
    </div>

</div>

@once
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageUploader', ({ initialPreview, fieldName, maxSize }) => ({
            isDragging: false,
            previewUrl: initialPreview || null,
            base64Data: '',
            errorMessage: '',
            
            get hasImage() {
                return this.previewUrl !== null || this.base64Data !== '';
            },

            clearImage() {
                this.previewUrl = null;
                this.base64Data = '';
                this.errorMessage = '';
                document.getElementById(fieldName + '_file').value = '';
            },

            handleDrop(e) {
                this.isDragging = false;
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    this.processFile(files[0]);
                }
            },

            handleFileSelect(e) {
                const files = e.target.files;
                if (files.length > 0) {
                    this.processFile(files[0]);
                }
            },

            processFile(file) {
                this.errorMessage = '';
                
                // Validate format
                const validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    this.errorMessage = 'Invalid file format. Please upload JPG, PNG or WEBP.';
                    this.clearInput();
                    return;
                }

                // Set preview URL for UI
                this.previewUrl = URL.createObjectURL(file);

                // Compress using HTML5 Canvas to strictly prevent MySQL max_allowed_packet crashes
                const img = new Image();
                img.src = this.previewUrl;
                
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Define maximum bounding box for standard web performance
                    const MAX_WIDTH = 1200;
                    const MAX_HEIGHT = 1200;
                    let width = img.width;
                    let height = img.height;

                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;

                    // Draw resized image
                    ctx.drawImage(img, 0, 0, width, height);

                    // Re-encode specifically with 80% compression to slice Base64 output sizes
                    this.base64Data = canvas.toDataURL('image/webp', 0.8);
                    
                    // Fallback for browsers rejecting WebP
                    if (!this.base64Data.startsWith('data:image/webp')) {
                        this.base64Data = canvas.toDataURL('image/jpeg', 0.8);
                    }
                };
                
                img.onerror = () => {
                    this.errorMessage = 'Error processing image format.';
                    this.clearInput();
                };
            },

            clearInput() {
                document.getElementById(fieldName + '_file').value = '';
                this.previewUrl = null;
                this.base64Data = '';
            }
        }));
    });
</script>
@endonce
