@extends('layouts.dashboard')

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-metrics">
            @foreach($metrics as $metric)
                <div class="dashboard-card">
                    <span>{{ $metric['label'] }}</span>
                    <strong>{{ $metric['value'] }}</strong>
                </div>
            @endforeach
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-panel dashboard-hero-panel">
                <div class="dashboard-hero-copy">
                    <span class="dashboard-panel-eyebrow">Admin Oversight</span>
                    <h2>Platform Monitoring</h2>
                    <p>Review every registered user, inspect wallet funding activity, and keep track of portfolio exposure from a single dark command surface.</p>
                </div>
            </div>

            <div class="dashboard-panel dashboard-side-panel">
                <div class="dashboard-panel-head">
                    <div>
                        <span class="dashboard-panel-eyebrow">Admin Profile</span>
                        <h2>Access</h2>
                    </div>
                </div>
                <div class="dashboard-profile-list">
                    <div><span>Name</span><strong>{{ $authUser['full_name'] }}</strong></div>
                    <div><span>Email</span><strong>{{ $authUser['email'] }}</strong></div>
                    <div><span>Role</span><strong>{{ ucfirst($authUser['role']) }}</strong></div>
                    <div><span>Status</span><strong>{{ $authUser['status'] }}</strong></div>
                </div>
            </div>
        </div>

        <div class="dashboard-panel" id="users">
            <div class="dashboard-panel-head">
                <div>
                    <span class="dashboard-panel-eyebrow">User Registry</span>
                    <h2>Registered Users</h2>
                </div>
                <p>{{ count($users) }} user account{{ count($users) === 1 ? '' : 's' }}</p>
            </div>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th>Joined</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Plan</th>
                            <th>Portfolio</th>
                            <th>Wallets</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ \Illuminate\Support\Carbon::parse($user['joined_at'])->format('M d, Y') }}</td>
                                <td>{{ $user['full_name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['country'] }}</td>
                                <td>{{ $user['plan'] }}</td>
                                <td>${{ number_format((float) $user['balances']['portfolio'], 2) }}</td>
                                <td>{{ implode(', ', array_keys($user['wallets'])) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="dashboard-panel" id="records">
            <div class="dashboard-panel-head">
                <div>
                    <span class="dashboard-panel-eyebrow">Funding Ledger</span>
                    <h2>All Wallet Requests</h2>
                </div>
                <p>{{ count($transactions) }} item{{ count($transactions) === 1 ? '' : 's' }}</p>
            </div>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th>Created</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Asset</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ \Illuminate\Support\Carbon::parse($transaction['created_at'])->format('M d, Y H:i') }}</td>
                                <td>{{ $transaction['user_name'] }}</td>
                                <td>{{ $transaction['user_email'] }}</td>
                                <td>{{ $transaction['currency'] }}</td>
                                <td>${{ number_format((float) $transaction['amount'], 2) }}</td>
                                <td><span class="dashboard-badge">{{ $transaction['status'] }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No wallet funding requests yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
