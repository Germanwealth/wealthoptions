@extends('layouts.app')

@section('content')
    <section class="banner-area" style="background: url({{ asset('assets/web/images/banner/about.jpg') }}) center/cover no-repeat; padding: 120px 0;">
        <div class="container text-center">
            <h1 class="title-light" style="color:#fff;">About Wealth Options</h1>
            <p class="lead" style="color:#fff; opacity:.9;">Simple and secured crypto investment options.</p>
        </div>
    </section>

    <section class="ts-intro" id="about-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="column-title"><span>Who We Are</span> Our Story</h2>
                    <p>Wealth Options was established in 2012 by a group of experienced traders and analysts. We focus on transparent strategies and user-friendly experiences designed to help clients grow and manage their investments responsibly.</p>
                    <p>Our platform prioritizes security of funds, clear reporting, and support you can rely on. We continuously improve our tools and education to empower both new and experienced investors.</p>
                </div>
                <div class="col-lg-5">
                    <div class="intro-image-box">
                        <img src="{{ asset('assets/web/images/about.png') }}" class="img-fluid" alt="About Wealth Options" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
