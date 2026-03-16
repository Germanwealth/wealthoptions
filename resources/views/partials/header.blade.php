<header class="header-trans-leftbox" id="header">
    <div class="container">
        <div class="header-wrapper clearfix">
            <div class="site-nav-inner">
                <nav class="navbar navbar-expand-lg">
                    <div class="navbar-brand navbar-header">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="Wealth Options">
                            </a>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item dropdown {{ request()->routeIs('login', 'register') ? 'active' : '' }}">
                                <a class="nav-link" href="#" data-toggle="dropdown">My Account<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('register') }}">Create Free Account</a></li>
                                    <li><a href="{{ route('login') }}">Sign In</a></li>
                                </ul>
                            </li>
                            <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                @if(($showSearch ?? false) === true)
                    <div class="nav-search"><span id="search"><i class="icon icon-search"></i></span></div>
                    <div class="search-block" style="display: none;">
                        <input class="form-control" type="text" placeholder="Search">
                        <span class="search-close">×</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
