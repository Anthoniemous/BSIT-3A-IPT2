<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::with('category')->get();
    return view('manageproducts', compact('products'));
}


    public function create() {
        $categories = Category::all();
        return view('addproduct', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/products'), $imageName);
    }

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'category_id' => $request->category_id, // ✅ make sure this line exists
        'image' => $imageName,
    ]);

    return redirect()->route('admin.manage.products')->with('success', 'Product added successfully!');
}


    public function edit($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('editproduct', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = $product->image; // keep old image if none uploaded

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($imageName && file_exists(public_path('uploads/products/' . $imageName))) {
                unlink(public_path('uploads/products/' . $imageName));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.manage.products')->with('success', 'Product updated successfully!');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        // Delete image file if exists
        if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
            unlink(public_path('uploads/products/' . $product->image));
        }

        $product->delete();
        return redirect()->route('admin.manage.products')->with('success', 'Product deleted successfully!');
    }
}
