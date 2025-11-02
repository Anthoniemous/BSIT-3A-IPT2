<section class="border-b border-gray-200 pb-8 mb-8">
    <header>
        <h2 class="text-lg font-medium text-orange-700">Profile Picture</h2>
        <p class="mt-1 text-sm text-gray-600">Update your account's profile picture.</p>
    </header>

    <form method="POST" action="{{ route('profile.update.image') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div class="flex flex-col items-start space-y-4">
            <!-- Profile Preview -->
            <img id="profilePreview"
                src="{{ Auth::user()->profile_image 
                    ? asset('storage/' . Auth::user()->profile_image)
                    : asset('images/default-profile.png') }}"
                alt="Profile Picture"
                class="w-28 h-28 rounded-full object-cover border-2 border-orange-400 shadow">

            <!-- File Upload -->
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
        <p x-data="{ show: true }" x-show="show" x-transition
           x-init="setTimeout(() => show = false, 3000)"
           class="mt-3 text-sm text-green-600 font-medium">
           ✅ Profile picture updated successfully!
        </p>
    @endif
</section>

<!-- ✅ Add this JS at the bottom of the file or inside your layout -->
<script>
document.getElementById('profile_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('profilePreview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
