    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img width="100px" height="170px" src="@imagePath($item->file[0]->file_name)" alt="#">
                                <div class="button">
                                    <a class="addToWishlist  btn" href="#"
                                        data-product-id="{{ $item->id }}"><i class="lni lni-cart"></i> Add to
                                        wishlist</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{ $item->categories[0]->name ?? 'main' }}</span>
                                <h4 class="title">
                                    <a href="product-grids.html">{{ $item->name }}</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>{{ $item->price }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
