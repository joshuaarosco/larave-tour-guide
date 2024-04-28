<!-- Footer area start -->
<footer class="bd-footer-area footer-bg image-bg fix">
    <div class="footer-shape">
        <div class="footer-shape-three">
            <img src="{{asset('web/assets/images/shapes/palm-tree-group.png')}}" alt="">
        </div>
        <div class="footer-shape-four">
            <img src="{{asset('web/assets/images/shapes/palm-tree-group-2.png')}}" alt="">
        </div>
    </div>
    <div class="section-space">
        <div class="container">
            <div class="row gy-24">
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div class="footer-widget footer-2-col-1">
                        <div class="footer-widget-logo mb-40">
                            <a href="{{ route('index') }}">
                                <h5 class="footer-widget-title">{{ config('app.name') }}</h5>
                                <!-- <img src="{{asset('web/assets/images/logo/logo-black.svg')}}" alt="logo not found"> -->
                            </a>
                        </div>
                        <div class="footer-widget-content">
                            <p>Welcome to {{ config('app.name') }}, your gateway to unforgettable adventures and immersive travel
                                experiences. Explore with us and let your journey begin!</p>
                            <div class="d-flex flex-wrap align-items-center gap--5">
                                <span class="b6">Follow Us:</span>
                                <div class="theme-social">
                                    <a href="#"><i class="icon-facebook"></i></a>
                                    <a href="#"><i class="icon-twitter-x"></i></a>
                                    <a href="#"><i class="icon-linkedin"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div class="footer-widget footer-2-col-3">
                        <h5 class="footer-widget-title">Service</h5>
                        <div class="footer-widget-links">
                            <ul>
                                <li class="underline"><a href="{{ route('destination.index') }}">Tourist Spot Destinations</a></li>
                                <li class="underline"><a href="{{ route('tour.index') }}">Tour Listing</a></li>
                                <li class="underline"><a href="{{ route('tour_guide.index') }}">Tour Guides</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-widget footer-2-col-4">
                        <h5 class="footer-widget-title  mb-15">Mobile Apps</h5>
                        <div class="footer-btn mb-35 pt-5">
                            <div class="googple-play-btn mb-15">
                                <a href="https://codecanyon.net/item/eduman-react-native-android-ios-education-template/48934019?s_rank=3"
                                    target="_blank" class="app-btn">
                                    <div class="app-thumb">
                                        <img src="{{asset('web/assets/images/app/google-store-icon.png')}}" alt="app">
                                    </div>
                                    <div class="content">
                                        <span>get it on</span>
                                        <h6>Google Play</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="apple-app-btn mb-15">
                                <a href="https://codecanyon.net/item/eduman-react-native-android-ios-education-template/48934019?s_rank=3"
                                    target="_blank" class="app-btn">
                                    <div class="app-thumb">
                                        <img src="{{asset('web/assets/images/app/app-store-icon.png')}}" alt="app">
                                    </div>
                                    <div class="content">
                                        <span>Download on the</span>
                                        <h6>App Store</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="footer-call-wrap d-flex align-items-center gap-15">
                            <div class="footer-call-icon">
                                <i class="icon-support"></i>
                            </div>
                            <div class="footer-call-content position-relative z-index-5">
                                <h6 class="footer-call-title">Speak our expert at:</h6>
                                <a class="footer-call-number b3" href="tel:+18004536744">1-800-453-6744</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row gy-24 align-items-center justify-content-between align-content-end">
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="footer-copyright underline">
                        <p>Copyright @ 2024 <a href="https://themeforest.net/user/bdevs" target="_blank">{{ config('app.name') }}</a>
                            . All
                            Right Reserved</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-5 col-md-6 col-12">
                    <div class="footer-card">
                        <ul>
                            <!-- <li><img src="{{asset('web/assets/images/icons/visa.png')}}" alt="card"></li>
                            <li><img src="{{asset('web/assets/images/icons/master.png')}}" alt="card"></li>
                            <li><img src="{{asset('web/assets/images/icons/apple-pay.png')}}" alt="card"></li>
                            <li><img src="{{asset('web/assets/images/icons/paypal.png')}}" alt="card"></li>
                            <li><img src="{{asset('web/assets/images/icons/amex.png')}}" alt="card"></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!-- Footer area end -->