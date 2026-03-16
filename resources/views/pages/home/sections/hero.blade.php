<div class="carousel slide" id="main-slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slides as $index => $slide)
            <li class="{{ $index === 0 ? 'active' : '' }}" data-target="#main-slide" data-slide-to="{{ $index }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach($slides as $index => $slide)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="background-image:url({{ asset($slide['background']) }});">
                <div class="container">
                    <div class="slider-content text-center">
                        <div class="col-md-12">
                            <h2 class="slide-title title-light">{{ $slide['title'] }}</h2>
                            <h3 class="slide-sub-title">{{ $slide['subtitle'] }}</h3>
                            <p class="slider-description lead">{{ $slide['description'] }}</p>
                            <p>
                                @foreach($slide['actions'] as $action)
                                    <a class="{{ $action['class'] }}" href="{{ route($action['route']) }}">{{ $action['label'] }}</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a class="left carousel-control carousel-control-prev" href="#main-slide" data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
    <a class="right carousel-control carousel-control-next" href="#main-slide" data-slide="next"><span><i class="fa fa-angle-right"></i></span></a>
</div>
