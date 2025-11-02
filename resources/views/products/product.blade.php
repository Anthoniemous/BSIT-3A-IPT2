<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-6 px-6">

            <div class="flex items-center justify-between">
                
                <button id="openModalBtn" class="bg-green-500 py-3 px-5 text-white rounded-md hover:bg-green-700 transition mb-10">
                    Add Product
                </button>
            </div>

           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $product)
                <div class="group bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 mt-10">
                    
                    <!-- Image -->
                    <div class="relative">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute top-3 left-3 px-3 py-1 bg-green-600 text-white text-xs font-semibold rounded-full shadow-sm">
                            {{ $product->category }}
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h2 class="text-lg font-bold text-gray-800 mb-1 truncate">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $product->description }}</p>

                        <div class="flex justify-between items-center mb-3">
                            <span class="text-green-600 font-semibold text-lg">${{ number_format($product->price, 2) }}</span>
                            <span class="text-sm text-gray-500">Qty: {{ $product->quantity }}</span>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-600 font-medium">Status:</span>
                            <span class="text-sm font-semibold {{ $product->status === 'Available' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->status }}
                            </span>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-3">
                            <button 
                                onclick="openEditModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}', '{{ $product->description }}', '{{ $product->category }}', '{{ $product->quantity }}', '{{ $product->image }}')"
                                class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 rounded-xl transition-all shadow-sm hover:shadow-md">
                                <i class="fa-solid fa-pen mr-1"></i> Edit
                            </button>

                            @if ($product->status === 'Active')
                                <form action="{{ route('products.deactivate', $product->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                        class="w-full bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-xl transition-all shadow-sm hover:shadow-md">
                                        <i class="fa-solid fa-ban mr-1"></i> Deactivate
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('products.activate', $product->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 rounded-xl transition-all shadow-sm hover:shadow-md">
                                        <i class="fa-solid fa-check mr-1"></i> Activate
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        </div>

      <div id="productModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="bg-white rounded-3xl w-full max-w-lg p-8 shadow-2xl relative border border-gray-100 transition-all duration-300 scale-100">

                <!-- Close Button -->
                <button id="closeModalBtn" 
                    class="absolute top-4 right-5 text-gray-400 hover:text-red-500 text-3xl font-bold transition-all">
                    &times;
                </button>

                <!-- Header -->
                <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
                    🛍️ Add New Product
                </h2>

                <!-- Form -->
                <form id="productForm" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Product Image</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition">
                                <div class="flex flex-col items-center justify-center pt-4 pb-3">
                                    <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-3xl mb-2"></i>
                                    <p class="text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                </div>
                                <input id="productImageInput" name="image" type="file" accept="image/*" class="hidden" required />
                            </label>
                        </div>
                        <div id="imagePreview" class="mt-3 hidden">
                            <img id="previewImg" src="#" alt="Image Preview" class="w-24 h-24 object-cover rounded-lg border border-green-200 shadow-md mx-auto">
                        </div>
                    </div>

                    <!-- Product Name -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Product Name</label>
                        <input required type="text" name="name"
                            class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all outline-none">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea required name="description" rows="3"
                            class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none transition-all outline-none"></textarea>
                    </div>

                    <!-- Price & Quantity -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Price ($)</label>
                            <input required type="number" name="price"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Quantity</label>
                            <input required type="number" name="quantity"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all outline-none">
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Category</label>
                        <input required type="text" name="category"
                            class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all outline-none">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" id="cancelModalBtn"
                            class="px-5 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition-all font-medium">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2 rounded-xl bg-green-600 text-white hover:bg-green-700 transition-all font-medium shadow-md hover:shadow-lg">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

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
                        <button type="submit" class="bg-black text-white px-4 py-2 rounded-lg hover:yellow-blue-700 transition">
                            Update
                        </button>
                    </div>
                 </div>
            </form>
        </div>
    </div>




    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Modal Elements
    const modal = document.getElementById('productModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelModalBtn = document.getElementById('cancelModalBtn');

    // 🟢 OPEN MODAL
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden'); // prevent background scroll
    });

    // 🔴 CLOSE MODAL (X button or cancel)
    [closeModalBtn, cancelModalBtn].forEach(btn => {
        btn.addEventListener('click', () => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    });

    // ⚫ CLOSE MODAL WHEN CLICKING OUTSIDE THE BOX
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });

    // 🖼️ IMAGE PREVIEW
    const imageInput = document.getElementById('productImageInput');
    const previewContainer = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    imageInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>



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

    <script>
function openEditModal(id, name, price, description, category, quantity, image) {
    const modal = document.getElementById('editProductModal');
    const form = document.getElementById('editProductForm');

    // 🟢 Set form action dynamically
    form.action = `/products/${id}`; // adjust if your route prefix differs

    // 🧩 Fill in existing product data
    document.getElementById('editName').value = name;
    document.getElementById('editPrice').value = price;
    document.getElementById('editDescription').value = description;
    document.getElementById('editCategory').value = category;
    document.getElementById('editQuantity').value = quantity;

    // 🖼️ Set image preview
    const previewContainer = document.getElementById('editImagePreview');
    const previewImg = document.getElementById('editPreviewImg');

    if (image) {
        previewImg.src = `/storage/${image}`;
        previewContainer.classList.remove('hidden');
    } else {
        previewContainer.classList.add('hidden');
    }

    // 🟢 Show modal
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

// 🔴 Close edit modal
function closeEditModal() {
    const modal = document.getElementById('editProductModal');
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

// 🖼️ Handle image preview update when editing
document.addEventListener('DOMContentLoaded', () => {
    const editImageInput = document.getElementById('editProductImageInput');
    const editPreviewContainer = document.getElementById('editImagePreview');
    const editPreviewImg = document.getElementById('editPreviewImg');

    editImageInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                editPreviewImg.src = e.target.result;
                editPreviewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>


    <!-- 🔸 SCRIPT FOR MODAL -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</x-app-layout>
