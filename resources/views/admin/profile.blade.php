    @extends('layouts.admin')

    @section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg border border-orange-100 relative">

        {{-- ✅ Back to Dashboard Button --}}
        <div class="absolute top-6 right-6">
            <a href="{{ route('dashboardadmin') }}"
                class="inline-flex items-center bg-orange-600 hover:bg-orange-700 text-white text-sm font-semibold px-4 py-2 rounded-md shadow transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19l-7-7 7-7" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <h2 class="text-2xl font-bold text-orange-800 mb-8">Admin Profile Settings</h2>

        {{-- ✅ Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ Section 1: Profile Picture --}}
        <section class="border-b border-gray-200 pb-8 mb-8">
            <header>
                <h2 class="text-lg font-medium text-gray-900">Profile Picture</h2>
                <p class="mt-1 text-sm text-gray-600">Update your account's profile picture.</p>
            </header>

            <form method="POST" action="{{ route('admin.updateImage') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf

                <div class="flex flex-col items-start space-y-4">
                    <img id="profilePreview"
                        src="{{ $admin && $admin->profile_image 
                            ? asset('storage/' . $admin->profile_image)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($admin->name) . '&background=B45309&color=fff' }}"
                        alt="Profile Picture"
                        class="w-28 h-28 rounded-full object-cover border-2 border-orange-400 shadow">

                    <div class="text-left">
                        <label for="profile_image"
                            class="cursor-pointer inline-block px-4 py-2 bg-orange-600 text-white text-sm rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 transition">
                            Choose Image
                        </label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*" class="hidden" required>
                        <p class="text-xs text-gray-500 mt-2">Accepted formats: JPG, PNG (max 2MB)</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-orange-700 hover:bg-orange-800 text-white font-semibold px-6 py-2 rounded-md shadow">
                        Save
                    </button>
                </div>
            </form>

            @if (session('status') === 'profile-image-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="mt-3 text-sm text-green-600 font-medium">
                    ✅ Profile picture updated successfully!
                </p>
            @endif
        </section>

        {{-- ✅ Section 2: Profile Information --}}
        <section class="border-b border-gray-200 pb-8 mb-8">
            <header>
                <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
                <p class="mt-1 text-sm text-gray-600">Update your name or email address.</p>
            </header>

            <form method="POST" action="{{ route('admin.updateInfo') }}" class="mt-6 space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                        value="{{ old('name', $admin->name) }}" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                        value="{{ old('email', $admin->email) }}" required>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-orange-700 hover:bg-orange-800 text-white font-semibold px-6 py-2 rounded-md shadow">
                        Save Changes
                    </button>
                </div>
            </form>
        </section>

        {{-- ✅ Section 3: Update Password --}}
        <section class="border-b border-gray-200 pb-8 mb-8">
            <header>
                <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
                <p class="mt-1 text-sm text-gray-600">Keep your account secure with a strong password.</p>
            </header>

            <form method="POST" action="{{ route('admin.updatePassword') }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input id="current_password" name="current_password" type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input id="password" name="password" type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-orange-700 hover:bg-orange-800 text-white font-semibold px-6 py-2 rounded-md shadow">
                        Update Password
                    </button>
                </div>
            </form>
        </section>

        {{-- ✅ Section 4: Delete Account --}}
        <section>
            <header>
                <h2 class="text-lg font-medium text-red-700">Delete Account</h2>
                <p class="mt-1 text-sm text-gray-600">Once deleted, all admin data will be permanently removed.</p>
            </header>

            <form method="POST" action="{{ route('admin.destroy') }}" class="mt-6">
                @csrf
                @method('DELETE')

                <div class="flex items-center gap-4">
                    <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this admin account?')"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-md shadow">
                        Delete Account
                    </button>
                </div>
            </form>
        </section>
    </div>

    {{-- ✅ Live Image Preview Script --}}
    <script>
    document.getElementById('profile_image')?.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('profilePreview');
        if (file) {
            const reader = new FileReader();
            reader.onload = e => preview.src = e.target.result;
            reader.readAsDataURL(file);
        }
    });
    </script>
    @endsection
