<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Car;
use App\Http\Requests\AddCarRequest;
class ProductController extends Controller


  
{

    public function index(){
        return view("products.productview");
    }
    public  function list(){
        $query = Car::query();
  
        return DataTables::of($query) -> make(true);
    }

    /**
     * Public shop-style product grid (paginated)
     */
    public function shop(Request $request)
    {
        $cars = Car::where('quantity', '>', 0)->orderBy('car_id', 'desc')->paginate(12);
        return view('products.list', compact('cars'));
    }

    public function add(AddCarRequest $request){
         $validated = $request->validated();

    // Handle image upload if present
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('cars', 'public');
        $validated['image'] = $imagePath;
    }

    // Create the car record
    Car::create($validated);


    return response() -> json(["message" => "User Added"],200);


    }

    public function update(Request $request, $id)
{
    $car = Car::findOrFail($id); // Find the car or return 404

    $validated = $request->validate([
        'brand' => ['required', 'string', 'max:50'],
        'model' => ['required', 'string', 'max:50'],
        'year' => ['required', 'integer', 'between:1900,2099'],
        'transmission' => ['required', 'in:Manual,Automatic'],
        'fuel_type' => ['required', 'in:Gasoline,Diesel,Hybrid,Electric'],
        'price' => ['required', 'numeric', 'min:0'],
        'quantity' => ['nullable', 'integer', 'min:1'],
        'description' => ['nullable', 'string'],
        'image' => ['nullable', 'image', 'max:2048'],
    ]);

    // Handle image upload (optional)
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('cars', 'public');
        $validated['image'] = $imagePath;
    }

    $car->update($validated); // Update with validated data

    // Return JSON so frontend AJAX can consume the response
    return response()->json(['message' => 'Car updated successfully', 'car' => $car], 200);
}


public function delete($id)
{
    $car = Car::findOrFail($id); // Find the car or throw 404

    // Optionally: delete image from storage if exists
    if ($car->image && \Storage::disk('public')->exists($car->image)) {
        \Storage::disk('public')->delete($car->image);
    }

    $car->delete(); // Delete the car

    return response()->json(['message' => 'Car deleted successfully.'], 200);
}

    /**
     * Show a single car as JSON for AJAX editing
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }



}
