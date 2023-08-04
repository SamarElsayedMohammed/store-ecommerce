    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            @foreach ($upper_slider->file as $item)
                                <!-- Start Single Slider -->
                                <div class="single-slider"
                                    style="background-image: url({{asset($item->file_name)}});">
                                    <div class="content">
                                        <h2><span>Big Sale Offer</span>
                                            Get the Best Deal on CCTV Camera
                                        </h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                            incididunt ut
                                            labore dolore magna aliqua.</p>
                                        <h3><span>Combo Only:</span> $590.00</h3>
                                        <div class="button">
                                            <a href="product-grids.html" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('https://via.placeholder.com/370x250');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->