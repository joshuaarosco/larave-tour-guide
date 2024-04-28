<!-- tour area start -->
<section class="bd-service-area section-space">
    <div class="container">
        <div class="row gy-24 align-items-center justify-content-center section-title-space">
            <div class="col-lg-6 col-md-8">
                <div class="section-title-wrapper text-center anim-wrapper animation-style-3">
                    <span class="section-subtitle mb-10">Our Trips</span>
                    <h2 class="section-title title-animation">Tour Packages</h2>
                </div>
            </div>
        </div>
        <div class="row gy-24">
            @foreach($tours as $index => $tour)
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                <div class="tour-wrapper style-one">
                    <div class="p-relative">
                        <div class="tour-thumb image-overly">
                            <a href="{{ route('tour.detail', $tour->id) }}"><img src="{{asset($tour->thumbnail())}}"
                                    alt="{{ $tour->name }} thumbnail"></a>
                        </div>
                        <div class="tour-meta d-flex align-items-center justify-content-between">
                            <button class="tour-favorite tour-like">
                                <i class="icon-heart"></i>
                            </button>
                            <div class="tour-location">
                                <span>
                                    <a href="{{ route('tour.detail', $tour->id) }}">
                                        <i class="fa-regular fa-location-dot"></i>
                                        {{ $tour->destination->name }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="tour-content bg-white">
                        <div class="tour-rating d-flex flex-wrap align-items-center gap-10 mb-10">
                            <div class="tour-rating-icon fs-14 d-flex rating-color">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="tour-rating-text">
                                <span>4.8 (313 Ratings)</span>
                            </div>
                        </div>
                        <h5 class="tour-title fw-5 underline mb-5" style="height: 60px;">
                            <a href="{{ route('tour.detail', $tour->id) }}">{{ str_limit($tour->name, 35) }}
                            </a>
                        </h5>
                        <span class="tour-price b3">₱ {{ number_format($tour->price, 2) }}</span>
                        <div class="tour-divider"></div>

                        <div class="tour-meta d-flex align-items-center justify-content-between">
                            <div class="time d-flex align-items-center gap--5">
                                <!-- <i class="icon-heart"></i>
                                <span>4 days</span> -->
                            </div>
                            <div class="tour-btn">
                                <a class="bd-text-btn style-two" href="booking.html">Book Now
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
    </div>
</section>
<!-- tour area end -->