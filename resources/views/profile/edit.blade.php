<x-app-layout>
    <!-- HEADER -->

    <!-- MAIN CONTENT -->
    <div class="py-12 bg-orange-50 min-h-screen">
        
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <h2 class="text-2xl font-bold text-orange-800 mb-8">Admin Profile Settings</h2>

            <!-- Profile Image -->
            <div class="p-6 bg-white border border-orange-200 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                
                <h3 class="text-lg font-semibold text-orange-600 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.88 6.197M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ __('Add Profile Image') }}
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.add-profile-image')
                </div>
            </div>

            <!-- Update Profile Information -->
            <div class="p-6 bg-white border border-orange-200 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <h3 class="text-lg font-semibold text-orange-600 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('Update Profile Information') }}
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-white border border-orange-200 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <h3 class="text-lg font-semibold text-orange-600 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1.9-2 2-2h0a2 2 0 012 2v6h-4v-6zM8 11c0-1.1.9-2 2-2h0a2 2 0 012 2v6H8v-6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 8V6a6 6 0 0112 0v2" />
                    </svg>
                    {{ __('Update Password') }}
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-6 bg-white border border-orange-200 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <h3 class="text-lg font-semibold text-orange-600 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    {{ __('Delete Account') }}
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Button -->
    <button 
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full shadow-lg transition">
        ↑ Top
    </button>

    <!-- Scroll Behavior Script -->
    <script>
        window.addEventListener('load', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</x-app-layout>
