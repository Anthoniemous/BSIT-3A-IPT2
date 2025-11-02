<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Product')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6 px-6">

            <div class="flex items-center justify-between">
                
                <button id="openModalBtn" class="bg-green-500 py-3 px-5 text-white rounded-md hover:bg-green-700 transition mb-10">
                    Add Product
                </button>
            </div>

           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 mt-10">
                    
                    <!-- Image -->
                    <div class="relative">
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                            alt="<?php echo e($product->name); ?>" 
                            class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute top-3 left-3 px-3 py-1 bg-green-600 text-white text-xs font-semibold rounded-full shadow-sm">
                            <?php echo e($product->category); ?>

                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h2 class="text-lg font-bold text-gray-800 mb-1 truncate"><?php echo e($product->name); ?></h2>
                        <p class="text-sm text-gray-500 mb-3 line-clamp-2"><?php echo e($product->description); ?></p>

                        <div class="flex justify-between items-center mb-3">
                            <span class="text-green-600 font-semibold text-lg">$<?php echo e(number_format($product->price, 2)); ?></span>
                            <span class="text-sm text-gray-500">Qty: <?php echo e($product->quantity); ?></span>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm text-gray-600 font-medium">Status:</span>
                            <span class="text-sm font-semibold <?php echo e($product->status === 'Available' ? 'text-green-600' : 'text-red-600'); ?>">
                                <?php echo e($product->status); ?>

                            </span>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-3">
                            <button 
                                onclick="openEditModal('<?php echo e($product->id); ?>', '<?php echo e($product->name); ?>', '<?php echo e($product->price); ?>', '<?php echo e($product->description); ?>', '<?php echo e($product->category); ?>', '<?php echo e($product->quantity); ?>', '<?php echo e($product->image); ?>')"
                                class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 rounded-xl transition-all shadow-sm hover:shadow-md">
                                <i class="fa-solid fa-pen mr-1"></i> Edit
                            </button>

                            <?php if($product->status === 'Active'): ?>
                                <form action="<?php echo e(route('products.deactivate', $product->id)); ?>" method="POST" class="flex-1">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <button type="submit" 
                                        class="w-full bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-xl transition-all shadow-sm hover:shadow-md">
                                        <i class="fa-solid fa-ban mr-1"></i> Deactivate
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="<?php echo e(route('products.activate', $product->id)); ?>" method="POST" class="flex-1">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <button type="submit" 
                                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 rounded-xl transition-all shadow-sm hover:shadow-md">
                                        <i class="fa-solid fa-check mr-1"></i> Activate
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <form id="productForm" method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data" class="space-y-5">
                    <?php echo csrf_field(); ?>

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
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

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
    <?php if(session('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo e(session('success')); ?>',
            timer: 2500,
            showConfirmButton: false
        });


    <?php endif; ?>

    <?php if(session('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Duplicate Product',
            text: '<?php echo e(session('error')); ?>',
            showConfirmButton: true
        });
    <?php endif; ?>
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
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\USER\Desktop\BSIT-3A-IPT2\Restor-Laravel-App\resources\views/products/product.blade.php ENDPATH**/ ?>