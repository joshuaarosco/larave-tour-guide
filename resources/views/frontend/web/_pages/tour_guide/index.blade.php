@extends('frontend.web._layouts.main',['header' => false])
@push('title', 'Tour Guides')
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
                                <h1 class="bd-breadcrumb-title">Tour Guides</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                    <span>Tour Guides</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- team-area area start -->
    <section class="bd-team-area section-space">
        <div class="container">
            <div class="row gy-24">
                @foreach($tourGuides as $index => $tourGuide)
                <div class="col-xxl-3 col-xl-3 col-lg-4">
                    <div class="team-wrapper team-style-two">
                        <div class="team-content-wrap position-relative">
                            <div class="team-thumb-wrap">
                                <div class="team-thumb image-overly radius-8">
                                    <a href="{{ route('tour_guide.detail', $tourGuide->id) }}"><img src="{{asset($tourGuide->user->getAvatar())}}"
                                            alt="image"></a>
                                </div>
                                <div class="theme-social team-social has-white-bg">
                                    <a class="icon-1" target="_blank" href="https://www.facebook.com/"><i
                                            class="icon-facebook"></i></a>
                                    <a class="icon-2" target="_blank" href="https://twitter.com/"><i
                                            class="icon-twitter-x"></i></a>
                                    <a class="icon-3" target="_blank" href="https://www.instagram.com/"><i
                                            class="icon-instagram"></i></a>
                                    <a class="icon-4" target="_blank" href="https://bd.linkedin.com/"><i
                                            class="icon-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="team-content">
                                <h6 class="team-member-name b3 underline"><a href="{{ route('tour_guide.detail', $tourGuide->id) }}">{{ $tourGuide->user->fname }} {{ $tourGuide->user->lname }}</a></h6>
                                <span>{{ $tourGuide->nickname }}</span>
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
    <!-- team-area area end -->

</main>
<!-- Body main wrapper end -->
@endpush