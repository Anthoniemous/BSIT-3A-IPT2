<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Display all categories
    public function index()
    {
        $categories = Category::all();
        return view('managecategories', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('addcategory');
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->only('name', 'description'));

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category added successfully!');
    }

    // Show form to edit an existing category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('editcategory', compact('category'));
    }

    // Update category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('name', 'description'));

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully!');
    }

    // Delete category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully!');
    }
}
