<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Profile picture upload -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!--
                        This form posts to a route that you should create (e.g. route name 'profile.photo.update').
                        It uses multipart/form-data for file upload.
                        Adjust route and input name (avatar) to match your controller.
                    -->
                    <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <div class="flex items-center space-x-4">
                            <!-- Current photo (Jetstream provides profile_photo_url; adjust as needed) -->
                            <div>
                                <img id="photoPreview" src="{{ Auth::user()->profile_photo_url ?? asset('images/default-avatar.png') }}" alt="Profile Photo" class="h-20 w-20 rounded-full object-cover border">
                            </div>

                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                                <input id="avatar" name="avatar" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100" />

                                @error('avatar')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror

                                <p class="text-xs text-gray-500 mt-2">Allowed types: jpg, png, gif. Max size: (configure in backend).</p>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Upload Photo
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Existing profile information / password / delete sections -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple client-side preview
        document.addEventListener('DOMContentLoaded', function () {
            var input = document.getElementById('avatar');
            var preview = document.getElementById('photoPreview');

            if (!input) return;

            input.addEventListener('change', function (e) {
                var file = input.files && input.files[0];
                if (!file) return;

                var reader = new FileReader();
                reader.onload = function (ev) {
                    preview.src = ev.target.result;
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</x-app-layout>
