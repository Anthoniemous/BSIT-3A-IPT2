
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-gray-800">RestorApp</a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
                    <a href="#menu" class="text-gray-600 hover:text-gray-900">Menu</a>
                    <a href="#about" class="text-gray-600 hover:text-gray-900">About</a>
                    <a href="#contact" class="text-gray-600 hover:text-gray-900">Contact</a>
                </div>

                <!-- User Profile Dropdown -->
                <div class="relative">
                    <button onclick="toggleDropdown()" class="flex items-center space-x-2">
                        <img 
                            src="<?php echo e(Auth::user()->profile_photo_url); ?>" 
                            alt="Profile Photo"
                            class="w-16 h-16 rounded-full object-cover"
                        />
                        <span class="hidden md:block"><?php echo e(Auth::user()->name); ?></span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                        <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profile</a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold mb-6">Welcome, <?php echo e(Auth::user()->name); ?></h1>

        
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-3">Available Dishes</h2>

            <?php if($menuItems->isEmpty()): ?>
                <p class="text-gray-500">No menu items available.</p>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white shadow rounded-xl p-4 hover:shadow-lg transition">
                            <h3 class="text-lg font-semibold"><?php echo e($item->name); ?></h3>
                            <p class="text-gray-700 mb-2"><?php echo e($item->description); ?></p>
                            <p class="font-bold text-green-600">₱<?php echo e(number_format($item->price, 2)); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </section>

        
        <section>
            <h2 class="text-2xl font-semibold mb-3">Recent Orders</h2>

            <?php if($transactions->isEmpty()): ?>
                <p class="text-gray-500">You have no recent transactions.</p>
            <?php else: ?>
                <div class="bg-white shadow rounded-xl overflow-hidden">
                    <table class="min-w-full text-left border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3 font-semibold text-gray-600">Dish</th>
                                <th class="p-3 font-semibold text-gray-600">Quantity</th>
                                <th class="p-3 font-semibold text-gray-600">Total Price</th>
                                <th class="p-3 font-semibold text-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="p-3"><?php echo e($transaction->menuItem->name ?? 'N/A'); ?></td>
                                    <td class="p-3"><?php echo e($transaction->quantity); ?></td>
                                    <td class="p-3">₱<?php echo e(number_format($transaction->total_price, 2)); ?></td>
                                    <td class="p-3 text-green-600"><?php echo e($transaction->status); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <!-- JavaScript for dropdown toggle -->
    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }
                }
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\Users\USER\Desktop\BSIT-3A-IPT2\Restor-Laravel-App\resources\views/user/user-dashboard.blade.php ENDPATH**/ ?>