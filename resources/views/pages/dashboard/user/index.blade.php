@extends('layouts.dashboard')

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-ticker" aria-label="Market ticker">
            <div class="dashboard-ticker-track">
                @foreach(array_merge($marketTicker, $marketTicker) as $ticker)
                    <div class="dashboard-ticker-item">
                        <strong>{{ $ticker['symbol'] }}</strong>
                        <span>{{ $ticker['value'] }}</span>
                        <em class="{{ str_starts_with($ticker['change'], '-') ? 'is-down' : 'is-up' }}">{{ $ticker['change'] }}</em>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="dashboard-metrics">
            @foreach($metrics as $metric)
                <div class="dashboard-card">
                    <span>{{ $metric['label'] }}</span>
                    <strong>{{ $metric['value'] }}</strong>
                </div>
            @endforeach
        </div>

        <div class="dashboard-grid dashboard-grid-primary">
            <div class="dashboard-panel dashboard-hero-panel">
                <div class="dashboard-hero-copy">
                    <span class="dashboard-panel-eyebrow">Wealth Options Live Desk</span>
                    <h2>{{ $authUser['plan'] }}</h2>
                    <p>Route deposits into your BTC, ETH, or BNB funding wallet, monitor trading exposure, and follow simulated FX flow from one dark-mode console.</p>
                    <div class="dashboard-stat-list">
                        @foreach($stats as $stat)
                            <div class="dashboard-stat-item">
                                <span>{{ $stat['label'] }}</span>
                                <strong>{{ $stat['value'] }}</strong>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="dashboard-hero-visual">
                    <div class="dashboard-orb"></div>
                    <div class="dashboard-orb dashboard-orb-secondary"></div>
                    <div class="dashboard-screen">
                        <div class="dashboard-screen-header">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="dashboard-candles">
                            <i class="is-tall"></i>
                            <i class="is-short"></i>
                            <i class="is-mid"></i>
                            <i class="is-up"></i>
                            <i class="is-tall"></i>
                            <i class="is-short"></i>
                            <i class="is-mid"></i>
                            <i class="is-up"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-panel dashboard-funding-panel" id="wallets">
                <div class="dashboard-panel-head">
                    <div>
                        <span class="dashboard-panel-eyebrow">Funding Desk</span>
                        <h2>Add Money</h2>
                    </div>
                    <p>Select a network and create a funding request. Send payment to the wallet shown below.</p>
                </div>

                <form action="{{ route('dashboard.deposit') }}" method="post" class="dashboard-funding-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="currency">Wallet</label>
                            <select class="form-control" id="currency" name="currency">
                                <option value="BTC">Bitcoin</option>
                                <option value="ETH">Ethereum</option>
                                <option value="BNB">BNB</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="amount">Amount (USD)</label>
                            <input class="form-control" type="number" min="100" step="0.01" id="amount" name="amount" placeholder="2500" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="note">Reference</label>
                            <input class="form-control" type="text" id="note" name="note" placeholder="Optional note">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Create Funding Request</button>
                </form>

                <div class="dashboard-wallet-grid">
                    @foreach($walletCards as $wallet)
                        <div class="dashboard-wallet-card">
                            <div class="dashboard-wallet-head">
                                <span>{{ $wallet['currency'] }}</span>
                                <strong>{{ $wallet['network'] }}</strong>
                            </div>
                            <p>{{ $wallet['address'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-panel" id="activity">
                <div class="dashboard-panel-head">
                    <div>
                        <span class="dashboard-panel-eyebrow">Execution Feed</span>
                        <h2>Recent Account Activity</h2>
                    </div>
                </div>

                <div class="dashboard-activity-list">
                    @foreach($activityFeed as $item)
                        <div class="dashboard-activity-item">
                            <span class="dashboard-activity-dot dashboard-tone-{{ $item['tone'] }}"></span>
                            <div>
                                <strong>{{ $item['title'] }}</strong>
                                <p>{{ $item['description'] }}</p>
                            </div>
                            <time>{{ $item['time'] }}</time>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="dashboard-panel dashboard-side-panel">
                <div class="dashboard-panel-head">
                    <div>
                        <span class="dashboard-panel-eyebrow">Account Profile</span>
                        <h2>Client Snapshot</h2>
                    </div>
                </div>

                <div class="dashboard-profile-list">
                    <div><span>Full name</span><strong>{{ $authUser['full_name'] }}</strong></div>
                    <div><span>Email</span><strong>{{ $authUser['email'] }}</strong></div>
                    <div><span>Country</span><strong>{{ $authUser['country'] }}</strong></div>
                    <div><span>Joined</span><strong>{{ \Illuminate\Support\Carbon::parse($authUser['joined_at'])->format('M d, Y') }}</strong></div>
                    <div><span>Status</span><strong>{{ $authUser['status'] }}</strong></div>
                </div>
            </div>
        </div>

        <div class="dashboard-panel" id="records">
            <div class="dashboard-panel-head">
                <div>
                    <span class="dashboard-panel-eyebrow">Funding Records</span>
                    <h2>Wallet Transactions</h2>
                </div>
                <p>{{ count($transactions) }} total transaction{{ count($transactions) === 1 ? '' : 's' }}</p>
            </div>
            <div class="table-responsive">
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th>Created</th>
                            <th>ID</th>
                            <th>Asset</th>
                            <th>Amount</th>
                            <th>Network</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ \Illuminate\Support\Carbon::parse($transaction['created_at'])->format('M d, Y H:i') }}</td>
                                <td>{{ $transaction['id'] }}</td>
                                <td>{{ $transaction['currency'] }}</td>
                                <td>${{ number_format((float) $transaction['amount'], 2) }}</td>
                                <td>{{ $transaction['network'] }}</td>
                                <td><span class="dashboard-badge">{{ $transaction['status'] }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No funding records yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
