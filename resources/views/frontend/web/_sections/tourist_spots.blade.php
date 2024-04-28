<section class="bd-activity-area section-space flash-white">
    <div class="container">
        <div class="row gy-24 align-items-center justify-content-between section-title-space">
            <div class="col-xl-10 col-lg-9 col-md-9 col-sm-8">
                <div class="section-title-wrapper anim-wrapper animation-style-3">
                    <span class="section-subtitle mb-10">Tourist Spot</span>
                    <h2 class="section-title title-animation" style="perspective: 400px;">
                    Destinations
                    </h2>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4">
                <div class="bd-activity-btn text-sm-end">
                    <a href="{{ route('destination.index') }}" class="bd-primary-btn btn-style has-arrow radius-60">
                        <span class="bd-primary-btn-arrow arrow-right"><i class="fa-regular fa-arrow-right"></i></span>
                        <span class="bd-primary-btn-text">See All</span>
                        <span class="bd-primary-btn-circle"></span>
                        <span class="bd-primary-btn-arrow arrow-left"><i class="fa-regular fa-arrow-right"></i></span>
                    </a>

                </div>
            </div>
        </div>
        <div class="row gy-24">
            @foreach($destinations as $index => $destination)
            <div class="col-lg-3 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                <div class="activity-wrapper activity-style">
                    <div class="activity-thumb image-overly">
                        <a href="{{ route('destination.detail', $destination->id) }}"><img src="{{asset($destination->thumbnail())}}" alt="image"></a>
                    </div>
                    <!-- <div class="activity-meta">
                        <span><i class="icon-star"></i> 4.4</span>
                    </div> -->
                    <div class="activity-content-wrap">
                        <div class="activity-content d-flex align-items-center justify-content-between">
                            <div class="activity-title-wrap">
                                <h5 class="underline"><a href="{{ route('destination.detail', $destination->id) }}">{{ $destination->name }}</a>
                                </h5>
                                <p>{{ $destination->tours->count() }} {{ str_plural('Tour', $destination->tours->count()) }}</p>
                            </div>
                            <div class="activity-btn">
                                <a class="bd-icon-btn" href="{{ route('destination.detail', $destination->id) }}"><i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>