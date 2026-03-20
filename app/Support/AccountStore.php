<?php

namespace App\Support;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountStore
{
    private string $path;

    public function __construct()
    {
        $this->path = storage_path('app/data/accounts.json');
        $this->ensureStore();
    }

    public function allUsers(): array
    {
        return $this->read()['users'];
    }

    public function authenticate(string $email, string $password): ?array
    {
        foreach ($this->allUsers() as $user) {
            if (strtolower($user['email']) !== strtolower($email)) {
                continue;
            }

            if (! Hash::check($password, $user['password'])) {
                return null;
            }

            return $user;
        }

        return null;
    }

    public function findUserById(string $id): ?array
    {
        foreach ($this->allUsers() as $user) {
            if ($user['id'] === $id) {
                return $user;
            }
        }

        return null;
    }

    public function emailExists(string $email): bool
    {
        foreach ($this->allUsers() as $user) {
            if (strtolower($user['email']) === strtolower($email)) {
                return true;
            }
        }

        return false;
    }

    public function createUser(array $attributes): array
    {
        $payload = $this->read();

        $user = [
            'id' => (string) Str::uuid(),
            'full_name' => $attributes['full_name'],
            'email' => strtolower($attributes['email']),
            'password' => Hash::make($attributes['password']),
            'role' => 'user',
            'status' => 'Active',
            'country' => $attributes['country'] ?? 'United States',
            'joined_at' => now()->toDateTimeString(),
            'wallets' => $this->makeWallets($attributes['wallets'] ?? []),
            'balances' => [
                'portfolio' => 0,
                'profit' => 0,
                'available' => 0,
            ],
            'plan' => 'Starter Bot',
            'activity' => [
                [
                    'title' => 'Account created',
                    'description' => 'Your trading workspace is ready. Complete your first wallet top-up to unlock live portfolio metrics.',
                    'time' => 'Just now',
                    'tone' => 'primary',
                ],
            ],
            'transactions' => [],
        ];

        $payload['users'][] = $user;
        $this->write($payload);

        return $user;
    }

    public function createDeposit(string $userId, array $attributes): ?array
    {
        $payload = $this->read();
        $users = $payload['users'];

        foreach ($users as $index => $user) {
            if ($user['id'] !== $userId) {
                continue;
            }

            $amount = (float) $attributes['amount'];
            $currency = strtoupper($attributes['currency']);
            $wallet = Arr::get($user['wallets'], $currency);

            if (! $wallet) {
                return null;
            }

            $transaction = [
                'id' => strtoupper(Str::random(10)),
                'type' => 'Deposit',
                'currency' => $currency,
                'wallet' => $wallet,
                'amount' => number_format($amount, 2, '.', ''),
                'status' => 'Awaiting blockchain confirmation',
                'created_at' => now()->toDateTimeString(),
                'network' => $this->networkLabel($currency),
                'note' => trim((string) ($attributes['note'] ?? '')),
            ];

            $users[$index]['transactions'] = array_values([
                $transaction,
                ...$user['transactions'],
            ]);
            $users[$index]['balances']['portfolio'] += $amount;
            $users[$index]['balances']['available'] += $amount;
            $users[$index]['balances']['profit'] += round($amount * 0.08, 2);
            $users[$index]['activity'] = array_values([
                [
                    'title' => $currency . ' funding request created',
                    'description' => 'A ' . $currency . ' deposit request for $' . number_format($amount, 2) . ' is now pending review.',
                    'time' => 'Just now',
                    'tone' => 'success',
                ],
                ...$user['activity'],
            ]);

            $payload['users'] = $users;
            $this->write($payload);

            return $users[$index];
        }

        return null;
    }

    private function ensureStore(): void
    {
        $directory = dirname($this->path);

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (File::exists($this->path)) {
            return;
        }

        $this->write([
            'users' => [
                $this->makeSeedUser(
                    name: 'Wealth Demo User',
                    email: 'user@wealthoptions.com',
                    password: 'User12345!',
                    role: 'user',
                    plan: 'Growth Bot Pro',
                    country: 'United States',
                    balances: [
                        'portfolio' => 28450,
                        'profit' => 6250,
                        'available' => 9120,
                    ],
                    transactions: [
                        [
                            'id' => 'TXN-BTC-001',
                            'type' => 'Deposit',
                            'currency' => 'BTC',
                            'wallet' => 'bc1qwealth4demo8wallet9btc2k7p',
                            'amount' => '12000.00',
                            'status' => 'Completed',
                            'created_at' => now()->subDays(4)->toDateTimeString(),
                            'network' => 'Bitcoin Mainnet',
                            'note' => 'Initial bitcoin funding',
                        ],
                        [
                            'id' => 'TXN-ETH-002',
                            'type' => 'Deposit',
                            'currency' => 'ETH',
                            'wallet' => '0xWEALTH0PT10NS5AMPLE8ETH91A4',
                            'amount' => '8450.00',
                            'status' => 'Processing',
                            'created_at' => now()->subDay()->toDateTimeString(),
                            'network' => 'Ethereum ERC-20',
                            'note' => 'Portfolio rebalance deposit',
                        ],
                    ],
                    activity: [
                        [
                            'title' => 'Profit engine rebalanced',
                            'description' => 'FX basket allocation shifted toward metals and majors after overnight volatility.',
                            'time' => '12 mins ago',
                            'tone' => 'primary',
                        ],
                        [
                            'title' => 'ETH wallet credited',
                            'description' => 'Ethereum deposit is visible in your portfolio and waiting for final confirmations.',
                            'time' => '1 hour ago',
                            'tone' => 'success',
                        ],
                        [
                            'title' => 'Withdrawal desk online',
                            'description' => 'Treasury desk is currently processing same-day settlement requests.',
                            'time' => '3 hours ago',
                            'tone' => 'warning',
                        ],
                    ],
                ),
                $this->makeSeedUser(
                    name: 'Wealth Options Admin',
                    email: 'admin@wealthoptions.com',
                    password: 'Admin12345!',
                    role: 'admin',
                    plan: 'Oversight Console',
                    country: 'United Kingdom',
                    balances: [
                        'portfolio' => 0,
                        'profit' => 0,
                        'available' => 0,
                    ],
                    transactions: [],
                    activity: [
                        [
                            'title' => 'Admin console ready',
                            'description' => 'Use this account to monitor every registered user, funding request, and wallet record.',
                            'time' => 'Just now',
                            'tone' => 'primary',
                        ],
                    ],
                ),
            ],
        ]);
    }

    private function makeSeedUser(
        string $name,
        string $email,
        string $password,
        string $role,
        string $plan,
        string $country,
        array $balances,
        array $transactions,
        array $activity
    ): array {
        return [
            'id' => (string) Str::uuid(),
            'full_name' => $name,
            'email' => strtolower($email),
            'password' => Hash::make($password),
            'role' => $role,
            'status' => 'Active',
            'country' => $country,
            'joined_at' => now()->subDays($role === 'admin' ? 30 : 10)->toDateTimeString(),
            'wallets' => $this->makeWallets(),
            'balances' => $balances,
            'plan' => $plan,
            'activity' => $activity,
            'transactions' => $transactions,
        ];
    }

    private function makeWallets(array $overrides = []): array
    {
        return array_merge([
            'BTC' => 'bc1qwealth4demo8wallet9btc2k7p',
            'ETH' => '0xWEALTH0PT10NS5AMPLE8ETH91A4',
            'BNB' => 'bnb1wealthoptionstrading0samplex4',
        ], $overrides);
    }

    private function networkLabel(string $currency): string
    {
        return match ($currency) {
            'BTC' => 'Bitcoin Mainnet',
            'ETH' => 'Ethereum ERC-20',
            'BNB' => 'BNB Smart Chain',
            default => 'Blockchain Network',
        };
    }

    private function read(): array
    {
        $contents = File::get($this->path);
        $decoded = json_decode($contents, true);

        return is_array($decoded) ? $decoded : ['users' => []];
    }

    private function write(array $payload): void
    {
        File::put($this->path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
