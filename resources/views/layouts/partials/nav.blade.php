<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<ul id="profile-dropdown1" class="dropdown-content">
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout
        </a>
    </li>
</ul>

<ul id="profile-dropdown2" class="dropdown-content">
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout
        </a>
    </li>
</ul>
<nav>
    <div class="container nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
        <a href="#" data-activates="mobile-sidenav" class="button-collapse"><i class="material-icons">menu</i></a>

        <ul class="right hide-on-med-and-down">
            @guest
                <li class="{{Request::is('login')?'active':''}}"><a href="{{ route('login') }}">Login</a></li>
                <li class="{{Request::is('register')?'active':''}}"><a href="{{ route('register') }}">Register</a></li>
            @else
                <li><a class="dropdown-button" href="#!" data-activates="profile-dropdown1" data-beloworigin="true">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest
        </ul>

        <ul class="side-nav" id="mobile-sidenav">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li><a class="dropdown-button" href="#!" data-activates="profile-dropdown2" data-beloworigin="true">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest
        </ul>
    </div>
</nav>
