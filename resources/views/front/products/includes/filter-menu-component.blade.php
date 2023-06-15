<div class="col-lg-3 col-12">
    <!-- Start Product Sidebar -->
    <div class="product-sidebar">
        <!-- Start Single Widget -->
        <div class="single-widget search">
            <h3>Search Product</h3>
            <form method="GET" action="{{ route('products.Search') }}">
                <input type="text" name="search" placeholder="Search Here...">
                <button type="submit"><i class="lni lni-search-alt"></i></button>
            </form>
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget">
            <h3>All Categories</h3>
            <ul class="list">
                @foreach ($categories as $item)
                    <li>
                        <a href="{{ route('products.index', $item->slug) }}">{{ $item->name }}
                        </a><span>({{ $item->products_count }})</span>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('products.index', 'all') }}">all
                    </a><span>({{ App\Models\Product::count() }})</span>
                </li>

            </ul>
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget range">
            <h3>Price Range</h3>
            <input type="range" class="form-range" name="price" min="{{ $priceRange['min'] }}"
                max="{{ $priceRange['max'] }}" value="10" onchange="rangePrimary.value=value">
            <div class="range-inner">
                <label>$</label>
                <input type="text" id="rangePrimary" placeholder="100" />
            </div>
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget condition">
            <h3>Filter by Price</h3>
            @foreach ($price as $key => $value)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $key }}" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                        {{ $key }} ({{ $value }})
                    </label>
                </div>
            @endforeach
        </div>
        <!-- End Single Widget -->
        <!-- Start Single Widget -->
        <div class="single-widget condition">
            <h3>Filter by Brand</h3>
            @foreach ($brands as $item)
                <div class="form-check">
                    <input class="form-check-input" name="barnd_id[]" type="checkbox" value="{{ $item->id }}"
                        id="flexCheckDefault11">
                    <label class="form-check-label" for="flexCheckDefault11">
                        {{ $item->name }} ({{ $item->products_count }})
                    </label>
                </div>
            @endforeach
        </div>
        <!-- End Single Widget -->
    </div>
    <!-- End Product Sidebar -->
</div>
