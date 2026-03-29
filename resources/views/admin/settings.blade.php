<x-admin-layout title="Site Settings">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Global Site Settings') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage platform branding, contact info, and homepage text.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
                <div class="flex items-center">
                    <i class="fa-solid fa-circle-check text-green-500 mr-3 text-lg"></i>
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" x-data="{ isSubmitting: false }" @submit="isSubmitting = true">
                    @csrf
                    @method('PUT')

                    <div class="space-y-10">
                        <!-- Branding -->
                        <div>
                            <h3 class="text-lg font-bold font-outfit text-gray-900 border-b border-gray-100 pb-3 mb-6"><i class="fa-solid fa-palette text-gold mr-2"></i> Branding & Logo</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Site Name</label>
                                    <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">
                                </div>
                                <div>
                                    <x-image-upload 
                                        name="logo_base64" 
                                        label="Brand Logo" 
                                        helperText="PNG/JPG up to 2MB (Transparent recommended)"
                                        :value="$setting->logo_path"
                                    />
                                    @error('logo_base64') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div>
                            <h3 class="text-lg font-bold font-outfit text-gray-900 border-b border-gray-100 pb-3 mb-6"><i class="fa-solid fa-address-book text-gold mr-2"></i> Contact Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Phone Number</label>
                                    <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email', $setting->email) }}" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Opening Hours</label>
                                    <textarea name="opening_hours" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">{{ old('opening_hours', $setting->opening_hours) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Office Address</label>
                                    <textarea name="address" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">{{ old('address', $setting->address) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Homepage Front Text -->
                        <div>
                            <h3 class="text-lg font-bold font-outfit text-gray-900 border-b border-gray-100 pb-3 mb-6"><i class="fa-solid fa-house-chimney text-gold mr-2"></i> Homepage Text Content</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Hero Title</label>
                                    <textarea name="hero_title" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">{{ old('hero_title', $setting->hero_title) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Hero Description</label>
                                    <textarea name="hero_description" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">{{ old('hero_description', $setting->hero_description) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">About Us Title</label>
                                    <input type="text" name="about_title" value="{{ old('about_title', $setting->about_title) }}" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">About Us Description</label>
                                    <textarea name="about_description" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">{{ old('about_description', $setting->about_description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div>
                            <h3 class="text-lg font-bold font-outfit text-gray-900 border-b border-gray-100 pb-3 mb-6"><i class="fa-solid fa-share-nodes text-gold mr-2"></i> Social & Footer</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Footer About Text</label>
                                    <textarea name="footer_description" rows="3" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors">{{ old('footer_description', $setting->footer_description) }}</textarea>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="relative">
                                        <label class="block text-sm font-bold text-gray-700 mb-2">Facebook URL</label>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-gray-200 bg-gray-100 text-gray-500"><i class="fa-brands fa-facebook"></i></span>
                                            <input type="url" name="social_facebook" value="{{ old('social_facebook', $setting->social_facebook) }}" class="block w-full rounded-none rounded-r-xl border-gray-200 bg-white px-4 py-3 text-sm focus:border-gold focus:ring-gold transition-colors">
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <label class="block text-sm font-bold text-gray-700 mb-2">Instagram URL</label>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-gray-200 bg-gray-100 text-gray-500"><i class="fa-brands fa-instagram"></i></span>
                                            <input type="url" name="social_instagram" value="{{ old('social_instagram', $setting->social_instagram) }}" class="block w-full rounded-none rounded-r-xl border-gray-200 bg-white px-4 py-3 text-sm focus:border-gold focus:ring-gold transition-colors">
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <label class="block text-sm font-bold text-gray-700 mb-2">LinkedIn URL</label>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-gray-200 bg-gray-100 text-gray-500"><i class="fa-brands fa-linkedin hover:underline"></i></span>
                                            <input type="url" name="social_linkedin" value="{{ old('social_linkedin', $setting->social_linkedin) }}" class="block w-full rounded-none rounded-r-xl border-gray-200 bg-white px-4 py-3 text-sm focus:border-gold focus:ring-gold transition-colors">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end">
                        <button type="submit" :disabled="isSubmitting" class="inline-flex items-center justify-center rounded-xl bg-gray-900 px-8 py-3.5 text-sm font-bold text-white shadow-xl shadow-gray-900/10 hover:-translate-y-0.5 hover:shadow-gray-900/20 hover:bg-gray-800 transition-all duration-300 disabled:opacity-75 disabled:cursor-not-allowed disabled:hover:translate-y-0">
                            <span x-show="!isSubmitting"><i class="fa-solid fa-cloud-arrow-up mr-2 text-gold"></i> Save Configuration</span>
                            <span x-show="isSubmitting" x-cloak><i class="fa-solid fa-spinner fa-spin mr-2 text-gold"></i> Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
