<?php

namespace App\Http\Controllers;

use App\Support\AccountStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(private readonly AccountStore $accountStore)
    {
    }

    public function user(Request $request): View|RedirectResponse
    {
        $user = $this->sessionUser($request);

        if (! $user) {
            return redirect()->route('login')->with('status', 'Sign in to access your dashboard.');
        }

        if ($user['role'] !== 'user') {
            return redirect()->route('admin.dashboard');
        }

        $currencies = ['BTC', 'ETH', 'BNB'];
        $transactions = $user['transactions'];
        $metrics = [
            ['label' => 'Portfolio Value', 'value' => '$' . number_format((float) $user['balances']['portfolio'], 2)],
            ['label' => 'Live Profit', 'value' => '$' . number_format((float) $user['balances']['profit'], 2)],
            ['label' => 'Available Balance', 'value' => '$' . number_format((float) $user['balances']['available'], 2)],
            ['label' => 'Active Wallets', 'value' => (string) count($user['wallets'])],
        ];

        return view('pages.dashboard.user.index', [
            'pageTitle' => 'User Dashboard',
            'dashboardTitle' => 'Trading Desk',
            'dashboardType' => 'user',
            'dashboardIntro' => 'Live portfolio overview, wallet funding desk, and market pulse built for active clients.',
            'authUser' => $user,
            'metrics' => $metrics,
            'walletCards' => collect($currencies)->map(fn (string $currency): array => [
                'currency' => $currency,
                'network' => match ($currency) {
                    'BTC' => 'Bitcoin Mainnet',
                    'ETH' => 'Ethereum ERC-20',
                    'BNB' => 'BNB Smart Chain',
                },
                'address' => $user['wallets'][$currency],
            ])->all(),
            'marketTicker' => [
                ['symbol' => 'EUR/USD', 'value' => '1.0918', 'change' => '+0.42%'],
                ['symbol' => 'XAU/USD', 'value' => '2,188.61', 'change' => '+1.10%'],
                ['symbol' => 'BTC/USD', 'value' => '67,440', 'change' => '+2.36%'],
                ['symbol' => 'ETH/USD', 'value' => '3,540', 'change' => '+1.74%'],
                ['symbol' => 'BNB/USD', 'value' => '592.18', 'change' => '+0.88%'],
                ['symbol' => 'USOIL', 'value' => '81.24', 'change' => '-0.24%'],
            ],
            'activityFeed' => $user['activity'],
            'transactions' => $transactions,
            'stats' => [
                ['label' => 'Active Plan', 'value' => $user['plan']],
                ['label' => 'Verification', 'value' => $user['status']],
                ['label' => 'Client Region', 'value' => $user['country']],
                ['label' => 'Last Funding', 'value' => $transactions[0]['currency'] ?? 'No funding yet'],
            ],
        ]);
    }

    public function createDeposit(Request $request): RedirectResponse
    {
        $user = $this->sessionUser($request);

        if (! $user || $user['role'] !== 'user') {
            return redirect()->route('login');
        }

        $request->validate([
            'currency' => ['required', 'in:BTC,ETH,BNB'],
            'amount' => ['required', 'numeric', 'min:100'],
            'note' => ['nullable', 'string', 'max:120'],
        ]);

        $updatedUser = $this->accountStore->createDeposit($user['id'], $request->only('currency', 'amount', 'note'));

        if (! $updatedUser) {
            return back()->withErrors(['currency' => 'Unable to create the funding request.']);
        }

        $request->session()->put('auth_user_id', $updatedUser['id']);

        return back()->with('status', 'Funding request created. Send your transfer to the selected wallet and wait for confirmation.');
    }

    public function admin(Request $request): View|RedirectResponse
    {
        $user = $this->sessionUser($request);

        if (! $user) {
            return redirect()->route('login')->with('status', 'Admin sign-in is required.');
        }

        if ($user['role'] !== 'admin') {
            return redirect()->route('dashboard.user');
        }

        $users = $this->accountStore->allUsers();
        $regularUsers = array_values(array_filter($users, fn (array $item): bool => $item['role'] === 'user'));
        $allTransactions = collect($regularUsers)
            ->flatMap(fn (array $item): array => array_map(
                fn (array $transaction): array => $transaction + ['user_name' => $item['full_name'], 'user_email' => $item['email']],
                $item['transactions']
            ))
            ->sortByDesc('created_at')
            ->values()
            ->all();

        return view('pages.dashboard.admin.index', [
            'pageTitle' => 'Admin Dashboard',
            'dashboardTitle' => 'Control Room',
            'dashboardType' => 'admin',
            'dashboardIntro' => 'Visibility into registrations, wallet funding, and user records across the platform.',
            'authUser' => $user,
            'metrics' => [
                ['label' => 'Registered Users', 'value' => (string) count($regularUsers)],
                ['label' => 'Funding Requests', 'value' => (string) count($allTransactions)],
                ['label' => 'Admins', 'value' => (string) count(array_filter($users, fn (array $item): bool => $item['role'] === 'admin'))],
                ['label' => 'Portfolio Exposure', 'value' => '$' . number_format(collect($regularUsers)->sum(fn ($item) => $item['balances']['portfolio']), 2)],
            ],
            'users' => $regularUsers,
            'transactions' => $allTransactions,
        ]);
    }

    private function sessionUser(Request $request): ?array
    {
        $id = $request->session()->get('auth_user_id');

        if (! is_string($id) || $id === '') {
            return null;
        }

        return $this->accountStore->findUserById($id);
    }
}
