<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Car;
use Illuminate\Support\Facades\Storage;

header('Content-Type: text/html; charset=utf-8');
echo "<html><body>\n";
foreach (Car::all() as $car) {
    $imageUrl = null;
    if (!empty($car->image) && preg_match('/^https?:\/\//i', $car->image)) {
        $imageUrl = $car->image;
    }
    if (empty($imageUrl) && !empty($car->image) && Storage::disk('public')->exists($car->image)) {
        $imageUrl = Storage::disk('public')->url($car->image);
    }
    if (empty($imageUrl) && !empty($car->image)) {
        $publicPath = public_path($car->image);
        if (file_exists($publicPath)) {
            $imageUrl = asset($car->image);
        }
    }
    if (empty($imageUrl)) {
        $imageUrl = 'https://via.placeholder.com/400x300?text=No+Image';
    }

    echo "<div style=\"margin:12px;display:inline-block;text-align:center;\">\n";
    echo "<div>Car {$car->car_id}: {$car->brand} {$car->model}</div>\n";
    echo "<img src=\"" . htmlspecialchars($imageUrl, ENT_QUOTES) . "\" style=\"width:220px;height:160px;object-fit:cover;\">\n";
    echo "<div style=\"font-size:12px;color:#666;max-width:220px;word-break:break-word;\">" . htmlspecialchars($imageUrl) . "</div>\n";
    echo "</div>\n";
}
echo "</body></html>\n";
