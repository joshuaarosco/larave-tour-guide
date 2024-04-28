@extends('frontend.web._layouts.main',['header' => false])
@push('title', 'Tours')

@push('css')
<style>
    ul{
        margin-left: 15px;
    }
</style>
@endpush

@push('content')
<!-- Body main wrapper start -->
<main>
    <!-- breadcrumb area start -->
    <section
        class="bd-breadcrumb-banner-area breadcrumb-banner-bg d-flex align-items-center p-relative image-bg fix"
        data-background="{{asset('web/assets/images/bg/breadcrumb-banner-1.png')}}">
        <div class="container">
                <div class="row align-items-center justify-content-center align-content-center m-auto">
                    <div class="col-xxl-8 col-xl-10 col-lg-12">
                        <div class="breadcrumb-banner-content position-relative z-3">
                            <h1 class="white-text text-center">Find Your Dream Tour</h1>
                            <div class="bd-breadcrumb-list">
                                <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                <span>Tour List</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- tour-grid area start -->
    <section class="bd-tour-grid-area section-space fix">
        <div class="container">
            <div class="row gy-24">
                @foreach($tours as $index => $tour)
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                    <div class="tour-wrapper style-one">
                        <div class="p-relative">
                            <div class="tour-thumb image-overly">
                                <a href="{{ route('tour.detail', $tour->id) }}"><img src="{{asset($tour->thumbnail())}}"
                                        alt="image"></a>
                            </div>
                            <div class="tour-meta d-flex align-items-center justify-content-between">
                                <button class="tour-favorite tour-like">
                                    <i class="icon-heart"></i>
                                </button>
                                <div class="tour-location">
                                    <span><a href="{{ route('tour.detail', $tour->id) }}"><i class="fa-regular fa-location-dot"></i> {{ $tour->destination->name }}</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="tour-content">
                            <div class="tour-rating d-flex align-items-center gap-10 mb-10">
                                <div class="tour-rating-icon fs-14 d-flex rating-color">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="tour-rating-text">
                                    <span>4.8 (320 Ratings)</span>
                                </div>
                            </div>
                            <h5 class="tour-title fw-5 underline mb-5" style="height: 60px;"><a href="{{ route('tour.detail', $tour->id) }}">{{ str_limit($tour->name, 35) }}</a></h5>
                            <span class="tour-price b3">₱ {{ number_format($tour->price, 2) }}</span>
                            <div class="tour-divider"></div>

                            <div class="tour-meta d-flex align-items-center justify-content-between">
                                <div class="time d-flex align-items-center gap--5">
                                    <!-- <i class="icon-heart"></i>
                                    <span>4 days</span> -->
                                </div>
                                <div class="tour-btn">
                                    <a class="bd-text-btn style-two" href="{{ route('tour.book', $tour->id) }}">Book Now
                                        <span class="icon__box">
                                            <i class="fa-regular fa-arrow-right-long icon__first"></i>
                                            <i class="fa-regular fa-arrow-right-long icon__second"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- <div class="pagination-wrapper d-flex justify-content-center">
                <div class="basic-pagination">
                    <nav>
                        <ul>
                            <li>
                                <a class="current">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-light fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> -->
        </div>
    </section>
    <!-- tour-grid area end -->

    <!-- cta area start -->
    <!-- <section class="bd-cta-area section-space-small cta-image-bg image-bg p-relative fix"
        data-background="{{asset('web/assets/images/cta/cta-img-3.png')}}">
        <div class="container">
            <div class="cta-three-shape">
                <div class="cta-three-shape-one p-absolute">
                    <img src="{{asset('web/assets/images/shapes/cta-star.png')}}" alt="shape">
                </div>
                <div class="cta-three-shape-two p-absolute">
                    <img src="{{asset('web/assets/images/shapes/cta-eye.png')}}" alt="shape">
                </div>
                <div class="cta-three-shape-three p-absolute">
                    <img src="{{asset('web/assets/images/shapes/cta-x.png')}}" alt="shape">
                </div>
                <div class="cta-three-shape-four p-absolute">
                    <img src="{{asset('web/assets/images/shapes/cta-star.png')}}" alt="shape">
                </div>
                <div class="cta-three-shape-five p-absolute">
                    <img src="{{asset('web/assets/images/shapes/cta-eye.png')}}" alt="shape">
                </div>
                <div class="cta-three-shape-six p-absolute">
                    <img src="{{asset('web/assets/images/shapes/cta-x.png')}}" alt="shape">
                </div>
                <div class="cta-three-shape-seven p-absolute">
                    <img src="{{asset('web/assets/images/shapes/cta-line.png')}}" alt="shape">
                </div>
                <div class="cta-three-shape-eight p-absolute">
                    <img src="{{asset('web/assets/images/shapes/plane-6.png')}}" alt="shape">
                </div>
            </div>
            <div class="row gy-24 align-items-center justify-content-center">
                <div class="col-xl-6 col-md-8">
                    <div
                        class="cta-content-wrapper cta-style-three text-center position-relative z-index-5 anim-wrapper animation-style-3">
                        <span class="section-subtitle color-warning mb-15">Find New Places To Visit</span>
                        <h2 class="section-title white-text mb-20 title-animation">Explore New Places</h2>
                        <p>Share the core values and principles that drive your company. <br> Emphasize a commitment
                            to custome.
                        </p>
                        <div class="cta-btn">
                            <a href="booking.html"
                                class="bd-primary-btn btn-style has-arrow is-bg btn-tertiary is-white radius-60">
                                <span class="bd-primary-btn-arrow arrow-right"><i
                                        class="fa-regular fa-arrow-right"></i></span>
                                <span class="bd-primary-btn-text">Explore Now</span>
                                <span class="bd-primary-btn-circle"></span>
                                <span class="bd-primary-btn-arrow arrow-left"><i
                                        class="fa-regular fa-arrow-right"></i></span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- cta area end -->
</main>
<!-- Body main wrapper end -->
@endpush