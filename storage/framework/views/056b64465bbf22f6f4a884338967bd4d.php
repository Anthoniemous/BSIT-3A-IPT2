<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-gray-100 flex flex-col fixed h-full">
            <div class="flex items-center justify-center h-16 border-b border-gray-700">
                <h1 class="text-xl font-semibold text-white">Restoré<span class="text-blue-500"></span></h1>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">
                <!-- Dashboard Link -->
                <a href="<?php echo e(url('/dashboard')); ?>" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                          <?php echo e(request()->is('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white'); ?>">
                    <span class="flex items-center justify-center w-5"><i class="fa-solid fa-house"></i></span>
                    <span>Dashboard</span>
                </a>

                <!-- Product Link -->
                <a href="<?php echo e(url('/products')); ?>" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                          <?php echo e(request()->is('product') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white'); ?>">
                    <span class="flex items-center justify-center w-5"><i class="fa-solid fa-box"></i></span>
                    <span>Products</span>
                </a>

                <!-- Category Link -->
                <a href="<?php echo e(url('/category')); ?>" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                          <?php echo e(request()->is('category') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white'); ?>">
                    <span class="flex items-center justify-center w-5"><i class="fa-solid fa-layer-group"></i></span>
                    <span>Category</span>
                </a>

                <!-- Customer Link -->
                <a href="<?php echo e(url('/customer')); ?>" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                          <?php echo e(request()->is('customer') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white'); ?>">
                    <span class="flex items-center justify-center w-5"><i class="fa-solid fa-users"></i></span>
                    <span>Customer</span>
                </a>

                <!-- Orders Link -->
                <a href="<?php echo e(url('/order')); ?>" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                          <?php echo e(request()->is('order') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white'); ?>">
                    <span class="flex items-center justify-center w-5"><i class="fa-solid fa-receipt"></i></span>
                    <span>Orders</span>
                </a>

                <!-- Settings Link -->
                <a href="<?php echo e(url('/settings')); ?>" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-800 transition
                          <?php echo e(request()->is('settings') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white'); ?>">
                    <span class="flex items-center justify-center w-5"><i class="fa-solid fa-gear"></i></span>
                    <span>Settings</span>
                </a>
            </nav>

            <div class="border-t border-gray-700 p-4">
                <?php if(auth()->guard()->check()): ?>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-300"><?php echo e(Auth::user()->name); ?></span>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-sm text-red-400 hover:text-red-600">Logout</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </aside>

        <!-- Main content area -->
        <div class="flex-1 ml-64 flex flex-col">
            
            <!-- Top Navbar -->
            <nav class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">

                        <div class="flex items-center">
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-lg font-semibold text-gray-800">
                                Admin Dashboard
                            </a>
                        </div>

                        <!-- Right Side: Profile Dropdown -->
<div class="relative" x-data="{ open: false }">
    <button 
        @click="open = !open"
        class="flex items-center space-x-3 bg-gray-100 px-3 py-2 rounded-lg hover:bg-gray-200 transition"
    >
        <img 
            class="h-8 w-8 rounded-full object-cover" 
            src="<?php echo e(Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name); ?>"
            alt="<?php echo e(Auth::user()->name); ?>"
        >
        <span class="text-gray-700">
            <?php echo e(Auth::user()->name); ?>

        </span>
    </button>

    <!-- Dropdown Menu -->
    <div 
        x-show="open"
        @click.outside="open = false"
        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50"
    >
        <!-- Admin Profile Link -->
        <a 
            href="<?php echo e(route('admin.profile.edit')); ?>" 
            class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
        >
            Profile
        </a>

        <!-- User Dashboard Link -->
        <a 
            href="<?php echo e(route('dashboard')); ?>" 
            class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
        >
            User Dashboard
        </a>

        <!-- Logout -->
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button 
                type="submit" 
                class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100"
            >
                Logout
            </button>
        </form>
    </div>
</div>


                    </div>
                </div>
            </nav>

            <!-- Page content -->
            <main class="p-6">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Users\USER\Desktop\BSIT-3A-IPT2\Restor-Laravel-App\resources\views/layouts/admin.blade.php ENDPATH**/ ?>