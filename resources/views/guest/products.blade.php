@extends('guest.layouts.app')

@section('content')
<!-- Page Content -->
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
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4">
              <div class="product-item">
                  <a href="{{ route('product.details', $product->id) }}"><img src="{{ asset('storage/product_images/'.$product->image) }}" alt=""></a>
                  <div class="down-content">
                      <a href="{{ route('product.details', $product->id) }}"><h4>{{ $product->product_name }}</h4></a>
                      <h6>{{ "$".$product->product_price }}</h6>
                      <p>{{ $product->product_desc }}</p>
                  </div>
              </div>
            </div>
        @empty
            <div class="container d-flex flex-column justify-content-center align-items-center">
              <img src="{{ asset('assets/images/logistics.svg') }}" alt="" style="height: 300px; width: 300px;">
              <h1>Oops! Seems we're out of supply!</h1>
              <h5>We will notify you once we have the items that you need. Thank you!</h5>
            </div>
        @endforelse
        <div class="col-md-12">
          {{ $products->links() }}
        </div>
    </div>
  </div>
</div>
@endsection