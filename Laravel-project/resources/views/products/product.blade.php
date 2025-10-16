<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        <!-- Top Bar -->
        <div class="flex items-center justify-between">
            <input class="w-[400px] rounded-md border-gray-300 focus:ring-2 focus:ring-black" type="text" placeholder="Search Product">
            <button id="openModalBtn" class="bg-blue-500 py-3 px-5 text-white rounded-md hover:bg-blue-700 transition">
                Add Product
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-5">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                    alt="{{ $product->name }}" 
                    class="w-full h-48 object-cover rounded-lg mb-4">

                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>

                    <p class="text-gray-500 mb-1">
                        <span class="font-medium text-gray-700">Price:</span> ${{ $product->price }}
                    </p>
                     <p class="text-gray-500 mb-1">
                        <span class="font-medium text-gray-700">Description:</span> {{ $product->description }}
                    </p>
                    <p class="text-gray-500 mb-1">
                        <span class="font-medium text-gray-700">Status:</span>
                        <span class="{{ $product->status === 'Available' ? 'text-green-600' : 'text-red-600' }} font-semibold">
                            {{ $product->status }}
                        </span>
                    </p>
                    <p class="text-gray-500 mb-1">
                        <span class="font-medium text-gray-700">Category:</span> {{ $product->category }}
                    </p>
                    <p class="text-gray-500 mb-3">
                        <span class="font-medium text-gray-700">Quantity:</span> {{ $product->quantity }}
                    </p>

                    <div class="flex gap-4">
                       <button 
                            onclick="openEditModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}', '{{ $product->description }}', '{{ $product->category }}', '{{ $product->quantity }}', '{{ $product->image }}')"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-900 transition">
                            Edit
                        </button>


                       @if ($product->status === 'Active')
                            <form action="{{ route('products.deactivate', $product->id) }}" method="POST" class="w-full">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="deactivateBtn w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">
                                    Deactivate
                                </button>
                            </form>
                        @else
                            <form action="{{ route('products.activate', $product->id) }}" method="POST" class="w-full">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
                                    Activate
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <div id="productModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl w-full max-w-lg p-6 shadow-lg relative">

            <!-- Close Button -->
            <button id="closeModalBtn" class="absolute top-3 right-4 text-gray-600 hover:text-black text-2xl font-bold">&times;</button>

            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add New Product</h2>

            <!-- 🔹 Product Form -->
            <form id="productForm" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Product Image</label>
                    <input 
                        required
                        type="file" 
                        accept="image/*" 
                        id="productImageInput"
                        name="image"
                        class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black cursor-pointer">

                    <div id="imagePreview" class="mt-3 hidden">
                        <img id="previewImg" src="#" alt="Image Preview" class="w-32 h-32 object-cover rounded-lg border">
                    </div>
                </div>

                <div class="mb-3">
                    <label  class="block text-gray-700 font-medium mb-1">Product Name</label>
                    <input required type="text" name="name" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-medium mb-1">Description</label>
                    <input  required type="text" name="description" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                </div>

                <div class="flex justify-between w-full gap-4">
                    <div class="mb-3 w-[50%]">
                        <label class="block text-gray-700 font-medium mb-1">Price ($)</label>
                        <input  required type="number" name="price" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                    </div>

                    <div class="mb-3 w-[50%]">
                        <label class="block text-gray-700 font-medium mb-1">Quantity</label>
                        <input  required type="number" name="quantity" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                    </div>

                </div>

                
                
                <div class="mb-3">
                    <label class="block text-gray-700 font-medium mb-1">Category</label>
                    <input  required type="text" name="category" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                </div>

                

                <div class="flex justify-end gap-3 mt-5">
                    <button type="button" id="cancelModalBtn" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                        Cancel
                    </button>
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">

                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-2xl w-full max-w-lg p-6 shadow-lg relative">
            
            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                 <!-- ✅ Image Upload Section -->
                <div class="mb-4">
                    <h2 class="text-xl font-semibold mb-4">Edit Product</h2>
                    <label class="block text-gray-700 font-medium mb-1">Image</label>
                    <input type="file" name="image" id="editProductImageInput" class="w-full border rounded-md px-3 py-2">
                    
                    <!-- Image Preview -->
                    <div id="editImagePreview" class="mt-3 hidden flex justify-center">
                        <img 
                            id="editPreviewImg" 
                            src="" 
                            alt="Preview" 
                            class="w-40 h-40 object-cover rounded-lg border border-gray-300 shadow-sm"
                        >
                    </div>
                </div>

                <div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-medium mb-1">Name</label>
                        <input type="text" name="name" id="editName" class="w-full border rounded-md px-3 py-2">
                    </div>

                     <div class="mb-3">
                        <label class="block text-gray-700 font-medium mb-1">Description</label>
                        <input type="text" name="description" id="editDescription" class="w-full border rounded-md px-3 py-2">
                    </div>

                     <div class="flex justify-between w-full gap-4">
                        <div class="mb-3 w-[50%]">
                            <label class="block text-gray-700 font-medium mb-1">Price ($)</label>
                             <input type="number" name="price" id="editPrice" class="w-full border rounded-md px-3 py-2">
                        </div>

                        <div class="mb-3 w-[50%]">
                            <label class="block text-gray-700 font-medium mb-1">Quantity</label>
                            <input type="number" name="quantity" id="editQuantity" class="w-full border rounded-md px-3 py-2">
                        </div>

                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-medium mb-1">Category</label>
                        <input type="text" name="category" id="editCategory" class="w-full border rounded-md px-3 py-2">
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeEditModal()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                            Cancel
                        </button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Update
                        </button>
                    </div>
                 </div>
            </form>
        </div>
    </div>



    <!-- ✅ SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 2500,
            showConfirmButton: false
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Duplicate Product',
            text: '{{ session('error') }}',
            showConfirmButton: true
        });
    @endif
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const deactivateButtons = document.querySelectorAll('.deactivateBtn');

        deactivateButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const form = button.closest('form'); // get the parent form

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to deactivate this product?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, deactivate',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); 
                    }
                });
            });
        });
    });
    </script>

    <!-- 🔸 SCRIPT FOR MODAL -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</x-app-layout>
