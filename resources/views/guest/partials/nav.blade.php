<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html"><h2>AZ <em>Tech</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('welcome') }}">Home
                            @if (Route::currentRouteName() == 'welcome')
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li> 
                    <li class="nav-item dropdown {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('products.all') }}">All</a>
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="{{ route('products.index', $category->id) }}">{{ $category->category }}</a>
                            @endforeach
                        </div>
                        @if (Route::currentRouteName() == 'products.index')
                                <span class="sr-only">(current)</span>
                        @endif
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Cart<x-cart-items/></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>