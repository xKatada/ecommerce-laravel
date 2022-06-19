@extends('seller.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="container-xl mb-3">
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
                        <a onclick="document.getElementById('deleteProduct').submit()" class="btn btn-danger d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                            Delete product
                            <form action="{{ route('product.destroy', $product->id) }}" method="post" id="deleteProduct">@method('delete')@csrf</form>
                        </a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                            Edit product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xl">
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
                        <h2><strong class="text-primary">{{ "$".$product->product_price }}</strong></h2>
                    </p>
                    <br>
                    <p class="lead">
                        {{ $product->product_desc }}
                    </p>
                </form>
            </div>
        </div>
    </div>
    <div class="container-xl pt-3">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h1>Similar Products</h1>
                </div>
            </div>
        </div>
        <div class="row row-deck">
            @foreach ($products as $item)
                @if ($product->id != $item->id)
                    <div class="col-md-4 mb-2">
                        <div class="card p-0">
                            <div class="card-img-top img-responsive img-responsive-21x21" style="background-image: url({{ asset('storage/product_images/'.$item->image) }})"></div>
                            <div class="card-body">
                                <a href="{{ route('product.show', $item->id) }}"><h4>{{ $item->product_name }}</h4></a>
                                <h1>{{ "$".$item->product_price }}</h1>
                                <p>{{ $item->product_desc }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- <div class="col-md-12">
                    <h3>No similar product</h3>
                </div> --}}
            @endforeach
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection