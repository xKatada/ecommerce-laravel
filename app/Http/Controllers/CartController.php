<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = Cart::with('products')->get();
        $categories = Category::all();
        return view('guest.cart', compact('categories', 'cart_items'));
    }

    public function show($id)
    {
        $product = Product::where('id','=',$id)->first();
        $categories = Category::all();
        $category = Category::find($product->category_id);
        $similar_products = Product::where('category_id','=',$product->category_id)->paginate(3);
        return view('guest.product', compact('product', 'categories', 'category', 'similar_products'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id)->first();
        $item = Cart::where('product_id','=',$id)->first();
        if ($item === null) {
            Cart::create([
                'product_id' => $id,
                'price' => $product->product_price,
                'item_count' => 1
            ]);
        } else {
            Cart::where('id','=',$item->id)->increment('item_count');
        }

        return redirect()->back()->with('success', 'Product is added to your cart!');
    }
}
