@extends('frontend.web._layouts.main',['header' => false])

@push('title', $destination->name)

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
        <section class="bd-breadcrumb-area p-relative fix">
            <!-- breadcrumb background image -->
            <div class="bd-breadcrumb-bg" data-background="{{asset('web/assets/images/bg/breadcrumb-banner-1.png')}}"></div>
            <div class="bd-breadcrumb-wrapper p-relative">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="bd-breadcrumb d-flex align-items-center justify-content-center">
                                <div class="bd-breadcrumb-content text-center">
                                    <h1 class="bd-breadcrumb-title">{{ $destination->name }}</h1>
                                    <div class="bd-breadcrumb-list">
                                        <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                        <span>Destination Details</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- destinations-details area start -->
        <section class="bd-destinations-details-area section-space pb-0">
            <div class="container">
                <div class="row gy-24">
                    <div class="col-xxl-8 col-xl-8 col-lg-7">
                        <div class="destinations-details-wrapper">
                            <div class="destinations-details mb-25">
                                <div class="destinations-details-slider details-slide p-relative mb-30">
                                    <div class="swiper details-slide-activation">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="{{asset($destination->thumbnail())}}" alt="image">
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
                                <div class="destinations-details-content">
                                    <h3 class="destinations-details-title mb-15">{{ $destination->name }}</h3>
                                    {!! $destination->details !!}
                                </div>
                            </div>
                            <!-- <div class="tour-details-rating-wrapper">
                                <div class="rewiew-content">
                                    <div class="tour-review-wrapper">
                                        <div class="media">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{asset('web/assets/images/client/05.png')}}" alt="Author Images">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="author-info">
                                                    <h5 class="title">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            Mason Rodriguez
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa-solid fa-thumbs-up"></i>
                                                        </a>
                                                    </h5>
                                                    <ul class="bd-meta">
                                                        <li class="has-seperator">On: <span>Aug 11, 2023</span></li>
                                                        <li>
                                                            <div class="rating">
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <p class="description">Lorem ipsum dolor sit amet consectetur
                                                        adipiscing elit Ut
                                                        massa mi. Aliquam in hendrerit urna. Pellentesque.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tour-review-wrapper">
                                        <div class="media">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{asset('web/assets/images/client/01.png')}}" alt="Author Images">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="author-info">
                                                    <h5 class="title">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            Madison Turner
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa-solid fa-thumbs-up"></i>
                                                        </a>
                                                    </h5>
                                                    <ul class="bd-meta">
                                                        <li class="has-seperator">On: <span>Aug 11, 2023</span></li>
                                                        <li>
                                                            <div class="rating">
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <p class="description">Lorem ipsum dolor sit amet consectetur
                                                        adipiscing elit Ut
                                                        massa mi. Aliquam in hendrerit urna. Pellentesque.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tour-review-wrapper">
                                        <div class="media">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{asset('web/assets/images/client/03.png')}}" alt="Author Images">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="author-info">
                                                    <h5 class="title">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            Ethan Mitchell
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa-solid fa-thumbs-up"></i>
                                                        </a>
                                                    </h5>
                                                    <ul class="bd-meta">
                                                        <li class="has-seperator">On: <span>Aug 11, 2023</span></li>
                                                        <li>
                                                            <div class="rating">
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <p class="description">Lorem ipsum dolor sit amet consectetur
                                                        adipiscing elit Ut
                                                        massa mi. Aliquam in hendrerit urna. Pellentesque.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comment-form">
                                <div class="post-comments-title">
                                    <h4 class="mb-15">Leave a Comment</h4>
                                    <span class="d-block mb-25">Your email address will not be published. Required
                                        fields are
                                        marked *</span>
                                </div>
                                <form>
                                    <div class="row gy-24">
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <textarea cols="30" rows="10"
                                                    placeholder="Type Comment here"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="submit-btn">
                                                <button type="submit"
                                                    class="bd-primary-btn btn-style has-arrow is-bg radius-60">
                                                    <span class="bd-primary-btn-arrow arrow-right"><i
                                                            class="fa-regular fa-arrow-right"></i></span>
                                                    <span class="bd-primary-btn-text">Post Comment</span>
                                                    <span class="bd-primary-btn-circle"></span>
                                                    <span class="bd-primary-btn-arrow arrow-left"><i
                                                            class="fa-regular fa-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-5">
                        @include('frontend.web._components.sidebar')
                    </div>
                </div>
            </div>
        </section>
        <section class="bd-team-area flash-white section-space">
            <div class="container">
                <div class="row gy-24 align-items-center justify-content-between section-title-space">
                    <div class="col-xl-6 col-md-8 col-sm-7">
                        <div class="section-title-wrapper anim-wrapper animation-style-3">
                            <span class="section-subtitle mb-10">{{$destination->name}}</span>
                            <h2 class="section-title title-animation"><a href="{{ route('tour_guide.index') }}"> Tour Guides</a></h2>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-5">
                        <div class="team-navigation btn-navigation p-relative style-three team-text-end">
                            <button class="tourigo-navigation-prev"><i class="fa-regular fa-angle-left"></i></button>
                            <button class="tourigo-navigation-next"><i class="fa-regular fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="swiper team-activation">
                    <div class="swiper-wrapper">
                        @forelse($tourGuides as $index => $tourGuide)
                        <div class="swiper-slide">
                            <div class="team-wrapper team-style-two">
                                <div class="team-content-wrap position-relative">
                                    <div class="team-thumb-wrap">
                                        <div class="team-thumb image-overly radius-8">
                                            <a href="{{ route('tour_guide.detail', $tourGuide->tourGuide->id) }}"><img src="{{asset($tourGuide->getAvatar())}}" alt="tour-guide-img-{{$index}}"></a>
                                        </div>
                                        <div class="theme-social team-social has-white-bg">
                                            <a class="icon-1" target="_blank" href="https://www.facebook.com/"><i class="icon-facebook"></i></a>
                                            <a class="icon-2" target="_blank" href="https://twitter.com/"><i class="icon-twitter-x"></i></a>
                                            <a class="icon-3" target="_blank" href="https://www.instagram.com/"><i class="icon-instagram"></i></a>
                                            <a class="icon-4" target="_blank" href="https://bd.linkedin.com/"><i class="icon-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-content">
                                        <h6 class="team-member-name b3 underline"><a href="{{ route('tour_guide.detail', $tourGuide->tourGuide->id) }}">{{ $tourGuide->fname }} {{ $tourGuide->lname }}</a></h6>
                                        <span>{{ $tourGuide->nickname }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12 text-center">
                            <h3>~ NO FEATURED TOUR GUIDE ~</h3>
                            <a href="{{ route('tour_guide.index') }}" class="mt-20">View Tour Guides</a>
                        </div>
                        @endforelse
                    </div>
                    <div class="slider-pagination-wrapper">
                        <div class="slider-pagination bd-pagination mt-50 justify-content-center"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- destinations-details area end -->

    </main>
    <!-- Body main wrapper end -->
@endpush