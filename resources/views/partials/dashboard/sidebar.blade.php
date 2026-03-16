<aside class="dashboard-sidebar">
    <div class="dashboard-brand">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Wealth Options">
        </a>
    </div>

    <nav class="dashboard-nav">
        <a class="{{ request()->routeIs('dashboard.user') ? 'active' : '' }}" href="{{ route('dashboard.user') }}">
            <i class="fa fa-user"></i> User Dashboard
        </a>
        <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-shield"></i> Admin Dashboard
        </a>
        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Website Home</a>
        <a href="{{ route('contact') }}"><i class="fa fa-envelope"></i> Contact Page</a>
    </nav>

    <div class="dashboard-sidebar-note">
        Future auth guards, role checks, and dynamic menu items can be added here.
    </div>
</aside>
