<aside class="sidebar-wrapper sidebar-sticky">
    <div class="sidebar-widget-wrapper mb-30">
        <div class="sidebar-widget widget">
            <h6 class="sidebar-widget-title small mb-15">Search Here</h6>
            <div class="sidebar-search">
                <form class="sidebar-search-form" action="#" method="get">
                    <input type="text" value="" required="" name="s" placeholder="Search">
                    <button type="submit"> <i class="far fa-search"></i> </button>
                </form>
            </div>
        </div>
        <div class="sidebar-widget-divider"></div>
        <!-- <div class="sidebar-widget widget">
            <h6 class="sidebar-widget-title small mb-15">Contact for Booking</h6>
            <div class="sidebar-booking">
                <form class="sidebar-booking-form" action="#" method="get">
                    <div class="input-box">
                        <input type="text" placeholder="Name">
                    </div>
                    <div class="input-box">
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="input-box">
                        <textarea cols="30" rows="10"
                            placeholder="Type Comment here"></textarea>
                    </div>
                    <div class="booking-btn">
                        <a class="bd-btn btn-style radius-4 w-100" href="index.html">Send
                            Now<span><i class="fa-regular fa-arrow-right"></i></span></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="sidebar-widget-divider"></div> -->
        <div class="sidebar-widget widget">
            <h6 class="sidebar-widget-title small mb-15">Recent Tour List</h6>
            <div class="sidebar-widget-post">
                @foreach($toursSide as $index => $tour)
                <div class="recent-post">
                    <div class="recent-post-thumb mr-10">
                        <a href="{{ route('tour.detail', $tour->id) }}">
                            <img src="{{asset($tour->thumbnail())}}" alt="image">
                        </a>
                    </div>
                    <div class="recent-post-content">
                        <h6 class="recent-post-title small underline">
                            <a href="{{ route('tour.detail', $tour->id) }}">{{ str_limit($tour->name, 35) }}</a>
                        </h6>
                        <span class="recent-post-price">₱ {{ number_format($tour->price, 2) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @if(Request::is('tour/detail*'))
    <div class="sidebar-widget-banner p-relative">
        <div class="sidebar-widget-thumb p-relative">
            <img src="{{asset($tour->user->getAvatar())}}" alt="img">
        </div>
        <div class="sidebar-widget-content">
            <span class="bd-play-btn pulse-white mt-40"><i class="fa fa-calendar-check"></i></span>
            <p class="b3 mt-25 mb-0">Tour Guide</p>
            <h5 class="mt-0">
                <!-- <a href="tel:+639-123-4567-89">+639-123-4567-89</a> -->
                <a href="{{ route('tour_guide.detail', $tour->user->tourGuide->id) }}">{{ $tour->user->fname }} {{ $tour->user->lname }} 
                    <br> <i>({{ $tour->user->tourGuide->nickname }})</i></a>
            </h5>
            @if(auth()->check() AND auth()->user()->type == 'tourist')
            <div class="sidebar-btn mt-20">
                <a class="bd-text-btn style-two" href="{{ route('tour.book', $tour->id) }}">Book Now
                    <span class="icon__box">
                        <i class="fa-light fa-angle-right icon__first"></i>
                        <i class="fa-light fa-angle-right icon__second"></i>
                    </span>
                </a>
            </div>
            @elseif(!auth()->check())
            <div class="sidebar-btn mt-20">
                <a class="bd-text-btn style-two" href="{{ route('backoffice.auth.login') }}">Login to Book Now
                    <span class="icon__box">
                        <i class="fa-light fa-angle-right icon__first"></i>
                        <i class="fa-light fa-angle-right icon__second"></i>
                    </span>
                </a>
            </div>
            @endif
        </div>
    </div>
    @endif
</aside>