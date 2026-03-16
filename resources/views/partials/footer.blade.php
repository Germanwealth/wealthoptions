@php($variant = $footerVariant ?? 'full')
<footer class="footer" id="footer">
    @if($variant === 'full')
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-bg row">
                    <div class="col-lg-4 footer-box">
                        <i class="icon icon-map-marker2"></i>
                        <div class="footer-box-content">
                            <h3>London Office</h3>
                            <p>12 ST. GRGS EN SW19 4BD</p>
                        </div>
                    </div>
                    <div class="col-lg-4 footer-box">
                        <i class="icon icon-phone3"></i>
                        <div class="footer-box-content">
                            <h3>Call Us</h3>
                            <p>+18122005740</p>
                        </div>
                    </div>
                    <div class="col-lg-4 footer-box">
                        <i class="icon icon-envelope"></i>
                        <div class="footer-box-content">
                            <h3>Mail Us</h3>
                            <p><a href="mailto:support@wealthoptions.com">support@wealthoptions.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="footer-main bg-overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 footer-widget footer-about">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="Wealth Options">
                        </a>
                    </div>
                    <p>Here at Wealth Options, we provide you with the best possible opportunities to earn from trade deposits and withdraw at your leisure.</p>
                    @if($variant === 'full')
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-md-12 footer-widget">
                    <h3 class="widget-title">My Account</h3>
                    <ul class="list-dash">
                        <li><a href="{{ route('register') }}">Create Account</a></li>
                        <li><a href="{{ route('login') }}">Sign In</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 footer-widget">
                    @if($variant === 'full')
                        <h3 class="widget-title">Subscribe</h3>
                        <div class="newsletter-introtext">Don’t miss to subscribe to our new feeds, kindly fill the form below.</div>
                        <form class="newsletter-form" action="#" method="post">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="email" placeholder="Email Address" autocomplete="off">
                                <button class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                            </div>
                        </form>
                    @else
                        <h3 class="widget-title">Pages</h3>
                        <ul class="list-dash">
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        @if($variant === 'full')
            <div class="container mb-2">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <small>
                            Wealth Options provides a full range of investment services and products, including Trade Wealth Bot Trading accounts.
                            Access to electronic services may be limited during peak demand, volatility, upgrades, or maintenance windows.
                        </small>
                    </div>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="copyright-info">
                        <span>Copyright © {{ now()->year }} Wealth Options. All Rights Reserved.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="footer-menu">
                        <ul class="nav unstyled">
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top affix" id="back-to-top" data-spy="affix" data-offset-top="10">
    <button class="btn btn-primary" title="Back to Top">
        <i class="fa fa-angle-double-up"></i>
    </button>
</div>
