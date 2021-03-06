<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        @yield("other")
    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
<link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="{{asset('/js/jquery.min.js')}}"></script>

</head>
<body>
    <div id="app">
  @component('components.nav')

  @endcomponent

        <main >
            @yield('body')
        </main>

@component('components.footer')

@endcomponent
    </div>

@livewireAssets
@include('sweetalert::alert')

<script src="{{ asset('js/app.js') }}" ></script>

</body>
</html>
