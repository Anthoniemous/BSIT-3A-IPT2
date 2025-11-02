<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function dashboard()
    {
        $menus = MenuItem::all(); // fetch all menu items
        return view('admin.dashboardadmin', compact('menus'));
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        MenuItem::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Menu added successfully!');
    }

    public function editMenu($id)
    {
        $menu = MenuItem::findOrFail($id);
        return view('admin.editmenu', compact('menu'));
    }

    public function updateMenu(Request $request, $id)
    {
        $menu = MenuItem::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        $menu->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Menu updated successfully!');
    }

    public function deleteMenu($id)
    {
        $menu = MenuItem::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Menu deleted successfully!');
    }
}
