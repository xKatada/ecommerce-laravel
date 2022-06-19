<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::paginate(6);
    $categories = Category::all();
    return view('guest.home', compact('categories', 'products'));
})->name('welcome');

Route::get('/about-us', function(){
    $categories = Category::all();
    return view('guest.about', compact('categories'));
})->name('about');

Route::get('/contact-us', function(){
    $categories = Category::all();
    return view('guest.contact', compact('categories'));
})->name('contact');

Route::get('/guest/products/{id}', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::controller(CartController::class)->group(function () {
    Route::get('/guest/cart', 'index')->name('cart.index');
    Route::get('/guest/product/{id}', 'show')->name('product.details');
    Route::get('/guest/product/add-to-cart/{id}', 'addToCart')->name('product.addToCart');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    // Category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/products/show/{id}', 'show')->name('category.show'); //Show products
        Route::delete('/category/delete/{id}', 'destroy')->name('category.destroy');
        Route::get('/category/products/edit/{id}', 'edit')->name('category.edit');
        Route::put('/category/products/update/{id}', 'update')->name('category.update');
    });
    // Products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'products')->name('products');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/show/{id}', 'show')->name('product.show');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::put('/product/update/{id}', 'update')->name('product.update');
        Route::delete('/product/delete/{id}', 'destroy')->name('product.destroy');
    });
});
