<section class="ts-featured-cases">
    <div class="container">
        <div class="section-title-vertical">
            <h2 class="section-title">Your Guaarantee</h2>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme featured-cases-slide" id="featured-cases-slide">
                @foreach($guarantees as $item)
                    <div class="item">
                        <div class="featured-projects-content">
                            <div class="featured-projects-text float-left">
                                <h2 class="column-title"><span>{{ $item['title'] }}</span> {{ $item['subtitle'] }}</h2>
                                <p class="intro-desc">{{ $item['description'] }}</p>
                                <p><a class="btn btn-primary" href="{{ route('register') }}">Create free account</a></p>
                            </div>
                            <div class="features-slider-img float-right">
                                <img class="img-fluid" src="{{ asset($item['image']) }}" alt="{{ $item['alt'] }}" loading="lazy">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
