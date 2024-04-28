<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@stack('title') || {{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('web/assets/images/favicon.svg')}}">
    <!-- CSS here -->
    @include('frontend.web._includes.styles')
    @stack('css')
</head>



<body>

    <!-- preloader start -->
    <div id="preloader">
        <div class="bd-three-bounce">
            <div class="bd-child bd-bounce1"></div>
            <div class="bd-child bd-bounce2"></div>
            <div class="bd-child bd-bounce3"></div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- Offcanvas area start -->
    <div class="fix">
        <div class="offcanvas-area">
            <div class="offcanvas-wrapper">
                <div class="offcanvas-content">
                    <div class="offcanvas-top d-flex justify-content-between align-items-center mb-25">
                        <div class="offcanvas-logo">
                            <a href="{{ route('index') }}">
                                <h4 class="offcanvas-title-meta">{{ config('app.name') }}</h4>
                                <!-- <img src="{{asset('web/assets/images/logo/logo-black.svg')}}" alt="logo not found"> -->
                            </a>
                        </div>
                        <div class="offcanvas-close">
                            <button class="offcanvas-close-icon animation--flip">
                                <span class="offcanvas-m-lines">
                                    <span class="offcanvas-m-line line--1"></span><span
                                        class="offcanvas-m-line line--2"></span><span
                                        class="offcanvas-m-line line--3"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="offcanvas-search mb-0">
                        <form action="#">
                            <input type="text" name="offcanvasSearch" placeholder="Search here">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu fix mb-25"></div>
                    <div class="offcanvas-about d-none d-lg-block mb-25">
                        <h4 class="offcanvas-title-meta">About {{ config('app.name') }}</h4>
                        <p>Explore stunning destinations and create immersive travel experiences that inspire wanderlust
                            and
                            captivate your audience from the start.</p>
                    </div>
                    <div class="offcanvas-contact mb-25">
                        <h4 class="offcanvas-title-meta">Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center gap-10">
                                <div class="offcanvas-contact-icon">
                                    <a target="_blank" href="#">
                                        <i class="fal fa-map-marker-alt"></i></a>
                                </div>
                                <div class="offcanvas-contact-text">
                                    <a target="_blank" href="#">Binmaley, Pangasinan, PH</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-10">
                                <div class="offcanvas-contact-icon">
                                    <a href="tel:+639-123-4567-89"><i class="far fa-phone"></i></a>
                                </div>
                                <div class="offcanvas-contact-text">
                                    <a href="tel:+639-123-4567-89">+639-123-4567-89</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-10">
                                <div class="offcanvas-contact-icon">
                                    <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#8ffcfaffffe0fdfbcffbe0fafde6e8e0a1ece0e2"><i class="fal fa-envelope"></i></a>
                                </div>
                                <div class="offcanvas-contact-text">
                                    <a href="https://html.bdevs.net/cdn-cgi/l/email-protection#d1a2a4a1a1bea3a591a5bea4a3b8b6beffb2bebc"><span class="__cf_email__" data-cfemail="661513161609141226120913140f01094805090b">[email&#160;protected]</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas-btn mb-25">
                        <h4 class="offcanvas-title-meta">Account</h4>
                        <div class="header-btn-wrap gap-10">
                            @if(!auth()->check())
                            <a class="bd-btn btn-style text-btn" href="{{ route('backoffice.auth.login') }}">Log In</a>
                            <a class="bd-btn btn-style text-btn" href="{{ route('backoffice.auth.sign_up') }}">Register</a>
                            @else
                            <a class="bd-btn btn-style text-btn" href="{{ route('booking.index') }}">Bookings</a>
                            <a class="bd-btn btn-style text-btn" href="{{ route('backoffice.logout') }}">Logout</a>
                            @endif
                        </div>
                    </div>
                    <div class="offcanvas-social">
                        <h4 class="offcanvas-title-meta">Subscribe & Follow</h4>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <div class="offcanvas-overlay-white"></div>
    <!-- Offcanvas area start -->

    @include('frontend.web._components.header')

    <!-- Body main wrapper start -->
    <main class="main-area fix">

    @stack('content')

    </main>
    <!-- Body main wrapper end -->

    @include('frontend.web._components.footer')

    @include('frontend.web._components.chat')
    <!-- back to top -->
    <!-- Backtotop start -->
    <div class="backtotop-wrap cursor-pointer">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->

    <!-- JS here -->
    @include('frontend.web._includes.scripts')
    @stack('json_decode')
</body>
</html>