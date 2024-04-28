@extends('frontend.web._layouts.main',['header' => false])
@push('title', $tourGuide->user->fname.' '.$tourGuide->user->lname.' Detail')

@push('css')
<style>
    .theme-social > .btn-message{
        width: 95px!important;
        border-radius: 20px!important;
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
                                <h1 class="bd-breadcrumb-title">{{ $tourGuide->user->fname }} {{ $tourGuide->user->lname }} Detail</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                    <span>Tour Guide Detail</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- team-details area start -->
    <section class="bd-team-details-area section-space position-relative">
        <div class="container">
            <div class="row justify-content-between gy-24">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <div class="team-details-thumb sidebar-sticky">
                        <img src="{{asset($tourGuide->user->getAvatar())}}" alt="profile-img">
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                    <div class="team-single-wrapper">
                        <div class="team-contents mb-30">
                            <div class="team-heading mb-15">
                                <h2 class="team-single-title">{{ $tourGuide->user->fname }} {{ $tourGuide->user->lname }} ({{ $tourGuide->nickname }})</h2>
                                <h6 class="designation theme-text">Tour Guide</h6>
                            </div>
                            {!! $tourGuide->intro !!}
                            <div class="team-info mb-20">
                                <h4 class="mb-15">Information:</h4>
                                <ul>
                                    <li><span class="team-label">Phone : </span><a
                                            href="tel:{{ $tourGuide->user->contact_number }}">{{ $tourGuide->user->contact_number }}</a></li>
                                    <!-- <li><span class="team-label">Website : </span><a href="#">www.tourigo.com</a> -->
                                    <!-- </li> -->
                                    <li><span class="team-label">Email : </span><a href="mailto:{{ $tourGuide->user->email }}"><span class="__cf_email__" data-cfemail="a6d5d3d6d6c9d4d2e6d2c9d3d4cfc1c988c5c9cb">{{ $tourGuide->user->email }}</span></a></li>
                                    <!-- <li><span class="team-label">Address : </span><a href="#">1426 California,
                                            USA</a></li> -->
                                </ul>
                            </div>
                            <div class="theme-social">
                                @if(auth()->check() AND auth()->user()->type == 'tourist')
                                <a href="{{ route('messages.create', $tourGuide->user->id) }}" class="btn-message">Message</a>
                                @endif
                                <a href="#"><i class="icon-facebook"></i></a>
                                <a href="#"><i class="icon-twitter-x"></i></a>
                                <a href="#"><i class="icon-linkedin"></i></a>
                                <a href="#"><i class="icon-youtube"></i></a>
                            </div>
                        </div>
                        <!-- <div class="team-single-skills">
                            <h4 class="mb-15">Professional Skills</h4>
                            <ul>
                                <li>Exceptional storytelling abilities</li>
                                <li>In-depth knowledge of historical and cultural landmarks</li>
                                <li>Strong communication and interpersonal skills</li>
                                <li>Ability to adapt to diverse group dynamics</li>
                                <li>Skilled in managing logistics and ensuring tour safety</li>
                            </ul>
                            <div class="team-progress-bar">
                                <div class="team-progress">
                                    <div class="team-progress-wrapper">
                                        <div class="team-progress-head">
                                            <span class="team-progress-title">Communication Skills</span>
                                            <span class="team-progress-percentage"><span
                                                    data-purecounter-duration=".7" data-purecounter-end="85"
                                                    class="purecounter">0</span>%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" role="progressbar"
                                                style="width: 85%" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="team-progress-wrapper">
                                        <div class="team-progress-head">
                                            <span class="team-progress-title">Success Ratio</span>
                                            <span class="team-progress-percentage"><span
                                                    data-purecounter-duration=".7" data-purecounter-end="75"
                                                    class="purecounter">0</span>%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" role="progressbar"
                                                style="width: 75%" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="team-progress-wrapper">
                                        <div class="team-progress-head">
                                            <span class="team-progress-title">Client Happiness</span>
                                            <span class="team-progress-percentage"><span
                                                    data-purecounter-duration=".7" data-purecounter-end="95"
                                                    class="purecounter">0</span>%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" role="progressbar"
                                                style="width: 95%" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-details area end -->

    <!-- team area start -->
    <!-- <section class="bd-team-area section-space-bottom">
        <div class="container">
            <div class="row gy-24 align-items-center justify-content-between section-title-space">
                <div class="col-xl-6 col-md-8 col-sm-9">
                    <div class="section-title-wrapper">
                        <span class="section-subtitle mb-10">Featured</span>
                        <h2 class="section-title">Tour Guides</h2>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-3">
                    <div
                        class="team-navigation btn-navigation p-relative style-three d-flex justify-content-md-end">
                        <button class="tourigo-navigation-prev"><i class="fa-regular fa-angle-left"></i></button>
                        <button class="tourigo-navigation-next"><i class="fa-regular fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="swiper team-activation">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="team-wrapper team-style-two">
                            <div class="team-content-wrap position-relative">
                                <div class="team-thumb-wrap">
                                    <div class="team-thumb image-overly radius-8">
                                        <a href="team-details.html"><img src="{{asset('web/assets/images/team/team-img-1.png')}}"
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
                                    <h6 class="team-member-name b3 underline"><a href="team-details.html">Brendan
                                            Fraser</a></h6>
                                    <span>Tour Guide</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-wrapper team-style-two">
                            <div class="team-content-wrap position-relative">
                                <div class="team-thumb-wrap">
                                    <div class="team-thumb image-overly radius-8">
                                        <a href="team-details.html"><img src="{{asset('web/assets/images/team/team-img-2.png')}}"
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
                                    <h6 class="team-member-name b3 underline"><a href="team-details.html">Jude
                                            Bellingham</a></h6>
                                    <span>Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-wrapper team-style-two">
                            <div class="team-content-wrap position-relative">
                                <div class="team-thumb-wrap">
                                    <div class="team-thumb image-overly radius-8">
                                        <a href="team-details.html"><img src="{{asset('web/assets/images/team/team-img-3.png')}}"
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
                                    <h6 class="team-member-name b3 underline"><a href="team-details.html">Sophia
                                            Miller</a></h6>
                                    <span>Marking Head</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-wrapper team-style-two">
                            <div class="team-content-wrap position-relative">
                                <div class="team-thumb-wrap">
                                    <div class="team-thumb image-overly radius-8">
                                        <a href="team-details.html"><img src="{{asset('web/assets/images/team/team-img-4.png')}}"
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
                                    <h6 class="team-member-name b3 underline"><a href="team-details.html">Rodrygo
                                            Silva</a></h6>
                                    <span>Financial Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-wrapper team-style-two">
                            <div class="team-content-wrap position-relative">
                                <div class="team-thumb-wrap">
                                    <div class="team-thumb image-overly radius-8">
                                        <a href="team-details.html"><img src="{{asset('web/assets/images/team/team-img-9.png')}}"
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
                                    <h6 class="team-member-name b3 underline"><a href="team-details.html">Ivana
                                            Andrés</a></h6>
                                    <span>Tour Guide</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- team area end -->

</main>
<!-- Body main wrapper end -->
@endpush