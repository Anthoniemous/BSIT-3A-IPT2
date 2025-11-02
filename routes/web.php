<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

// Admin Registration
Route::get('/register/admin', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/register/admin', [AdminController::class, 'register'])->name('admin.register.submit');

// // Admin Login
// Route::get('/login/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/login/admin', [AdminController::class, 'login'])->name('admin.login.submit');



Route::get('/login/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login/admin', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/logout/admin', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboardadmin');
    })->name('dashboardadmin');
});




Route::post('/profile/update-image', [ProfileController::class, 'updateImage'])
    ->name('profile.update.image')
    ->middleware('auth');


Route::post('/admin/update-image', [AdminController::class, 'updateImage'])
    ->name('admin.updateImage')
    ->middleware('auth:admin');


    Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/update-image', [AdminController::class, 'updateImage'])->name('admin.updateImage');
});


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'edit'])->name('admin.profile');
    Route::post('/admin/profile/update-image', [AdminController::class, 'updateImage'])->name('admin.updateImage');
    Route::post('/admin/profile/update-info', [AdminController::class, 'updateInfo'])->name('admin.updateInfo');
    Route::post('/admin/profile/update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
     Route::delete('/admin/profile/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
});





// // Admin Dashboard — protected by session
// Route::get('/dashboard/admin', function () {
//     if (!session('admin_id')) {
//         return redirect()->route('admin.login')->withErrors(['email' => 'Please log in first.']);
//     }
//     return view('dashboardadmin');
// })->name('dashboardadmin');

// Admin Logout

Route::post('/logout/admin', [AdminController::class, 'logout'])->name('admin.logout');




Route::get('/admin/dashboard', [AdminController::class, 'dashboardadmin'])->name('dashboardadmin');
Route::get('/admin/products', [AdminController::class, 'manageproducts'])->name('manageproducts');
Route::get('/admin/categories', [AdminController::class, 'managecategories'])->name('managecategories');






Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboardadmin');






// 🟢 Show Manage Products page
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.manage.products');

// 🟢 Show Add Product form
Route::get('/admin/addproduct', [ProductController::class, 'create'])->name('admin.products.create');

// 🟢 Store a new product
Route::post('/admin/addproduct', [ProductController::class, 'store'])->name('admin.products.store');

// 🟢 Show Edit Product form
Route::get('/admin/editproduct/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');

// 🟢 Update the product
Route::put('/admin/editproduct/{id}', [ProductController::class, 'update'])->name('admin.products.update');

// 🟢 Delete a product
Route::delete('/admin/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');





//FOR CAATEGORIES
// Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
// Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
// Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');


// Category routes



    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

















Route::get('/', function () {
    return view('welcome'); // this will load resources/views/welcome.blade.php
});





Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Extra Route

Route::get('/extra', function () {
    return view('profilee');
})->middleware(['auth', 'verified'])->name('profilee');
Route::get('/message', function () {
    return view('message');
})->middleware(['auth', 'verified'])->name('message');
Route::get('/services', function () {
    return view('services');
})->middleware(['auth', 'verified'])->name('services');
Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about');
Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


require __DIR__.'/auth.php';
