<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'pageTitle' => 'Simple and Wealthy Option For Crypto Investments',
            'metaDescription' => 'Easily earn by trading commodities using our bot trading solution. Our trading platform is easy and your account is easy to use.',
            'showTopbar' => true,
            'showSearch' => true,
            'footerVariant' => 'full',
            'home' => $this->homeContent(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'pageTitle' => 'About Us',
            'footerVariant' => 'full',
            'showTopbar' => true,
            'showSearch' => true,
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'pageTitle' => 'Contact',
            'footerVariant' => 'compact',
        ]);
    }

    private function homeContent(): array
    {
        return [
            'slides' => [
                [
                    'title' => 'Wealth Options Provides',
                    'subtitle' => 'Trading Solution',
                    'description' => 'Helping you earn interest withing a short term',
                    'background' => 'assets/web/images/slider/fx1.jpeg',
                    'actions' => [
                        ['label' => 'Learn More', 'route' => 'about', 'class' => 'btn btn-primary slider'],
                        ['label' => 'Create Account', 'route' => 'register', 'class' => 'btn btn-border slider'],
                    ],
                ],
                [
                    'title' => 'Join in our high success testimonials',
                    'subtitle' => 'Simple, Secure & Safe',
                    'description' => 'Trade Forex, gold, oil, stocks, CFDs and more',
                    'background' => 'assets/web/images/slider/fx2.jpg',
                    'actions' => [
                        ['label' => 'Create free account', 'route' => 'register', 'class' => 'btn btn-primary slider'],
                    ],
                ],
                [
                    'title' => 'Automatic blockchain withdrawals,',
                    'subtitle' => 'Deposit & Earn',
                    'description' => 'With flexible deposit and withdrawal methods.',
                    'background' => 'assets/web/images/slider/fx3.jpg',
                    'actions' => [
                        ['label' => 'Login', 'route' => 'login', 'class' => 'btn btn-border slider'],
                    ],
                ],
            ],
            'facts' => [
                ['icon' => 'icon-chart2', 'value' => '1453', 'label' => 'Daily Visitors'],
                ['icon' => 'icon-invest', 'value' => '443671', 'label' => 'Managed Investment'],
                ['icon' => 'icon-money-1', 'value' => '243556889.92', 'label' => 'Total Withdrawn'],
            ],
            'guarantees' => [
                [
                    'title' => 'We Care About',
                    'subtitle' => 'Security of Funds.',
                    'description' => 'Wealth Options continually identifies, assesses, and monitors each type of risk associated with its operations.',
                    'image' => 'assets/web/images/small-slider/funds-security.jpg',
                    'alt' => 'Funds security',
                ],
                [
                    'title' => 'Negative Balance',
                    'subtitle' => 'Well Managed.',
                    'description' => 'Negative balance protection means clients are not held responsible for paying back a negative balance caused by extreme volatility.',
                    'image' => 'assets/web/images/small-slider/negative-balance-protection.jpg',
                    'alt' => 'Negative balance protection',
                ],
                [
                    'title' => 'Segregation of',
                    'subtitle' => 'Investor Funds',
                    'description' => 'Client funds are kept separate from company operating accounts and cannot be used to cover creditors in the unlikely event of default.',
                    'image' => 'assets/web/images/small-slider/crude-trade.jpg',
                    'alt' => 'Investor funds',
                ],
            ],
            'features' => [
                [
                    'class' => 'feature-box1',
                    'image' => 'assets/web/images/features/site-security.jpg',
                    'icon' => 'icon-consut2',
                    'title' => 'Site Security',
                    'description' => 'Our company guarantees the availability of this website and the safety of your personal data.',
                ],
                [
                    'class' => 'feature-box2',
                    'image' => 'assets/web/images/features/support.jpg',
                    'icon' => 'icon-chart2',
                    'title' => 'Customer Support',
                    'description' => 'Our online support team is ready to answer questions and help resolve issues quickly.',
                ],
                [
                    'class' => 'feature-box3',
                    'image' => 'assets/web/images/features/earn.jpg',
                    'icon' => 'icon-clock3',
                    'title' => 'Earn on time',
                    'description' => 'We aim to bring back the feeling of defined benefits and the peace of mind that goes with it.',
                ],
            ],
            'deposits' => [
                ['amount' => 120000, 'wallet' => '3a17c5984af22cd7', 'time' => '12 sec ago', 'status' => 'Confirmed'],
                ['amount' => 86000, 'wallet' => '8a2b9781aa499562', 'time' => '18 sec ago', 'status' => 'Confirmed'],
                ['amount' => 24100, 'wallet' => 'f007e92cc9f82ba9', 'time' => '24 sec ago', 'status' => 'Pending'],
                ['amount' => 54000, 'wallet' => '00db85ef40da34f3', 'time' => '32 sec ago', 'status' => 'Confirmed'],
                ['amount' => 240000, 'wallet' => 'b21a418a44ed8b56', 'time' => '41 sec ago', 'status' => 'Confirmed'],
                ['amount' => 17000, 'wallet' => '1e652d2899a1d058', 'time' => '49 sec ago', 'status' => 'Confirmed'],
                ['amount' => 51000, 'wallet' => '6a49e66a66f75e72', 'time' => '57 sec ago', 'status' => 'Pending'],
                ['amount' => 21000, 'wallet' => '8a2b9781aa499562', 'time' => '1 min ago', 'status' => 'Confirmed'],
                ['amount' => 9000, 'wallet' => 'f0b66ce7a33bbc63', 'time' => '1 min ago', 'status' => 'Confirmed'],
                ['amount' => 43000, 'wallet' => 'aa14458f8082d9c4', 'time' => '2 min ago', 'status' => 'Pending'],
            ],
            'withdrawals' => [
                ['amount' => 7800, 'wallet' => '31b28efb64eb2ee2', 'time' => '9 sec ago', 'status' => 'Completed'],
                ['amount' => 15000, 'wallet' => 'b4c6fa67d4e90f6e', 'time' => '17 sec ago', 'status' => 'Completed'],
                ['amount' => 3500, 'wallet' => 'e5ad6be1af5f59fb', 'time' => '26 sec ago', 'status' => 'Processing'],
                ['amount' => 22300, 'wallet' => '980db23ba7ef8f56', 'time' => '34 sec ago', 'status' => 'Completed'],
                ['amount' => 11250, 'wallet' => '08d7bc2170f39211', 'time' => '43 sec ago', 'status' => 'Processing'],
                ['amount' => 5900, 'wallet' => '7cc90f83484da9ad', 'time' => '51 sec ago', 'status' => 'Completed'],
                ['amount' => 42000, 'wallet' => '4dd8d4fdb50d0fd0', 'time' => '1 min ago', 'status' => 'Completed'],
                ['amount' => 9400, 'wallet' => '39afcb20d60d659f', 'time' => '1 min ago', 'status' => 'Processing'],
                ['amount' => 18200, 'wallet' => 'c85f6160c3f52360', 'time' => '2 min ago', 'status' => 'Completed'],
                ['amount' => 6750, 'wallet' => '0dc1a93d6c49cc3b', 'time' => '2 min ago', 'status' => 'Completed'],
            ],
            'activity_summary' => [
                ['label' => 'Live Deposits', 'value' => '1,800+', 'tone' => 'success'],
                ['label' => 'Recent Withdrawals', 'value' => '970+', 'tone' => 'warning'],
                ['label' => 'Avg. Processing', 'value' => '< 2 mins', 'tone' => 'primary'],
            ],
            'testimonials' => [
                [
                    'name' => 'Julia Angellus',
                    'role' => 'Crypto Enthusiast',
                    'message' => 'I saw your ad on a popular crypto blog and felt I should give it a try after reviewing your website. I have earned for some time and feel it is reliable.',
                    'image' => 'assets/web/images/features/support.jpg',
                ],
                [
                    'name' => 'Pepe Kilse',
                    'role' => 'HR Manager',
                    'message' => 'My account manager gives prompt responses and financial advisory at no extra fees. Payments are fast on withdrawal.',
                    'image' => 'assets/web/images/features/earn.jpg',
                ],
            ],
            'plans' => [
                ['percent' => '150%', 'name' => 'Gold Plan', 'min' => '3000 USD', 'max' => '9999 USD'],
                ['percent' => '200%', 'name' => 'Platinum Plan', 'min' => '10,000 USD', 'max' => '19,999 USD'],
                ['percent' => '250%', 'name' => 'Ultimate Plan', 'min' => '20,000 USD', 'max' => '10000 USD'],
            ],
            'products' => [
                [
                    'id' => 'tab_one',
                    'active' => true,
                    'icon' => 'icon-pie-chart2',
                    'tab' => 'Forex',
                    'title' => 'Earn profits on your deposit',
                    'image' => 'assets/web/images/products/forex.jpg',
                    'description' => [
                        'FX trading is the buying and selling of currencies with the aim of making a profit.',
                        'The EUR/USD pair is among the most traded in the world and remains a familiar starting point for many investors.',
                    ],
                    'image_first' => true,
                ],
                [
                    'id' => 'tab_two',
                    'active' => false,
                    'icon' => 'icon-loan',
                    'tab' => 'Metals',
                    'title' => 'Trading Gold and Precious Metals',
                    'image' => 'assets/web/images/products/metal-trading.jpg',
                    'description' => [
                        'Precious metals, and gold in particular, have always been associated with monetary wealth.',
                        'They often act as a long-term safe haven for commodity traders.',
                    ],
                    'image_first' => false,
                ],
                [
                    'id' => 'tab_three',
                    'active' => false,
                    'icon' => 'icon-savings',
                    'tab' => 'Energies',
                    'title' => 'Expand your crude oil trading portfolio',
                    'image' => 'assets/web/images/products/crude-oil.jpg',
                    'description' => [
                        'Crude oil is one of the most actively traded commodities worldwide.',
                        'Its volatility can create opportunities for short-term traders while also increasing risk exposure.',
                    ],
                    'image_first' => true,
                ],
                [
                    'id' => 'tab_four',
                    'active' => false,
                    'icon' => 'icon-consult',
                    'tab' => 'Indicies',
                    'title' => 'Explore your opportunities on the stock market',
                    'image' => 'assets/web/images/products/index.jpg',
                    'description' => [
                        'Indices measure the price performance of a group of stocks from a market or market sector.',
                        'Wealth Options positions these products as another route for daily profit opportunities.',
                    ],
                    'image_first' => false,
                ],
            ],
        ];
    }
}
