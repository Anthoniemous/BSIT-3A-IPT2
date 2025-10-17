<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Car;

// Use a CDN-hosted car image
$image = 'https://images.unsplash.com/photo-1583121274602-3e2820c69888?auto=format&fit=crop&w=800&q=80';

foreach (Car::all() as $car) {
    $car->image = $image;
    $car->save();
}

echo "All cars updated to use image: {$image}\n";
