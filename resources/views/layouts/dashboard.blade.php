<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{ $pageTitle ?? 'Dashboard' }} | Wealth Options</title>
    <link rel="icon" href="{{ asset('assets/images/logo.svg') }}" type="image/svg+xml">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/icon-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body class="dashboard-shell">
    <div class="dashboard-app">
        @include('partials.dashboard.sidebar')

        <div class="dashboard-main">
            @include('partials.dashboard.topbar')
            @include('partials.flash')
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/web/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/web/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/custom.js') }}"></script>
</body>
</html>
