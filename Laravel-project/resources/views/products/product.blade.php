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
            <button id="openModalBtn" class="bg-black py-3 px-5 text-white rounded-md hover:bg-gray-800 transition">
                Add Product
            </button>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
            @for ($i = 0; $i < 3; $i++)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-5">
                <img src="{{ asset('img/logo.png') }}" alt="Product Image"
                    class="w-full h-auto object-cover rounded-lg mb-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Wireless Headphones</h2>
                
                <p class="text-gray-500 mb-1"><span class="font-medium text-gray-700">Price:</span> $120</p>
                <p class="text-gray-500 mb-1"><span class="font-medium text-gray-700">Status:</span> 
                    <span class="text-green-600 font-semibold">Available</span>
                </p>
                <p class="text-gray-500 mb-1"><span class="font-medium text-gray-700">Category:</span> Electronics</p>
                <p class="text-gray-500 mb-3"><span class="font-medium text-gray-700">Quantity:</span> 25</p>

                <div class="flex gap-4">
                    <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 transition">Edit</button>
                    <button class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">Delete</button>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <!-- 🔹 MODAL SECTION -->
    <div id="productModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl w-full max-w-lg p-6 shadow-lg relative">

            <!-- Close Button -->
            <button id="closeModalBtn" class="absolute top-3 right-4 text-gray-600 hover:text-black text-xl">&times;</button>

            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add New Product</h2>

            <!-- Product Form -->
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Product Image</label>
                    <input 
                        type="file" 
                        accept="image/*" 
                        id="productImageInput"
                        class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black cursor-pointer">
                    
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-3 hidden">
                        <img id="previewImg" src="#" alt="Image Preview" class="w-32 h-32 object-cover rounded-lg border">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-medium mb-1">Product Name</label>
                    <input type="text" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-medium mb-1">Price ($)</label>
                    <input type="number" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-medium mb-1">Category</label>
                    <input type="text" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                </div>

                <div class="mb-3">
                    <label class="block text-gray-700 font-medium mb-1">Quantity</label>
                    <input type="number" class="w-full border-gray-300 rounded-md focus:ring-2 focus:ring-black">
                </div>

                <div class="flex justify-end gap-3">
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

    <!-- 🔸 SCRIPT FOR MODAL -->
    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const productModal = document.getElementById('productModal');

        openModalBtn.addEventListener('click', () => {
            productModal.classList.remove('hidden');
        });

        const closeModal = () => productModal.classList.add('hidden');
        closeModalBtn.addEventListener('click', closeModal);
        cancelModalBtn.addEventListener('click', closeModal);
        productModal.addEventListener('click', e => {
            if (e.target === productModal) closeModal(); 
        });
    </script>

</x-app-layout>
