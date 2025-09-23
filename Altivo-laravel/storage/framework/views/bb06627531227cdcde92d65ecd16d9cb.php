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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Home')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="relative min-h-screen">
        <!-- Background with candies -->
        <div class="absolute inset-0">
            <img src="<?php echo e(asset('images/candies.jpg')); ?>" alt="Candies Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-pink-200/60"></div>
        </div>

        <!-- Navigation -->
        <nav class="relative z-10 flex items-center justify-between px-8 py-4 bg-violet-200/90 shadow-md">
            <div class="text-2xl font-bold text-gray-800">
                🍭 <?php echo e(config('app.name', 'Laravel')); ?>

            </div>
            <ul class="flex space-x-4 font-semibold">
    <li>
        <a href="<?php echo e(url('/')); ?>"
           class="px-4 py-2 rounded-full bg-pink-200 text-gray-800 hover:bg-pink-300 shadow-md transition">
            Home
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/about')); ?>"
           class="px-4 py-2 rounded-full bg-violet-200 text-gray-800 hover:bg-violet-300 shadow-md transition">
            About Us
        </a>
    </li>
    <li>
        <a href="<?php echo e(url('/help')); ?>"
           class="px-4 py-2 rounded-full bg-yellow-200 text-gray-800 hover:bg-yellow-300 shadow-md transition">
            Help
        </a>
    </li>
</ul>

            <div class="flex items-center space-x-4">
                <!-- Search -->
                <form action="<?php echo e(url('/search')); ?>" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Search..."
                           class="px-3 py-1 rounded-l-md border border-gray-300 focus:outline-none text-gray-800">
                    <button type="submit"
                            class="bg-yellow-200 px-4 py-1 rounded-r-md font-semibold hover:bg-yellow-300 text-gray-800">
                        Go
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                            class="ml-4 bg-pink-300 px-4 py-1 rounded-md font-semibold text-gray-800 hover:bg-pink-400">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="relative z-10 flex items-center justify-center h-[75vh] text-center">
            <div class="bg-white/70 p-10 rounded-xl shadow-xl max-w-xl">
                <h1 class="text-5xl font-bold mb-4 text-violet-700">Welcome, <?php echo e(Auth::user()->name); ?>!</h1>
                <p class="text-lg text-gray-800 mb-6">
                    You’re logged in 🎉 Enjoy exploring with sweet pastel vibes.
                </p>
                <img src="<?php echo e(asset('images/candy-bowl.png')); ?>" alt="Candy Bowl"
                     class="w-48 mx-auto rounded-lg shadow-md border-4 border-yellow-200">
            </div>
        </div>
    </div>
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
<?php /**PATH C:\xampp\htdocs\altivo-laravel-app\Altivo-laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>