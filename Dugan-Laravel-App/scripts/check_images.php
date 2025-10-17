<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Car;

$cars = Car::all();
foreach ($cars as $car) {
    echo "Car {$car->id}: {$car->brand} {$car->model}\n";
    echo "Image URL: {$car->image}\n\n";
}