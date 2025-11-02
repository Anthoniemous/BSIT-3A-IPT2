<section>
        <header>
            <h2 class="text-lg font-medium text-red-700">Delete Account</h2>
            <p class="mt-1 text-sm text-gray-600">Once deleted, all data will be permanently removed.</p>
        </header>

        <form method="POST" action="{{ route('profile.destroy') }}" class="mt-6">
            @csrf
            @method('DELETE')

            <div class="flex items-center gap-4">
                <button type="submit"
                    onclick="return confirm('Are you sure you want to delete your account?')"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Delete Account
                </button>
            </div>
        </form>
    </section>
</div>