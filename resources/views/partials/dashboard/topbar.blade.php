<div class="dashboard-topbar">
    <div>
        <h1>{{ $dashboardTitle ?? 'Dashboard' }}</h1>
        <p>{{ $dashboardIntro ?? 'Live account workspace.' }}</p>
    </div>

    <div class="dashboard-topbar-actions">
        <div class="dashboard-user-chip">
            <span>{{ ($dashboardType ?? 'user') === 'admin' ? 'Administrator' : 'Client Account' }}</span>
            <strong>{{ $authUser['full_name'] ?? 'Wealth Options User' }}</strong>
        </div>
        <a class="btn btn-primary btn-sm" href="{{ route('home') }}">Back to site</a>
        <form action="{{ route('logout') }}" method="post" class="d-inline-block">
            @csrf
            <button class="btn btn-outline-secondary btn-sm" type="submit">Logout</button>
        </form>
    </div>
</div>
