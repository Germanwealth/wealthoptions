<header class="header-trans-leftbox" id="header">
    <div class="container">
        <div class="header-wrapper clearfix">
            <div class="site-nav-inner">
                <nav class="navbar navbar-expand-lg site-navbar">
                    <div class="navbar-brand navbar-header site-branding">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="Wealth Options">
                            </a>
                        </div>
                    </div>

                    <button class="navbar-toggler site-navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
                    </button>

                    <div class="collapse navbar-collapse site-navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav site-navbar-nav">
                            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>

                        <div class="site-navbar-actions">
                            <a class="site-nav-action site-nav-action-secondary" href="{{ route('login') }}">Sign In</a>
                            <a class="site-nav-action site-nav-action-primary" href="{{ route('register') }}">Create Account</a>
                        </div>
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
