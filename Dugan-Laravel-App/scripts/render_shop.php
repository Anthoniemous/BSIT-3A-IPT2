<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// emulate a request to ProductController@shop
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

$controller = new ProductController();
$request = Request::capture();
// call shop and capture response
$response = $controller->shop($request);
if ($response instanceof Illuminate\Contracts\View\View || is_string($response)) {
    echo $response;
    exit(0);
}
if (method_exists($response, 'getContent')) {
    echo $response->getContent();
    exit(0);
}
echo "(no content)";
