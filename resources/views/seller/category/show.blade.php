@extends('seller.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-xl pt-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="page-header">
                <div class="row align-items-center mw-100">
                    <div class="col">
                        <div class="mb-3">
                            {{ Breadcrumbs::render() }}
                        </div>
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Categories
                        </h2>
                    </div>
                    <div class="col-auto">
                        <div class="btn-list">
                            <a href="{{ route('product.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                                Add product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl pt-3">
            <div class="col-md-12 col-xl-12 mb-3">
                <a class="card card-link" href="#">
                    <div class="card-cover text-center" style="height: 200px; background-image: url({{ asset('storage/product_images/'.$category->image) }})">
                    </div>
                    <div class="card-body text-center">
                        <h1 class="card-title mb-1">{{ $category->category }}</h1>
                    </div>
                </a>
            </div>
            <div class="row row-deck">
                <div class="page-header mb-3">
                    <div class="col">
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Products
                        </h2>
                    </div>
                </div>
                @forelse ($products as $product)
                    <div class="col-md-4 mb-2">
                        <div class="card p-0">
                            <a href="{{ route('product.show', $product->id) }}">
                                <div class="card-img-top img-responsive img-responsive-21x21" style="background-image: url({{ asset('storage/product_images/'.$product->image) }})"></div>
                            </a>
                            <div class="card-body">
                                <a href="{{ route('product.show', $product->id) }}"><h4>{{ $product->product_name }}</h4></a>
                                <h1>{{ "$".$product->product_price }}</h1>
                                <p>{{ $product->product_desc }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty">
                        <div class="empty-img"><img src="{{ asset('tabler/static/illustrations/undraw_quitting_time_dm8t.svg') }}" height="128"  alt="">
                        </div>
                        <p class="empty-title">Products are managed from here</p>
                        <p class="empty-subtitle text-muted">
                            Seems your store is empty!
                        </p>
                    </div>
                @endforelse
            </div>
            {{ $products->links() }}
        </div>
    </div>
@endsection