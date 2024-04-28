@extends('frontend.web._layouts.main',['header' => false])
@push('title', $tour->name.' Booking')

@push('css')
<style>
    input[readonly] {
        background-color: #ededed;
    }
    input[type=date] {
        outline: none;
        background-color: transparent;
        height: 56px;
        width: 100%;
        font-size: 16px;
        border: none;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        -ms-border-radius: 4px;
        border-radius: 4px;
        border: 1px solid var(--bd-border-primary);
        padding: 0 24px;
        color: #1A1A1A;
    }
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
                                <h1 class="bd-breadcrumb-title">{{ $tour->name }} Booking</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="{{ route('index') }}"><i class="icon-home"></i>{{ config('app.name') }}</a></span>
                                    <span>Booking</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- booking-form area start -->
    <section class="bd-booking-form-area section-space">
        <div class="container">
            <div class="row gy-24 justify-content-between">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="booking-form">
                            <div class="booking-form-wrapper mb-35">
                                <!-- <div class="booking-form-step mb-10">Step 1 of 2</div> -->
                                <h4 class="booking-form-title mb-15">{{ $tour->name }}</h4>
                                <div class="booking-form-input-wrapper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="booking-form-input-box">
                                                <div class="booking-form-input-title">
                                                    <label for="firstName">First Name<span>*</span></label>
                                                </div>
                                                <div class="booking-form-input">
                                                    <input name="fname" id="firstName" type="text" required
                                                        placeholder="" value="{{ auth()->user()->fname }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="booking-form-input-box">
                                                <div class="booking-form-input-title">
                                                    <label for="nameLast">Last Name<span>*</span></label>
                                                </div>
                                                <div class="booking-form-input">
                                                    <input name="lname" id="nameLast" type="text" required
                                                        placeholder="" value="{{ auth()->user()->lname }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="booking-form-input-box">
                                        <div class="booking-form-input-title">
                                            <label for="email">Email address<span>*</span></label>
                                        </div>
                                        <div class="booking-form-input">
                                            <input name="email" id="email" type="email" autocomplete="email"
                                                required placeholder="Email address" value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="booking-form-input-box">
                                        <div class="booking-form-input-title">
                                            <label for="mobileNumber">Contact Number<span>*</span></label>
                                        </div>
                                        <div class="booking-form-input">
                                            <input name="contact_number" id="mobileNumber" type="text" required
                                                placeholder="Contact Number" value="{{ auth()->user()->contact_number }}">
                                        </div>
                                    </div>
                                    <div class="booking-form-input-box">
                                        <div class="booking-form-input-title">
                                            <label for="date">Preferred Date<span>*</span></label>
                                        </div>
                                        <div class="booking-form-input">
                                            <input name="date" id="date" type="date" required
                                                placeholder="Date" value="">
                                        </div>
                                    </div>
                                    <div class="booking-form-info mt-25">
                                        <h6 class="booking-form-info-tile mb-10">Additional details:</h6>
                                        <div class="booking-form-input-box">
                                            <div class="booking-form-input-title">
                                                <label for="text">Do you have special requirements?</label>
                                            </div>
                                            <div class="booking-form-input">
                                                <input id="text" name="additional" type="text" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="booking-form-policy mb-25">
                                    <h5 class="booking-form-title mb-15">Cancellation policy</h5>
                                    <p class="mb-10">"By clicking 'Book Tour' and finalizing your booking, you
                                        are
                                        agreeing to the <a class="theme-text" href="#">Terms and
                                            Conditions</a> set forth by {{ config('app.name') }} and the privacy policy of
                                        Viator. Take a
                                        moment to review our Privacy Statement to understand how we handle and
                                        protect your
                                        personal information throughout your booking journey and beyond."</p>
                                    <span><a class="theme-text" href="#">Privacy
                                            Statement</a></span>
                                </div>
                                <div class="booking-form-btn">
                                    <button type="submit" class="bd-primary-btn btn-style is-bg radius-60">
                                        <span class="bd-primary-btn-text">Book Tour</span>
                                        <span class="bd-primary-btn-circle"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <aside class="booking-sidebar-wrapper sidebar-sticky">
                        <div class="booking-sidebar-widget-wrapper mb-30">
                            <div class="booking-sidebar-widget-thumb mb-15">
                                <img src="{{ asset($tour->thumbnail()) }}" alt="images">
                            </div>
                            <div class="booking-sidebar-widget-content">
                                <h6 class="booking-item-title small underline mb-5">{{ $tour->name }}</h6>
                                <span class="booking-item-date">
                                    <a href="{{ route('tour.detail', $tour->id) }}"><span></span> View Tour Details</a> </span>
                            </div>
                        </div>
                        <div class="booking-sidebar-widget-wrapper">
                            <div class="booking-sidebar-price-wrapper">
                                <!-- <h6 class="booking-sidebar-price-title small mb-15">4 𝗑 Island Hopping in the
                                    Caribbean: Sun
                                    & Sea</h6> -->
                                <div class="booking-sidebar-price-content">

                                    <!-- <div
                                        class="booking-sidebar-price-item d-flex flex-wrap justify-content-between">
                                        <div class="booking-sidebar-price-item-title">3 𝗑 Adult (age 7-99)</div>
                                        <div class="booking-sidebar-price-item-amount">$1800.00</div>
                                    </div>

                                    <div
                                        class="booking-sidebar-price-item d-flex flex-wrap justify-content-between">
                                        <div class="booking-sidebar-price-item-title">1 𝗑 Infant (age 0-6)</div>
                                        <div class="booking-sidebar-price-item-amount">$599.00</div>
                                    </div> -->

                                    <div
                                        class="booking-sidebar-price-total d-flex flex-wrap justify-content-between">
                                        <div class="booking-sidebar-price-item-title b3 fw-7">Price</div>
                                        <div class="booking-sidebar-price-item-amount b3 fw-7">₱ {{ number_format($tour->price, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- booking-form area end -->


</main>
@endpush