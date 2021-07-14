<html lang="zxx">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FreshMart</title>

    <meta name="keywords" content="Organic, Fresh Food, Farm Store">
    <meta name="description" content="FreshMart - Organic, Fresh Food, Farm Store HTML Template">
    <meta name="author" content="tivatheme">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:300,400,700" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/font-material/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/nivo-slider/css/nivo-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/nivo-slider/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/nivo-slider/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/slider-range/css/jslider.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reponsive.css') }}">
</head>

<body class="home home-4">
<div class="container-fluid padding-0">
    <div id="all">
        <!-- Header -->
        <header id="header">
            <div class="container">
                <div class="header-top">
                    <div class="row align-items-center">
                        <!-- Header Left -->
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <!-- Main Menu -->
                            <div id="main-menu">
                                <ul class="menu d-flex justify-content-end">
                                    <li class="dropdown">
                                        <a href="{{ route('products.index') }}" title="Homepage">Home</a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="{{ route('products.products') }}" title="Product">Products</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Header Center -->
                        <div class="col-lg-2 col-md-2 col-sm-12 header-center justify-content-center">
                            <!-- Logo -->
                            <div class="logo" style="padding-top: 10px;">
                                <a href="{{ route('products.index') }}">
                                    <img class="img-responsive" src="{{ asset('img/logo.png') }}" alt="Logo">
                                </a>
                            </div>

                            <span id="toggle-mobile-menu"><i class="zmdi zmdi-menu"></i></span>
                        </div>


                        <!-- Header Right -->
                        <div
                            class="col-lg-5 col-md-5 col-sm-12 header-right d-flex justify-content-between align-items-center">
                            <!-- Search -->
                            <div class="form-search">
                                <form method="GET" action="{{ route('search') }}">
                                    <input type="text" name="name" class="form-input" placeholder="Search"
                                           autocomplete="on">
                                    <button type="submit" class="fa fa-search"></button>
                                </form>
                            </div>

                            <!-- Cart -->
                            <div class="block-cart dropdown">
                                <a href="{{ route('products.cart') }}">
                                    <div class="cart-title">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                        <span
                                            class="cart-count">{{ count((array) session('/product-cart')) }}</span>
                                    </div>
                                </a>
                            </div>


                            <!-- My Account -->
                            <div class="my-account dropdown toggle-icon">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="dropdown-menu">
                                    @guest
                                        @if (Route::has('login'))
                                            <div class="item">
                                                <a href="{{ route('login.login') }}"
                                                   title="Log in to your customer account"><i
                                                        class="fa fa-sign-in"></i>Login</a>
                                            </div>
                                        @endif
                                        @if (Route::has('register'))
                                            <div class="item">
                                                <a href="{{ route('register.index') }}" title="Register Account"><i
                                                        class="fa fa-user"></i>Register</a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="item">
                                            <a href="{{ route('users.showUserDetails') }}" title="My Wishlists"><i
                                                    class="fa fa-user"></i>{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="item">
                                            <a href="{{ route('wishlists.index') }}" title="My Wishlists"><i
                                                    class="fa fa-heart"></i>My Wishlists</a>
                                        </div>
                                        <div class="item">
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- Main Content -->
        <div id="content" class="site-content">
            <!-- Slideshow -->
            <div class="section slideshow">
                <div class="container">
                    <div class="tiva-slideshow-wrapper">
                        <div id="tiva-slideshow" class="nivoSlider">
                            <a href="#">
                                <img class="img-responsive" src="{{ asset('img/slideshow/home4-slideshow-1.jpg') }}"
                                     alt="Slideshow Image">
                            </a>
                            <a href="#">
                                <img class="img-responsive" src="{{ asset('img/slideshow/home4-slideshow-2.jpg') }}"
                                     alt="Slideshow Image">
                            </a>
                            <a href="#">
                                <img class="img-responsive" src="{{ asset('img/slideshow/home4-slideshow-3.jpg') }}"
                                     alt="Slideshow Image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Intro -->
    <div class="section intro">
        <div class="block-content">
            <div class="container">
                <div class="intro-wrap">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 top-left text-center">
                            <div class="intro-item">
                                <p><img src="{{ asset('img/intro-icon-1.png') }}" alt="Intro Image"></p>
                                <h4>Always Fresh</h4>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 top-right text-center">
                            <div class="intro-item">
                                <p><img src="{{ asset('img/intro-icon-2.png') }}" alt="Intro Image"></p>
                                <h4>100% Natural</h4>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 bottom-left text-center">
                            <div class="intro-item">
                                <p><img src="{{ asset('img/intro-icon-3.png') }}" alt="Intro Image"></p>
                                <h4>Super Healthy</h4>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 bottom-right text-center">
                            <div class="intro-item">
                                <p><img src="{{ asset('img/intro-icon-4.png') }}" alt="Intro Image"></p>
                                <h4>Premium Quality</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer id="footer">
        <div class="footer">
            <div class="container">
                <div class="footer-wrap">
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 footer-col">
                            <div class="block text">
                                <h2 class="block-title">Opening Hours</h2>

                                <div class="block-content">
                                    <p>
                                        <strong>Monday To Friday</strong> : 8.00 AM - 8.00 PM<br>
                                        <strong>Satuday</strong> : 7.30 AM - 9.30 PM<br>
                                        <strong>Sunday</strong> : 7.00 AM - 10.00 PM
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 footer-col">
                            <div class="block text">
                                <div class="block-content">
                                    <a href="{{ route('products.index') }}" class="logo-footer">
                                        <img src="{{ asset('img/logo-3.png') }}" alt="Logo">
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 footer-col">
                            <div class="block text">
                                <h2 class="block-title">Contact Us</h2>

                                <div class="block-content">
                                    <div class="contact">
                                        <p><strong>Address</strong> : 123 Suspendis matti, VST District, NY Accums,
                                            North
                                            American</p>
                                        <p><strong>Hotline</strong> : 012345678910 - 098765432100</p>
                                        <p><strong>Email</strong> : <a
                                                href="mailto:support@domain.com">support@domain.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>


    <!-- Go Up button -->
    <div class="go-up">
        <a href="#">
            <i class="fa fa-long-arrow-up" style="padding:10px;"></i>
        </a>
    </div>

    <!-- Page Loader -->
    <div id="page-preloader">
        <div class="page-loading">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('libs/jquery.countdown/jquery.countdown.js') }}"></script>
    <script src="{{ asset('libs/nivo-slider/js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('libs/slider-range/js/tmpl.js') }}"></script>
    <script src="{{ asset('libs/slider-range/js/jquery.dependClass-0.1.js') }}"></script>
    <script src="{{ asset('libs/slider-range/js/draggable-0.1.js') }}"></script>
    <script src="{{ asset('libs/slider-range/js/jquery.slider.js') }}"></script>
    <script src="{{ asset('libs/elevatezoom/jquery.elevatezoom.js') }}"></script>

    <!-- Template CSS -->
    <script src="{{ asset('js/products.js') }}"></script>

</div>

</body>
</html>
