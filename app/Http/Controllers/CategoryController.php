<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('seller.category.index', compact('categories'));
    }

    public function create()
    {
        return view('seller.category.create');
    }

    public function show($id)
    {
        $products = Product::where('category_id','=',$id)->paginate(6);
        $category = Category::find($id);
        return view('seller.category.show', compact('products', 'category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('seller.category.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('product_images', $filename, 'public');

        Category::create([
            'category' => $request->category,
            'image' => $filename
        ]);

        return redirect()->route('categories')->with('success', 'Category saved!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('product_images', $filename, 'public');

        Category::where('id','=',$id)->update([
            'category' => $request->category,
            'image' => $filename
        ]);

        return redirect()->route('categories')->with('success', 'Category saved!');
    }
}
