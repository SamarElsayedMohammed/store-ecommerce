<x-front.layouts.site-layout>
    <x-front.includes.breadcrumbs pageTitle="Cart" />
    <x-dashboard.layouts.alert type="danger" />
    <x-dashboard.layouts.alert type="success" />

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>

                    </div>
                </div>
                <!-- End Cart List Title -->
                @foreach ($cartItems as $item)
                    <!-- Cart Single List list -->
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="product-details.html"><img src="{{ $item['item_file'] }}" alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="product-details.html">
                                        {{ $item['item_name'] }}</a></h5>
                                <p class="product-des">
                                    <span><em>Type:</em> {{ $item['item_category'] }}</span>
                                    <span><em>Color:</em> Black</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <input type="number" class="cart-quantity" name="quantity"
                                    value="{{ $item['item_quantity'] }}">
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>${{ $item['item_price'] }}</p>
                            </div>
                            @if (isset($item['item_discount_price']))
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>$29.00</p>
                                </div>
                            @else
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>-</p>
                                </div>
                            @endif
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List list -->
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>${{ $totalPrice }}</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$29.00</span></li>
                                        <li class="last">You Pay<span>$2531.00</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('cart.payment', $totalPrice) }}" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

</x-front.layouts.site-layout>
