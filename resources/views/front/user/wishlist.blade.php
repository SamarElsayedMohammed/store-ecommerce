<x-front.layouts.site-layout title='WishList Page'>
    <x-front.includes.breadcrumbs pageTitle="Whishlist" />

    <!-- Shopping Cart -->
    <div class="shopping-cart section mt-0" id="total-whishlist-items">
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
                @foreach ($products as $item)
                    <!-- Cart Single List list -->
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="product-details.html"><img src="@imagePath($item->file[0]->file_name)" alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="product-details.html">
                                        {{ $item->name }}</a></h5>
                                <p class="product-des">
                                    <span><em>Type:</em> Mirrorless</span>
                                    <span><em>Color:</em> Black</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ $item->price }}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>$29.00</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item deleteFromWishlist" data-product-id="{{ $item->id }}""
                                    href="javascript:void(0)"><i class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List list -->
                @endforeach
            </div>

        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script>
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
                            $(".shopping-cart").load(
                                "{{ Route('wishlist.products.index') }} #total-whishlist-items");

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
    <!--/ End Shopping Cart -->
</x-front.layouts.site-layout>
