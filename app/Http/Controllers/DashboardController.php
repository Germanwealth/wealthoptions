<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function user(): View
    {
        return view('pages.dashboard.user.index', [
            'pageTitle' => 'User Dashboard',
            'dashboardTitle' => 'My Dashboard',
            'dashboardType' => 'user',
            'metrics' => [
                ['label' => 'Active Plan', 'value' => 'Starter Placeholder'],
                ['label' => 'Total Deposits', 'value' => '$0.00'],
                ['label' => 'Pending Withdrawals', 'value' => '$0.00'],
            ],
            'tableRows' => [
                ['date' => 'Pending', 'name' => 'No submissions yet', 'email' => 'user@example.com', 'message' => 'Future user activity will be listed here once the backend is connected.'],
            ],
        ]);
    }

    public function admin(): View
    {
        return view('pages.dashboard.admin.index', [
            'pageTitle' => 'Admin Dashboard',
            'dashboardTitle' => 'Admin Dashboard',
            'dashboardType' => 'admin',
            'metrics' => [
                ['label' => 'Users', 'value' => '0'],
                ['label' => 'Open Tickets', 'value' => '0'],
                ['label' => 'Pending Reviews', 'value' => '0'],
            ],
            'tableRows' => [
                ['date' => 'Pending', 'name' => 'No admin records yet', 'email' => 'admin@wealthoptions.com', 'message' => 'Future contact submissions, deposits, and audit events can be wired here.'],
            ],
        ]);
    }
}
