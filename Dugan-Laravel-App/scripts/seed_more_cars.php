<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Car;
use Illuminate\Support\Facades\DB;

echo "Seeding more cars...\n";

// Truncate without FK issues (handle driver differences)
$driver = DB::getDriverName();
if ($driver === 'mysql') {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('cars')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
} elseif ($driver === 'sqlite') {
    DB::statement('PRAGMA foreign_keys = OFF;');
    DB::table('cars')->delete();
    DB::statement('PRAGMA foreign_keys = ON;');
} else {
    // fallback: attempt to delete
    DB::table('cars')->delete();
}

$now = now();
$cars = [
    ['brand'=>'Toyota','model'=>'Corolla','year'=>2021,'transmission'=>'Automatic','fuel_type'=>'Gasoline','price'=>19999,'quantity'=>5,'description'=>'Reliable compact sedan.','image'=>'https://upload.wikimedia.org/wikipedia/commons/9/9d/2019_Toyota_Corolla_Icon_Tech_VVT-i_HEV_1.8_Front.jpg'],
    ['brand'=>'Honda','model'=>'Civic','year'=>2020,'transmission'=>'Manual','fuel_type'=>'Gasoline','price'=>21999,'quantity'=>3,'description'=>'Sporty and efficient.','image'=>'https://upload.wikimedia.org/wikipedia/commons/7/7d/2018_Honda_Civic_SR_VTEC_1.0_Front.jpg'],
    ['brand'=>'Tesla','model'=>'Model 3','year'=>2022,'transmission'=>'Automatic','fuel_type'=>'Electric','price'=>39999,'quantity'=>2,'description'=>'Electric sedan with autopilot.','image'=>'https://upload.wikimedia.org/wikipedia/commons/6/63/Tesla_Model_3_parked%2C_front_driver_side.jpg'],
    ['brand'=>'Ford','model'=>'Mustang','year'=>2019,'transmission'=>'Manual','fuel_type'=>'Gasoline','price'=>28999,'quantity'=>1,'description'=>'Classic American muscle.','image'=>'https://upload.wikimedia.org/wikipedia/commons/3/30/2018_Ford_Mustang_GT_Front.jpg'],
    ['brand'=>'BMW','model'=>'3 Series','year'=>2021,'transmission'=>'Automatic','fuel_type'=>'Gasoline','price'=>33999,'quantity'=>4,'description'=>'Luxury compact sedan.','image'=>'https://upload.wikimedia.org/wikipedia/commons/2/2c/BMW_3_Series_Sedan_front_20190302.jpg'],
    ['brand'=>'Audi','model'=>'A4','year'=>2020,'transmission'=>'Automatic','fuel_type'=>'Gasoline','price'=>34999,'quantity'=>3,'description'=>'Comfort and performance.','image'=>'https://upload.wikimedia.org/wikipedia/commons/8/82/2019_Audi_A4_Sport_TDi_front.jpg'],
    ['brand'=>'Mercedes-Benz','model'=>'C-Class','year'=>2022,'transmission'=>'Automatic','fuel_type'=>'Gasoline','price'=>37999,'quantity'=>2,'description'=>'Refined and elegant.','image'=>'https://upload.wikimedia.org/wikipedia/commons/3/36/Mercedes-Benz_C-Class_W205_facelift_IMG_0815.jpg'],
    ['brand'=>'Hyundai','model'=>'Elantra','year'=>2021,'transmission'=>'Automatic','fuel_type'=>'Gasoline','price'=>17999,'quantity'=>6,'description'=>'Great value compact.','image'=>'https://upload.wikimedia.org/wikipedia/commons/2/28/2021_Hyundai_Elantra_Sport_front.jpg'],
    ['brand'=>'Kia','model'=>'Sportage','year'=>2020,'transmission'=>'Automatic','fuel_type'=>'Gasoline','price'=>20999,'quantity'=>5,'description'=>'Reliable crossover.','image'=>'https://upload.wikimedia.org/wikipedia/commons/8/8d/2018_Kia_Sportage_front_view.jpg'],
    ['brand'=>'Volkswagen','model'=>'Golf','year'=>2019,'transmission'=>'Manual','fuel_type'=>'Gasoline','price'=>16999,'quantity'=>7,'description'=>'Popular hatchback.','image'=>'https://upload.wikimedia.org/wikipedia/commons/6/6f/2018_Volkswagen_Golf_R-Line_TDi_front.jpg'],
    ['brand'=>'Nissan','model'=>'Altima','year'=>2020,'transmission'=>'Automatic','fuel_type'=>'Gasoline','price'=>18999,'quantity'=>4,'description'=>'Comfortable midsize sedan.','image'=>'https://upload.wikimedia.org/wikipedia/commons/4/4f/2019_Nissan_Altima_SR.jpg'],
    ['brand'=>'Chevrolet','model'=>'Camaro','year'=>2021,'transmission'=>'Manual','fuel_type'=>'Gasoline','price'=>27999,'quantity'=>2,'description'=>'Sport coupe with attitude.','image'=>'https://upload.wikimedia.org/wikipedia/commons/e/e6/2019_Chevrolet_Camaro_SS_in_front.jpg'],
];

foreach ($cars as $c) {
    Car::create($c);
}

echo "Inserted " . count($cars) . " cars.\n";

// Dump the image URLs for verification
foreach (Car::all() as $car) {
    echo "{$car->car_id}|{$car->brand}|{$car->model}|{$car->image}\n";
}

echo "Done.\n";
