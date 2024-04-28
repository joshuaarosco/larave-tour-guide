<nav class="main-menu main-menu-three" id="mobile-menu">
    <ul>
        <li class="has-mega-menu">
            <a href="{{ route('index') }}">Home</a>
        </li>
        <li class="menu-item-has-children">
            <a href="{{ route('destination.index') }}">Destination</a>
        </li>
        <li class="menu-item-has-children">
            <a href="{{ route('tour.index') }}">Tour</a>
        </li>
        <li class="menu-item-has-children">
            <a href="{{ route('tour_guide.index') }}">Tour Guide</a>
        </li>
        @if(!auth()->check())
        <li><a href="{{ route('backoffice.auth.login') }}">Login / Register</a></li>
        @else
        <li class="menu-item-has-children">
            <a href="javascript:void(0)">Account</a>
            <ul class="submenu">
                @if(auth()->user()->type == 'tourist')
                <li class="menu-item-has-children">
                    <a href="{{ route('booking.index') }}">Bookings</a>
                </li>
                @if(in_array(auth()->user()->type, ['tourist', 'tour_guide']))
                <li class="menu-item-has-children">
                    <a href="{{ route('messages.index') }}">Messages</a>
                </li>
                @endif
                @else
                <li class="menu-item-has-children">
                    <a href="{{ route('backoffice.index') }}">Dashboard</a>
                </li>
                @if(in_array(auth()->user()->type, ['tourist', 'tour_guide']))
                <li class="menu-item-has-children">
                    <a href="{{ route('messages.index') }}">Messages</a>
                </li>
                @endif
                <li class="menu-item-has-children">
                    <a href="{{ route('backoffice.account.index') }}">Settings</a>
                </li>
                @endif
                <li class="menu-item-has-children">
                    <a href="{{ route('backoffice.logout') }}">Logout</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</nav>