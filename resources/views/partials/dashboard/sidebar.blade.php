<aside class="dashboard-sidebar">
    <div class="dashboard-brand">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Wealth Options">
        </a>
    </div>

    <nav class="dashboard-nav">
        @if(($authUser['role'] ?? 'user') === 'admin')
            <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fa fa-shield"></i> Admin Dashboard
            </a>
            <a href="#users"><i class="fa fa-users"></i> Users</a>
            <a href="#records"><i class="fa fa-table"></i> Funding Ledger</a>
        @else
            <a class="{{ request()->routeIs('dashboard.user') ? 'active' : '' }}" href="{{ route('dashboard.user') }}">
                <i class="fa fa-line-chart"></i> Overview
            </a>
            <a href="#wallets"><i class="fa fa-bitcoin"></i> Wallets</a>
            <a href="#activity"><i class="fa fa-bolt"></i> Activity</a>
            <a href="#records"><i class="fa fa-table"></i> Records</a>
        @endif
        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Website Home</a>
        <a href="{{ route('contact') }}"><i class="fa fa-envelope"></i> Support</a>
    </nav>

    <div class="dashboard-sidebar-note">
        <strong>{{ $authUser['full_name'] ?? 'Client' }}</strong><br>
        {{ $authUser['email'] ?? 'account@wealthoptions.com' }}
    </div>
</aside>
