<x-admin-layout title="Edit Admin User">
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-gray-400 hover:text-gray-900 mb-2 inline-block transition-colors"><i class="fa-solid fa-arrow-left mr-2"></i>Back to Admins</a>
                <h2 class="text-2xl font-bold font-outfit text-gray-900 leading-tight">
                    {{ __('Edit Admin Account:') }} <span class="text-gold">{{ $user->name }}</span>
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" value="{{ old('name', $user->name) }}" required>
                            @error('name') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-gold focus:ring-gold transition-colors" value="{{ old('email', $user->email) }}" required>
                            @error('email') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div class="p-4 rounded-xl border border-gray-100 bg-gray-50/50 mt-6">
                            <h4 class="text-sm font-bold text-gray-900 mb-4 flex items-center"><i class="fa-solid fa-lock text-gray-400 mr-2"></i> Change Password <span class="text-xs text-gray-500 font-normal ml-2">(leave blank to keep current)</span></h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="password" class="block text-xs font-bold text-gray-700 mb-2">New Password</label>
                                    <input type="password" name="password" id="password" class="block w-full rounded-xl border-gray-200 bg-white px-4 py-3 text-sm focus:border-gold focus:ring-gold transition-colors">
                                    @error('password') <span class="text-red-500 text-xs mt-2 block font-medium">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-xs font-bold text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-xl border-gray-200 bg-white px-4 py-3 text-sm focus:border-gold focus:ring-gold transition-colors">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.users.index') }}" class="font-medium text-gray-500 hover:text-gray-900 px-4 py-2 transition-colors">Cancel</a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gray-900 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-colors">
                            <i class="fa-solid fa-check mr-2"></i> Update Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
