<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{ $total }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $total }} Items</span>
            <a href="{{ route('cart.index') }}">View Cart</a>
        </div>
        <ul class="shopping-list">
            @foreach ($items as $index => $item)
                <li>
                    <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                            class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img" href="product-details.html"><img src="{{ $item['item_file'] }}"
                                alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="product-details.html">
                                {{ $item['item_name'] }}</a></h4>
                        <p class="quantity">{{ $item['item_quantity'] }}x - <span
                                class="amount">${{ $item['item_price'] }}</span></p>
                    </div>
                </li>
                @if ($index == 2)
                @break
            @endif
        @endforeach


    </ul>
    <div class="bottom">
        <div class="total">
            <span>Total</span>
            <span class="total-amount">${{ $totalPrice }}</span>
        </div>
        <div class="button">
            <a href="checkout.html" class="btn animate">Checkout</a>
        </div>
    </div>
</div>
<!--/ End Shopping Item -->
</div>
