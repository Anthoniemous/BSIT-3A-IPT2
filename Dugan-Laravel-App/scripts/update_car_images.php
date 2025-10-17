<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Car;

$map = [
    // Toyota Corolla (example Wikimedia Commons image)
    1 => 'https://upload.wikimedia.org/wikipedia/commons/9/9d/2019_Toyota_Corolla_Icon_Tech_VVT-i_HEV_1.8_Front.jpg',
    // Honda Civic (example Wikimedia Commons image)
    2 => 'https://upload.wikimedia.org/wikipedia/commons/7/7d/2018_Honda_Civic_SR_VTEC_1.0_Front.jpg',
    // Tesla Model 3 (example Wikimedia Commons image)
    3 => 'https://upload.wikimedia.org/wikipedia/commons/6/63/Tesla_Model_3_parked%2C_front_driver_side.jpg',
];

foreach ($map as $id => $url) {
    $car = Car::find($id);
    if ($car) {
        $car->image = $url;
        $car->save();
        echo "Updated car {$id} -> {$url}\n";
    } else {
        echo "Car {$id} not found\n";
    }
}

echo "Done.\n";
