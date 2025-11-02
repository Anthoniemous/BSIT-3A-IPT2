@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Admin Profile</h1>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Profile Image Preview -->
        <div class="mb-4 flex items-center space-x-4">
            <img 
                src="{{ $admin->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . $admin->name }}" 
                alt="Profile Image" 
                class="w-20 h-20 rounded-full object-cover"
            >
            <input type="file" name="profile_image" class="border rounded px-3 py-2 w-full">
        </div>

        <!-- Name -->
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="border rounded px-3 py-2 w-full">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="border rounded px-3 py-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
