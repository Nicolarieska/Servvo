<!DOCTYPE html>
<html lang="en">

<head>
    <title>PT SERVVO FIRE INDONESIA</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="{{ asset('assets/css/home/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home/owl.carousel.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/home/style.css') }}">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <div class="preloader">

        <div class="sk-spinner sk-spinner-pulse"></div>

    </div>

    <!-- Header -->
    @include('home.layouts.header')

    <!-- Body -->
    @yield('content')

    <!-- Footer -->
    @include('home.layouts.footer')

    <script src="{{ asset('assets/js/home/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/home/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/home/jquery.parallax.js') }}"></script>
    <script src="{{ asset('assets/js/home/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/home/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('assets/js/home/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/home/smoothscroll.js') }}"></script>
    <script src="{{ asset('assets/js/home/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/home/custom.js') }}"></script>

</body>

</html>