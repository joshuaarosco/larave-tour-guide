<!-- team area start -->
<section class="bd-team-area section-space flash-white">
    <div class="container">
        <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-xl-6 col-md-8 col-sm-7">
                <div class="section-title-wrapper anim-wrapper animation-style-3">
                    <span class="section-subtitle mb-10">Featured</span>
                    <h2 class="section-title title-animation"><a href="{{ route('tour_guide.index') }}">Tour Guides</a></h2>
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
                                    <a href="{{ route('tour_guide.detail', $tourGuide->id) }}"><img src="{{asset($tourGuide->user->getAvatar())}}" alt="tour-guide-img-{{$index}}"></a>
                                </div>
                                <div class="theme-social team-social has-white-bg">
                                    <a class="icon-1" target="_blank" href="https://www.facebook.com/"><i class="icon-facebook"></i></a>
                                    <a class="icon-2" target="_blank" href="https://twitter.com/"><i class="icon-twitter-x"></i></a>
                                    <a class="icon-3" target="_blank" href="https://www.instagram.com/"><i class="icon-instagram"></i></a>
                                    <a class="icon-4" target="_blank" href="https://bd.linkedin.com/"><i class="icon-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="team-content">
                                <h6 class="team-member-name b3 underline"><a href="{{ route('tour_guide.detail', $tourGuide->id) }}">{{ $tourGuide->user->fname }} {{ $tourGuide->user->lname }}</a></h6>
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
<!-- team area end -->