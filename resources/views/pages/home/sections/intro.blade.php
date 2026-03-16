<section class="ts-intro" id="ts-intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="column-title"><span>Wealth Options</span> We aim to provide expert advice and quality services.</h2>
                <p class="intro-desc">
                    Wealth Options was established since 2012 by a group of talented traders, agents and dealers. Today, we continue growing our trading strategies so each trader on our platform gets optimal satisfaction.
                </p>
                <p>
                    Wealth Options is aiming at bringing back the feeling of defined benefits, and the financial peace of mind that goes with it.
                </p>
                <div class="gap-40"></div>
                <div class="row facts-wrapper text-center">
                    @foreach($facts as $fact)
                        <div class="col-md-4">
                            <div class="ts-facts">
                                <span class="facts-icon"><i class="icon {{ $fact['icon'] }}"></i></span>
                                <div class="ts-facts-content">
                                    <h4 class="ts-facts-num"><span class="counterUp">{{ $fact['value'] }}</span></h4>
                                    <p class="facts-desc">{{ $fact['label'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5">
                <div class="intro-image-box">
                    <img class="img-fluid" src="{{ asset('assets/web/images/intro-img.jpg') }}" alt="Introduction" loading="lazy">
                    <div class="intro-image-content">
                        <h3>25</h3>
                        <p>Years <br> Trading Experience</p>
                    </div>
                    <div class="intro-shape"></div>
                </div>
            </div>
        </div>
    </div>
</section>
