<div class="dashboard-topbar">
    <div>
        <h1>{{ $dashboardTitle ?? 'Dashboard' }}</h1>
        <p>{{ ($dashboardType ?? 'user') === 'admin' ? 'Admin placeholder area ready for moderation and reporting widgets.' : 'User placeholder area ready for portfolio and account widgets.' }}</p>
    </div>

    <div class="dashboard-topbar-actions">
        <a class="btn btn-primary btn-sm" href="{{ route('home') }}">Back to site</a>
        <form action="{{ route('logout') }}" method="post" class="d-inline-block">
            @csrf
            <button class="btn btn-outline-secondary btn-sm" type="submit">Logout</button>
        </form>
    </div>
</div>
