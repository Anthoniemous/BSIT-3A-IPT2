<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <a href="<?php echo e(route('admin.profile.edit')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>



    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-gray-100">



    <!-- Main Content -->
        <div class="flex-1 ml-64 p-6 overflow-y-auto">
            <header class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">
                    <?php echo e($header ?? 'Dashboard'); ?>

                </h2>
            </header>

            <main>
                <?php echo e($slot); ?>

            </main>
        </div>

</body>
</html>
<?php /**PATH C:\Users\USER\Desktop\BSIT-3A-IPT2\Restor-Laravel-App\resources\views/layouts/app.blade.php ENDPATH**/ ?>