<div class="col-lg-4 col-md-6 col-12">

    <div class="single-product">
        <div class="product-image">
            <img width="335px" height="200px" src="@imagePath($product->file[0]->file_name)" alt="#">
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">
                <div class="button">
                    <button type="submit" class="btn"><i class="lni lni-cart"></i> Add to Cart</button>
                </div>
            </form>
        </div>
        <div class="product-info">
            <span class="category">Watches</span>
            <h4 class="title">
                <a href="{{ route('products.details', $product->slug) }}">{{ $product->name }}</a>
            </h4>

            <div class="price">
                <span>{{ $product->price }}</span>
            </div>
        </div>
    </div>

</div>
