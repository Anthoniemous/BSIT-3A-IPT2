<section class="border-b border-gray-200 pb-8 mb-8">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
            <p class="mt-1 text-sm text-gray-600">Keep your account secure with a strong password.</p>
        </header>

        <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-6">
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