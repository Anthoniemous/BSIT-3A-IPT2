<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
   public function index() {

        // $products = Product::all(); 
        $products = Product::where('status', 'Active')->get();
       return view('products.product', compact('products'));
   }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string|max:255',
        ]);

        $exists = Product::where('name', $validated['name'])
                    ->where('category', $validated['category'])
                    ->where('description', $validated['description'])
                    ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'This product already exists in the database!');
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category' => $validated['category'],
            'quantity' => $validated['quantity'],
            'image' => $imagePath,
             'description' => $validated['description'],
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        $exists = Product::where('id', '!=', $id)
            ->where('name', $validated['name'])
            ->where('category', $validated['category'])
            ->where('description', $validated['description'])
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Another product with the same details already exists!');
        }

        $hasChanges = 
            $product->name !== $validated['name'] ||
            $product->price != $validated['price'] ||
            $product->category !== $validated['category'] ||
            $product->quantity != $validated['quantity'] ||
            $product->description !== $validated['description'] ||
            $request->hasFile('image');

        if (!$hasChanges) {
            return redirect()->back()->with('info', 'No changes were made.');
        }

        $product->fill($validated);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully!');
    }


    public function deactivate($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'Inactive';
        $product->save();

        return redirect()->back()->with('success', 'Product has been marked as Inactive.');
    }
    
}
