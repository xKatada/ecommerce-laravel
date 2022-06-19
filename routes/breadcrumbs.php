<?php
use App\Models\Product;
use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// PRODUCTS
Breadcrumbs::for('products', function (BreadcrumbTrail $trail): void {
    $trail->push('Products', route('products'));
});
Breadcrumbs::for('product.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('products')
        ->push('Add Product', route('product.create'));
});
Breadcrumbs::for('product.show', function (BreadcrumbTrail $trail, $id): void {
    $product = Product::find($id)->first();
    $trail->parent('products')
        ->push($product->product_name, route('product.show', $id));
});
Breadcrumbs::for('product.edit', function (BreadcrumbTrail $trail, $id): void {
    $product = Product::find($id)->first();
    $trail->parent('product.show', $id)
        ->push('Edit', route('product.edit', $id));
});

// CATEGORIES
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail): void {
    $trail->push('Category', route('categories'));
});
Breadcrumbs::for('category.show', function (BreadcrumbTrail $trail, $id): void {
    $category = Category::find($id);
    $trail->parent('categories')
        ->push($category->category, route('category.show', $id));
});
Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail, $id): void {
    $category = Category::find($id);
    $trail->parent('category.show', $id)
        ->push('Edit', route('category.edit', $id));
});
Breadcrumbs::for('category.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('categories')
        ->push('Create Category', route('category.create'));
});