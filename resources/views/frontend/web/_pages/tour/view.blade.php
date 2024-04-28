@extends('frontend.web._layouts.main',['header' => false])

@push('title', $tour->name)

@push('css')
<style>
    ul{
        margin-left: 15px;
    }
    .sidebar-widget-thumb::before{
        background-color: #006ce48f!important;
    }
</style>
@endpush

@push('content')
<!-- Body main wrapper start -->
<main>
    <!-- breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix">
        <!-- breadcrumb background image -->
        <div class="bd-breadcrumb-bg" data-background="{{asset('web/assets/images/bg/breadcrumb-banner-1.png')}}"></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                            <div class="bd-breadcrumb-content text-center">
                                <h1 class="bd-breadcrumb-title">{{ $tour->name }}</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                    <span>Tour Detail</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- blog-details area start -->
    <section class="bd-tour-details-area section-space">
        <div class="container">
            <div class="row gy-24">
                <div class="col-xxl-8 col-xl-8 col-lg-7">
                    <div class="tour-details-wrapper">
                        <div class="tour-details mb-25">
                            <div class="tour-details-slider details-slide p-relative mb-30">
                                <div class="swiper details-slide-activation">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{asset($tour->thumbnail())}}" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="details-slide-navigation btn-navigation">
                                    <button class="tourigo-navigation-prev"><i
                                            class="fa-regular fa-angle-left"></i></button>
                                    <button class="tourigo-navigation-next"><i
                                            class="fa-regular fa-angle-right"></i></button>
                                </div>
                            </div>
                            <div class="tour-details-content">
                                <!-- <div class="tour-details-badge d-flex gap--5 mb-10">
                                    <span class="bd-badge warning fw-5">Featured</span>
                                    <span class="bd-badge danger fw-5">15% Off</span>
                                </div> -->
                                <h3 class="tour-details-title mb-15">{{ $tour->name }}</h3>
                                <div
                                    class="tour-details-meta d-flex flex-wrap gap-10 align-items-center justify-content-between mb-20">
                                    <div class="tour-details-price">
                                        <h4 class="price-title">₱ {{ number_format($tour->price ,2) }}</h4>
                                    </div>
                                    <div
                                        class="tour-details-meta-right d-flex flex-wrap gap-10 align-items-center justify-content-between">
                                        <div class="rating-badge border-badge"><span><i
                                                    class="icon-star"></i>4.4</span></div>
                                        <div class="theme-social">
                                            <a href="#"><i class="icon-facebook"></i></a>
                                            <a href="#"><i class="icon-twitter-x"></i></a>
                                            <a href="#"><i class="icon-linkedin"></i></a>
                                            <a href="#"><i class="icon-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tour-details-destination-wrapper">
                                    <div class="row">
                                        <div class="col-md-12 p-10">
                                        {!! $tour->details !!}
                                        <br>
                                        <br>
                                        {!! $tour->activities !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="tour-details-gallery mb-35">
                                    <h4 class="mb-20">Tour Galley</h4>
                                    <div class="row gy-24">
                                        @foreach($tour->gallery as $index => $pic)
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                            <div
                                                class="tour-details-gallery-thumb image-hover-effect-two position-relative">
                                                <img src="{{asset($pic->thumbnail())}}" alt="image-{{$index}}">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5">
                    @include('frontend.web._components.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details area end -->

</main>
<!-- Body main wrapper end -->
@endpush