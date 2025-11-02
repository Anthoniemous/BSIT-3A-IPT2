

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Admin Profile</h1>

    <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Profile Image Preview -->
        <div class="mb-4 flex items-center space-x-4">
            <img 
                src="<?php echo e($admin->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . $admin->name); ?>" 
                alt="Profile Image" 
                class="w-20 h-20 rounded-full object-cover"
            >
            <input type="file" name="profile_image" class="border rounded px-3 py-2 w-full">
        </div>

        <!-- Name -->
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" value="<?php echo e(old('name', $admin->name)); ?>" class="border rounded px-3 py-2 w-full">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email', $admin->email)); ?>" class="border rounded px-3 py-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Desktop\BSIT-3A-IPT2\Restor-Laravel-App\resources\views/admin/profile/edit.blade.php ENDPATH**/ ?>