<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $products = Product::where('category_id','=',$id)->paginate(6);
        $categories = Category::all();
        $category = $categories->find($id);
        return view('guest.products', compact('products', 'categories', 'category'));
    }

    public function products()
    {
        $products = Product::paginate(6);
        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('product_images', $filename, 'public');
        Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_desc' => $request->product_desc,
            'category_id' => $request->category,
            'image' => $filename
        ]);

        return redirect()->route('products')->with('success', 'Product saved successfully!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        // $products = Category::where('id','=',$product->category_id)->with(['products' => function ($query) use($id) {
        //     $query->where('id','!=',$id);
        // }]);
        $products = Product::where('category_id','=',$product->category_id)->paginate(3);
        return view('seller.products.show', compact('product', 'products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('product_images', $filename, 'public');
    
        Product::where('id','=',$id)->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_desc' => $request->product_desc,
            'category_id' => $request->category,
            'image' => $filename
        ]);

        return redirect()->route('products')->with('success', 'Product saved successfully!');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products')->with('delete', 'Product deleted successfully!');
    }
}
