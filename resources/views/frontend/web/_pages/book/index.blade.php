@extends('frontend.web._layouts.main',['header' => false])

@push('title', 'Booking List')

@push('css')
<style>
</style>
@endpush

@push('content')
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
                                <h1 class="bd-breadcrumb-title">Booking List</i></h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                    <span>Booking List</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->
    <section class="bd-blog-area section-space">
        <div class="container">
            <div class="row gy-24">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 col-sm-12">
                    <div class="blog-flex">
                        @forelse($bookings as $index => $booking)
                        <article class="blog-wrapper blog-default blog-style-two">
                            <div class="blog-thumb image-hover-effect">
                                <a href="{{ route('tour.detail', $booking->tour->id) }}"><img src="{{ asset($booking->tour->thumbnail()) }}" alt="img"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-tag">
                                    <span><a href="{{ route('destination.detail', $booking->tour->destination->id) }}">{{ $booking->tour->destination->name }}</a></span>
                                </div>
                                <div class="blog-meta-list">
                                    <div class="blog-meta-item">
                                        <span class="meta-icon">
                                            <i class="icon-person"></i>
                                        </span>
                                        <span class="meta-text">Tour Guide:  <a class="meta-author" href="{{ route('tour_guide.detail', $booking->tour->user->tourGuide->id) }}">{{ $booking->tour->user->fname }} {{ $booking->tour->user->lname }}</a></span>
                                    </div>
                                    <div class="blog-meta-item">
                                        <span class="meta-icon">
                                            <i class="icon-cleander-check"></i>
                                        </span>
                                        <span class="meta-text"><a href="{{ route('booking.detail', $booking->id) }}">{{ date('M d, Y', strtotime($booking->date)) }}</a></span>
                                    </div>
                                </div>
                                <h5 class="blog-title mb-30 underline"><a href="{{ route('booking.detail', $booking->id) }}">{{ $booking->tour->name }}</a></h5>
                                <div class="blog-btn">
                                    <div class="icon-text-btn p-relative">
                                        <a href="{{ route('booking.detail', $booking->id) }}">
                                            <span>Booking Detail</span>
                                            <i>
                                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.2871 1L17 6.71285L11.2871 12.4257" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 6.71313H16.8397" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @empty
                        <div class="text-center mt-30 mb-40">
                            <h3>~ NO BOOKINGS YET~</h3>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
@endpush