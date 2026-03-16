<section class="ts-features no-padding">
    <div class="container-fluid">
        <div class="row">
            @foreach($features as $feature)
                <div class="col-lg-4 {{ $feature['class'] }}" style="background-image: url({{ asset($feature['image']) }});">
                    <div class="ts-feature text-center">
                        <div class="ts-feature-info">
                            <i class="icon {{ $feature['icon'] }}"></i>
                            <h3 class="ts-feature-title">{{ $feature['title'] }}</h3>
                            <p>{{ $feature['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="activity-section wow fadeInUp">
    <div class="container">
        <div class="row align-items-end activity-section-head">
            <div class="col-lg-7">
                <div class="title_dark text-left">
                    <span class="animation">Live Market Activity</span>
                    <h2>Latest Deposits & Withdrawals</h2>
                    <p>Track recent account funding and withdrawal activity across the platform in real time.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="activity-summary-grid">
                    @foreach($activitySummary as $item)
                        <div class="activity-summary-card activity-summary-{{ $item['tone'] }}">
                            <span>{{ $item['label'] }}</span>
                            <strong>{{ $item['value'] }}</strong>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row activity-board">
            <div class="col-lg-6 mb-4">
                <div class="card card-nav-tabs activity-card">
                    <div class="alert alert-success mb-0 activity-card-head">
                        <div>
                            <h3><i class="fa fa-plus"></i> Latest Deposits</h3>
                            <p>Incoming investment activity</p>
                        </div>
                        <span class="activity-pill">Live Feed</span>
                    </div>
                    <div class="activity-ticker">
                        <div class="activity-ticker-track scroll-up js-activity-track" data-feed="deposit"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card card-nav-tabs activity-card">
                    <div class="alert alert-warning mb-0 activity-card-head">
                        <div>
                            <h3><i class="fa fa-arrow-circle-o-down"></i> Latest Withdrawals</h3>
                            <p>Outgoing payout activity</p>
                        </div>
                        <span class="activity-pill">Updated</span>
                    </div>
                    <div class="activity-ticker">
                        <div class="activity-ticker-track scroll-down js-activity-track" data-feed="withdrawal"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/forex-cross-rates/?locale=en#%7B%22currencies%22%3A%5B%22EUR%22%2C%22USD%22%2C%22JPY%22%2C%22BTC%22%2C%22ETH%22%2C%22LTC%22%2C%22GBP%22%2C%22CHF%22%2C%22AUD%22%2C%22CAD%22%2C%22NZD%22%2C%22CNY%22%5D%2C%22isTransparent%22%3Afalse%2C%22colorTheme%22%3A%22light%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22700%22%7D" style="box-sizing: border-box; height: calc(668px); width: 100%;"></iframe>

@push('scripts')
<script>
    (() => {
        const seedFeeds = {
            deposit: @json($deposits),
            withdrawal: @json($withdrawals),
        };

        const statuses = {
            deposit: ['Confirmed', 'Confirmed', 'Confirmed', 'Pending'],
            withdrawal: ['Completed', 'Completed', 'Completed', 'Processing'],
        };

        const money = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            maximumFractionDigits: 2,
        });

        function randomFrom(list) {
            return list[Math.floor(Math.random() * list.length)];
        }

        function randomWallet(seed) {
            const base = (seed.wallet || 'f2a6c9d84be7ad13').replace(/[^a-zA-Z0-9]/g, '').slice(0, 12);
            const suffix = Math.random().toString(16).slice(2, 12);
            return `${base}${suffix}`.slice(0, 24);
        }

        function randomTime() {
            const bucket = Math.random();

            if (bucket < 0.28) {
                return `${8 + Math.floor(Math.random() * 49)} sec ago`;
            }

            if (bucket < 0.82) {
                return `${1 + Math.floor(Math.random() * 8)} min ago`;
            }

            return `${3 + Math.floor(Math.random() * 12)} mins ago`;
        }

        function generateEntries(type, count = 42) {
            const seeds = seedFeeds[type];

            return Array.from({ length: count }, (_, index) => {
                const seed = seeds[index % seeds.length];
                const delta = 0.82 + Math.random() * 1.42;
                const amount = Math.round(seed.amount * delta);
                const status = Math.random() > 0.52 ? seed.status : randomFrom(statuses[type]);

                return {
                    amount: money.format(amount),
                    wallet: randomWallet(seed),
                    time: randomTime(),
                    status,
                    tone: ['Confirmed', 'Completed'].includes(status) ? 'success' : 'warning',
                };
            });
        }

        function renderCard(item, type) {
            const positive = item.status === 'Confirmed' || item.status === 'Completed';
            const icon = positive ? 'fa-check' : 'fa-clock-o';
            const tone = positive ? 'success' : 'warning';
            return `
                <article class="activity-item">
                    <div class="activity-item-top">
                        <div class="activity-item-heading">
                            <span class="activity-label">${type === 'deposit' ? 'Deposit' : 'Withdrawal'}</span>
                            <strong>${item.amount}</strong>
                        </div>
                        <span class="activity-status activity-status-${tone}">
                            <i class="fa ${icon}"></i>${item.status}
                        </span>
                    </div>
                    <div class="activity-item-body">
                        <div class="activity-wallet-block">
                            <span class="activity-wallet-label">Wallet Address</span>
                            <code>${item.wallet}...</code>
                        </div>
                        <span class="activity-time">${item.time}</span>
                    </div>
                </article>
            `;
        }

        document.querySelectorAll('.js-activity-track').forEach((track) => {
            const type = track.dataset.feed;
            const entries = generateEntries(type);
            const group = document.createElement('div');
            group.className = 'activity-group';
            group.innerHTML = entries.map((item) => renderCard(item, type)).join('');

            const clone = group.cloneNode(true);
            track.innerHTML = '';
            track.appendChild(group);
            track.appendChild(clone);
        });
    })();
</script>
@endpush
