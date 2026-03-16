<section class="ts-services solid-bg" id="ts-services">
    <div class="container">
        <div class="row text-left">
            <div class="col-lg-12">
                <h2 class="section-title border-title-left">
                    Our Products
                    <span class="section-title-tagline title-light">Here at Wealth Options, we provide you with the best possible opportunities to trade.</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($products as $product)
                            <li class="nav-item">
                                <a class="nav-link animated fadeIn {{ $product['active'] ? 'active' : '' }}" href="#{{ $product['id'] }}" data-toggle="tab">
                                    <span class="tab-head">
                                        <span><i class="icon {{ $product['icon'] }}"></i></span>
                                        <span class="tab-text-title">{{ $product['tab'] }}</span>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($products as $product)
                            <div class="tab-pane animated fadeInRight {{ $product['active'] ? 'active' : '' }}" id="{{ $product['id'] }}">
                                <div class="row">
                                    @if($product['image_first'])
                                        <div class="col-lg-4 align-self-center">
                                            <div class="bg-contain-verticle" style="background-image:url({{ asset('assets/web/images/tabs/tab-shape.png') }});">
                                                <img class="img-center img-fluid" src="{{ asset($product['image']) }}" alt="{{ $product['tab'] }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-8">
                                        <div class="tab-content-info">
                                            <h3 class="tab-content-title">{{ $product['title'] }}</h3>
                                            @foreach($product['description'] as $paragraph)
                                                <p>{{ $paragraph }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if(!$product['image_first'])
                                        <div class="col-lg-4 align-self-center">
                                            <div class="bg-contain-verticle" style="background-image:url({{ asset('assets/web/images/tabs/tab-shape.png') }});">
                                                <img class="img-center img-fluid" src="{{ asset($product['image']) }}" alt="{{ $product['tab'] }}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="gap-60"></div>
                    <div class="text-center"><a class="btn btn-primary" href="{{ route('register') }}">Create free account</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
