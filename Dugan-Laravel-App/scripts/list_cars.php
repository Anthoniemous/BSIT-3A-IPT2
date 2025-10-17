<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
// Use the model directly
use App\Models\Car;
foreach (Car::all() as $c) {
    echo "{$c->car_id}|{$c->brand}|{$c->model}|{$c->image}\n";
}
