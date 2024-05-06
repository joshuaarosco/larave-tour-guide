<nav class="page-sidebar" data-pages="sidebar">
	<div class="sidebar-header">
		<label>{{config('app.name')}}</label>
	</div>
	<div class="sidebar-menu">
		<ul class="menu-items">
			<li class="m-t-30 {{in_array(request()->route()->getName(),['backoffice.index'])?'open active':''}}">
				<a class="" href="{{route('backoffice.index')}}">
                    <span class="title">Dashboard</span>
                </a>
                <span class="{{in_array(request()->route()->getName(),['backoffice.index'])?'bg-success':''}} icon-thumbnail">
                    <i class="pg-home"></i>
                </span>
			</li>

            @if(auth()->check() AND in_array(auth()->user()->type, ['admin', 'super_user']))
            <li class="{{Request::is('backoffice/user*')?'open active':''}}">
                <a href="javascript:;">
                    <span class="title">Users</span>
                    <span class="arrow {{Request::is('backoffice/user*')?'open active':''}}"></span>
                </a>
                <span class="icon-thumbnail {{Request::is('backoffice/user*')?'bg-success':''}}">
                    <i class="fa fa-users"></i>
                </span>
                <ul class="sub-menu">
                    @if(auth()->user()->type == 'super_user')
                    <li class="{{in_array(request()->route()->getName(),['backoffice.user.index'])?'open active':''}}">
                        <a href="{{route('backoffice.user.index')}}">Admins</a> <span class="icon-thumbnail">a</span>
                    </li>
                    @endif
                    <li class="{{in_array(request()->route()->getName(),['backoffice.user.tour_guide'])?'open active':''}}">
                        <a href="{{route('backoffice.user.tour_guide')}}">Tour Guides</a> <span class="icon-thumbnail">tg</span>
                    </li>
                    <li class="{{in_array(request()->route()->getName(),['backoffice.user.tourist'])?'open active':''}}">
                        <a href="{{route('backoffice.user.tourist')}}">Tourists</a> <span class="icon-thumbnail">tr</span>
                    </li>
                </ul>
            </li>

            <li class="{{Request::is('backoffice/destination*')?'open active':''}}">
                <a href="javascript:;">
                    <span class="title">Destinations</span>
                    <span class="arrow {{Request::is('backoffice/destination*')?'open active':''}}"></span>
                </a>
                <span class=" icon-thumbnail {{Request::is('backoffice/destination*')?'bg-success':''}}">
                    <i class="fa fa-map"></i>
                </span>
                <ul class="sub-menu">
                    <li class="{{in_array(request()->route()->getName(),['backoffice.destination.index'])?'open active':''}}">
                        <a href="{{route('backoffice.destination.index')}}">List</a> <span class="icon-thumbnail">l</span>
                    </li>
                    <li class="{{in_array(request()->route()->getName(),['backoffice.destination.create'])?'open active':''}}">
                        <a href="{{route('backoffice.destination.create')}}">Create</a> <span class="icon-thumbnail">c</span>
                    </li>
                </ul>
            </li>
            @endif

            <li class="{{Request::is('backoffice/tour*')?'open active':''}}">
                <a href="javascript:;">
                    <span class="title">Tour</span>
                    <span class="arrow {{Request::is('backoffice/tour*')?'open active':''}}"></span>
                </a>
                <span class=" icon-thumbnail {{Request::is('backoffice/tour*')?'bg-success':''}}">
                    <i class="fa fa-map-marker"></i>
                </span>
                <ul class="sub-menu">
                    <li class="{{in_array(request()->route()->getName(),['backoffice.tour.index'])?'open active':''}}">
                        <a href="{{route('backoffice.tour.index')}}">List</a> <span class="icon-thumbnail">l</span>
                    </li>
                    @if(auth()->user()->type == 'tour_guide')
                    <li class="{{in_array(request()->route()->getName(),['backoffice.tour.create'])?'open active':''}}">
                        <a href="{{route('backoffice.tour.create')}}">Create</a> <span class="icon-thumbnail">c</span>
                    </li>
                    @endif
                </ul>
            </li>
            
			<li class="{{Request::is('backoffice/booking*')?'open active':''}}">
				<a class="" href="{{route('backoffice.booking.index')}}">
                    <span class="title">Bookings</span>
                </a>
                <span class="{{in_array(request()->route()->getName(),['backoffice.booking.index'])?'bg-success':''}} icon-thumbnail">
                    <i class="fa fa-calendar-check-o"></i>
                </span>
			</li>
            @if(auth()->user()->type == 'tour_guide')
			<li class="{{Request::is('backoffice/account/subscription*')?'open active':''}}">
				<a class="" href="{{route('backoffice.account.subscription')}}">
                    <span class="title">Subscription</span>
                </a>
                <span class="{{in_array(request()->route()->getName(),['backoffice.account.subscription'])?'bg-success':''}} icon-thumbnail">
                    <i class="fa fa-support"></i>
                </span>
			</li>
            @else
			<li class="{{Request::is('backoffice/account/subscription*')?'open active':''}}">
				<a class="" href="{{route('backoffice.account.subscription_list')}}">
                    <span class="title">Subscriptions</span>
                </a>
                <span class="{{in_array(request()->route()->getName(),['backoffice.account.subscription_list'])?'bg-success':''}} icon-thumbnail">
                    <i class="fa fa-support"></i>
                </span>
			</li>
            @endif
		</ul>
		<div class="clearfix"></div>
	</div>
</nav>