<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

          {{-- ✅ Upload Profile Photo --}}
            <div class="p-6 sm:p-8 bg-white shadow-md sm:rounded-2xl">
                <div class="max-w-xl mx-auto text-center">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Profile Photo</h2>

                    <form action="{{ route('profile.uploadPhoto') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-5" id="photoUploadForm">
                        @csrf

                        {{-- Image Preview --}}
                        <div class="flex flex-col items-center space-y-4">
                            @if (auth()->user()->image)
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" 
                                    alt="Profile Photo"
                                    class="w-32 h-32 rounded-full object-cover ring-4 ring-blue-200 shadow-md transition duration-300 hover:scale-105">
                            @else
                                <div
                                    class="w-32 h-32 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 ring-2 ring-gray-200">
                                    <i class="fa-solid fa-user text-4xl"></i>
                                </div>
                            @endif
                        </div>

                        {{-- File Input --}}
                        <div class="flex flex-col items-center">
                            <label for="image"
                                class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 shadow">
                                <i class="fa-solid fa-upload mr-2"></i> Choose New Photo
                            </label>
                            <input type="file" name="image" id="image" class="hidden" required>
                        </div>

                        {{-- Upload Button --}}
                        <div class="flex justify-center">
                            <button type="submit"
                                    class="px-6 py-2 bg-green-600 text-white font-medium rounded-lg shadow hover:bg-green-700 transition duration-200">
                                <i class="fa-solid fa-check mr-2"></i> Upload Photo
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            {{-- Existing Profile Sections --}}
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

</x-app-layout>
