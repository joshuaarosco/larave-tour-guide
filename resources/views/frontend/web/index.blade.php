@extends('frontend.web._layouts.main',['header' => false])
@push('title', 'Home')
@push('content')
    @include('frontend.web._sections.banner')

    @include('frontend.web._sections.why_us')

    @include('frontend.web._sections.tourist_spots')

    <!-- section divider start -->
    <div class="section-divider"></div>
    <!-- section divider start -->

    @include('frontend.web._sections.tour')

    {{-- @include('frontend.web._sections.offer') --}}

    {{-- @include('frontend.web._sections.activities') --}}

    {{-- @include('frontend.web._sections.testimonials') --}}

    {{-- @include('frontend.web._sections.download') --}}

    {{-- @include('frontend.web._sections.blog') --}}

    @include('frontend.web._sections.tour_guides')

    {{-- @include('frontend.web._sections.sub') --}}
@endpush

@push('js')
@endpush

@push('css')
<style>
    .testimonial-space {
        padding-bottom: 0px; 
    }
</style>
@endpush
