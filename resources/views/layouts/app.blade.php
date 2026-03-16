<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ $metaDescription ?? 'Wealth Options investment and trading platform.' }}">
    <title>{{ $pageTitle ?? 'Wealth Options' }} | Wealth Options</title>
    <link rel="icon" href="{{ asset('assets/images/logo.svg') }}" type="image/svg+xml">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/icon-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    @stack('styles')
</head>
<body>
    <div class="body-inner">
        @if(($showTopbar ?? false) === true)
            @include('partials.topbar')
        @endif

        @include('partials.header', ['showSearch' => $showSearch ?? false])

        @include('partials.flash')

        @yield('content')

        @include('partials.footer', ['footerVariant' => $footerVariant ?? 'full'])
    </div>

    @include('partials.scripts')
    @stack('scripts')
</body>
</html>
