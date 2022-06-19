<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="icon" href="assets/images/favicon.ico">
    <title>AZ TECH | Owner Module</title>
    <!-- CSS files -->
    <link href="{{ asset('tabler/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/demo.min.css') }}" rel="stylesheet"/>
  </head>
  <body >
    <div class="wrapper">
      @include('seller.partials.nav')

      @yield('content')

      @include('seller.partials.footer')
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('tabler/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('tabler/js/tabler.min.js') }}"></script>
    <script src="{{ asset('tabler/js/demo.min.js') }}"></script>
  </body>
</html>