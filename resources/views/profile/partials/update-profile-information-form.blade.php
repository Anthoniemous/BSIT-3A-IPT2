<section class="border-b border-gray-200 pb-8 mb-8">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
            <p class="mt-1 text-sm text-gray-600">Update your name or email address.</p>
        </header>

        <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                    value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="bg-orange-700 hover:bg-orange-800 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Save Changes
                </button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition
                       x-init="setTimeout(() => show = false, 2000)"
                       class="text-sm text-green-600 font-medium">
                        ✅ Saved.
                    </p>
                @endif
            </div>
        </form>
    </section>