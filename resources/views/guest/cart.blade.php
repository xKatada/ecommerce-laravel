@extends('guest.layouts.app')

@section('content')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Find your car today!</h4>
                <h2>CART</h2>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span>Your cart</span>
                    <span class="badge badge-danger badge-pill">{{ $cart_items->sum('item_count') }}</span>
                </h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Count</th>
                            <th scope="col">Price</th>
                            <th scope="col">Item total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart_items as $item)
                            <tr>
                                <th scope="row">
                                    {{ $item->products->product_name }}
                                    {{ $item->products->product_desc }}
                                </th>
                                <td>{{ $item->item_count}}</td>
                                <td>{{ $item->price }}</td>
                                <td class="item_total text-right">{{ $item->item_total() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center" colspan="4">Your cart is empty</th>
                            </tr>
                        @endforelse
                        <tr>
                            <th scope="row">Total</th>
                            <td class="text-right font-weight-bold" colspan="3" id="total"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            var sum = 0;
            $('.item_total').each(function(){
                sum += parseFloat($(this).text());
            })
            $('#total').text('$'+sum);
        });
    
    </script>
@endsection