<section id="ts-testimonial-slide" class="ts-testimonial-slide">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-slide owl-carousel owl-theme">
                    @foreach($testimonials as $testimonial)
                        <div class="row quote-item-area">
                            <div class="col-md-5">
                                <div class="quote-thumb">
                                    <img class="quote-thumb-img" src="{{ asset($testimonial['image']) }}" alt="{{ $testimonial['name'] }}" loading="lazy">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="quote-item-content">
                                    <h3 class="quote-name">{{ $testimonial['name'] }}</h3>
                                    <span class="quote-name-desg">{{ $testimonial['role'] }}</span>
                                    <p class="quote-message">{{ $testimonial['message'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="investments">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="title_dark">
                    <span class="animation" data-animation="fadeInUp" data-animation-delay="0.1s">Investment Plans</span>
                    <h2 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Our Plans</h2>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.3s">Each of our investment plans is designed to serve different levels of investors.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($plans as $plan)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="plans-wrapper">
                        <div class="percent">
                            <span>{{ $plan['percent'] }}</span>
                        </div>
                        <div class="plan-details">
                            <h5>{{ $plan['name'] }}</h5>
                            <div class="min-max"><b>Min:</b> <span>{{ $plan['min'] }}</span>&nbsp;&nbsp;<b>Max:</b> <span>{{ $plan['max'] }}</span></div>
                            <div class="min-max"><b>Principal</b> <span>Included</span>&nbsp;&nbsp;<br><b>Instant</b> <span>Withdraw</span></div>
                            <a class="btn btn-gradient" href="{{ route('register') }}">INVEST NOW</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
