<!-- Header area start -->
<header>
    <div class="header-area header-style-four" id="header-sticky">
        <div class="container">
            <div class="mega-menu-wrapper p-relative">
                <div class="header-main">
                    <div class="header-left">
                        <div class="header-logo">
                            <a href="{{ route('index') }}">
                                <strong>{{ config('app.name') }}</strong>
                                <!-- <img src="{{asset('web/assets/images/logo/logo-black.svg')}}" alt="logo not found"> -->
                            </a>
                        </div>
                        <div class="header-search mb-0">
                            <form action="#">
                                <input type="text" placeholder="Search Destinations">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="header-action d-flex align-items-center">
                            <div class="mean-menu-wrapper d-none d-xl-block">
                                <div class="main-menu">
                                    @include('frontend.web._components.nav')
                                </div>
                            </div>
                            <div class="header-hamburger ml-20">
                                <div class="sidebar-toggle">
                                    <a class="bar-icon style-two" href="javascript:void(0)">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                            <!-- for wp -->
                            <div class="header-hamburger ml-20 d-none">
                                <button type="button" class="hamburger-btn offcanvas-open-btn">
                                    <span>01</span>
                                    <span>01</span>
                                    <span>01</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->