<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('tables.categories', compact('categories'));
    }
    public function create()
    {
        return view('forms.CtCreate');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        Category::create($data);
        return redirect()->route('categories');
    }
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('forms.CtUpdate', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $category = Category::where('id', $id)->first();
        $category->update($data);
        return redirect()->route('categories');
    }
    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('categories');
    }
}
