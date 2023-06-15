<div class="whishlist-items  mr-5" style="margin-right: 5px;" id="total-items-whishlist">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-heart"></i>
        <span class="total-items">{{ $count }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="whishlist-item">
        <div class="dropdown-whishlist-header">
            <span>2 Items</span>
            <a href="cart.html">View Cart</a>
        </div>
        <ul class="whishlist-list">
            @foreach ($wish_list as $item)
                <li>
                    <a href="javascript:void(0)" class="remove deleteFromWishlist" data-product-id="{{ $item->id }}"
                        title="Remove this item"><i class="lni lni-close"></i></a>
                    <div class="whishlist-img-head">
                        <a class="whishlist-img" href="product-details.html"><img src="@imagePath($item->file[0]->file_name)"
                                alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="product-details.html">
                                {{ $item->name }}</a></h4>
                        <p class="quantity">1x - <span class="amount">${{ $item->price }}</span></p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">${{ $total }}</span>
            </div>
            <div class="button">
                <a href="checkout.html" class="btn animate">clear whishlist</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', 'a.addToWishlist', function(e) {
                $.ajax({
                    type: 'post',
                    url: "{{ Route('wishlist.store') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        // 'imageId': $(this).attr('data-id'),
                        'productId': $(this).attr('data-product-id'),
                    },
                    success: function(data) {
                        $(".whishlist-items").load(
                            "{{ Route('front.home') }} #total-items-whishlist");

                        if (data.wished)
                            $('.alert-modal').css('display', 'block');
                        else
                            $('.alert-modal2').css('display', 'block');


                    }
                });
            });
        });

        $(document).ready(function() {
            $('body').on('click', 'a.deleteFromWishlist', function(e) {
                $.ajax({
                    type: 'post',
                    url: "{{ Route('wishlist.destroy') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        // 'imageId': $(this).attr('data-id'),
                        'productId': $(this).attr('data-product-id'),
                    },
                    success: function(data) {
                        $(".whishlist-items").load(
                            "{{ Route('front.home') }} #total-items-whishlist");

                        if (data.wished)
                            $('.alert-modal').css('display', 'block');
                        else
                            $('.alert-modal2').css('display', 'block');


                    }
                });
            });
        });
    </script>
@endpush
