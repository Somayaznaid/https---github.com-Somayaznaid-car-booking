<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carbook</title>
    {{-- <link rel="icon" type="{{ asset('images/1689189813_64aefdb5e94bc') }}" href="path-to-your-favicon"/> --}}
    <link rel="icon" type="image/png" href="{{ asset('images/sport-car.png') }}"/>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">


    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">


    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">



</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('index') }}">Car<span>Book&Sale</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ url('index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{ url('services') }}" class="nav-link">Services</a></li>
                    {{-- <li class="nav-item"><a href="{{ url('pricing') }}" class="nav-link">Pricing</a></li> --}}
                    <li class="nav-item"><a href="{{ url('car') }}" class="nav-link">Cars</a></li>
                    {{-- <li class="nav-item"><a href="{{ url('blog') }}" class="nav-link">Blog</a></li> --}}
                    {{-- <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li> --}}

                    @if (Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a href="{{ url('login') }}" class="nav-link">Log in</a></li>

                        <li class="nav-item"><a href="sign_up" class="nav-link">Sign Up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
