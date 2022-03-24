<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book Exchange</title>

    <!-- Styles -->
    <link rel="icon" href="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-book-library-wanicon-lineal-color-wanicon-3.png">
    <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ URL::asset('js/sweetalert.min.js') }}" type="text/javascript"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
@include('menu')

    <div class="content">
        @yield('content')
    </div>

<div class="footer">
    <div class="fixed-bottom">
        <div class="footer_center">
            <h5> &copy;made by Olya Kyrylyuk</h5>
        </div>
    </div>
</div>


<!-- Scripts -->
<script type="text/javascript" src="{{asset('js/jQuery.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('JS')


</body>
</html>
