@extends('guest.layouts.app')

@section('content')
    <div class="page-heading about-heading header-text" style="background-image: url({{ asset('storage/product_images/'.$category->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="text-content">
                    <h4>CATEGORY</h4>
                    <h2>{{ $category->category }}</h2>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div>
                        <img src="{{ asset('storage/product_images/'.$product->image) }}" alt="" class="img-fluid wc-image">
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <form action="#" method="post" class="form">
                        <h2>{{ $product->product_name }}</h2>
                        <br>
                        <p class="lead">
                        <small>{{ $product->product_price }}</strong>
                        </p>
                        <br>
                        <p class="lead">
                            {{ $product->product_desc }}
                        </p>
                        <br> 
                        <div class="col-sm-6">
                            <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-primary btn-block">Add to Cart</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Similar Products</h2>
                        <a href="{{ route('products.index', $category->id) }}">view more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach ($similar_products as $item)
                    @if ($item->id != $product->id)
                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="product-details.html"><img src="{{ asset('storage/product_images/'.$item->image) }}" alt=""></a>
                                <div class="down-content">
                                <a href="product-details.html"><h4>{{ $item->product_name }}</h4></a>
                                <h6>{{ $item->product_price }}</h6>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <h6>No similar product</h6>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection