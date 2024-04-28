@extends('frontend.web._layouts.main',['header' => false])

@push('title', 'Destinations')

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
                                <h1 class="bd-breadcrumb-title">Destinations</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                    <span>Destinations</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- blog-grid area start -->
    <div class="bd-blog-grid-area section-space">
        <div class="container">
            <div class="row gy-24">
                @foreach($destinations as $index => $destination)
                <div class="col-xl-3 col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
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
    </div>
    <!-- blog-grid area end -->

</main>
<!-- Body main wrapper end -->
@endpush