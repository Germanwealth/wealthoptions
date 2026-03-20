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
                    <div class="d-none d-lg-block">
                        <ul class="nav nav-tabs product-tabs-nav" id="myTab" role="tablist">
                            @foreach($products as $product)
                                <li class="nav-item">
                                    <a class="nav-link product-tab-link animated fadeIn {{ $product['active'] ? 'active' : '' }}" href="#{{ $product['id'] }}" data-toggle="tab">
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
                                <div class="tab-pane product-tab-pane animated fadeInRight {{ $product['active'] ? 'active' : '' }}" id="{{ $product['id'] }}">
                                    @include('pages.home.sections.product_panel', ['product' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="product-accordion d-lg-none" id="productAccordion">
                        @foreach($products as $index => $product)
                            <div class="product-accordion-item">
                                <button
                                    class="product-accordion-trigger {{ $index === 0 ? '' : 'collapsed' }}"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#mobile-{{ $product['id'] }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="mobile-{{ $product['id'] }}"
                                >
                                    <span class="product-accordion-head">
                                        <span class="product-accordion-icon"><i class="icon {{ $product['icon'] }}"></i></span>
                                        <span class="product-accordion-title">{{ $product['tab'] }}</span>
                                    </span>
                                    <span class="product-accordion-arrow"><i class="fa fa-angle-down"></i></span>
                                </button>
                                <div
                                    id="mobile-{{ $product['id'] }}"
                                    class="collapse {{ $index === 0 ? 'show' : '' }}"
                                    data-parent="#productAccordion"
                                >
                                    <div class="product-accordion-body">
                                        @include('pages.home.sections.product_panel', ['product' => $product])
                                    </div>
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
