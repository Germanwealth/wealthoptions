<div class="row align-items-center product-tab-row">
    @if($product['image_first'])
        <div class="col-lg-4 align-self-center product-tab-media-col">
            <div class="bg-contain-verticle product-tab-media" style="background-image:url({{ asset('assets/web/images/tabs/tab-shape.png') }});">
                <img class="img-center img-fluid" src="{{ asset($product['image']) }}" alt="{{ $product['tab'] }}">
            </div>
        </div>
    @endif
    <div class="col-lg-8 product-tab-copy-col">
        <div class="tab-content-info product-tab-copy">
            <h3 class="tab-content-title">{{ $product['title'] }}</h3>
            @foreach($product['description'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </div>
    @if(!$product['image_first'])
        <div class="col-lg-4 align-self-center product-tab-media-col">
            <div class="bg-contain-verticle product-tab-media" style="background-image:url({{ asset('assets/web/images/tabs/tab-shape.png') }});">
                <img class="img-center img-fluid" src="{{ asset($product['image']) }}" alt="{{ $product['tab'] }}">
            </div>
        </div>
    @endif
</div>
