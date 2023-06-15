<x-front.layouts.site-layout title='Products'>
    <x-front.includes.breadcrumbs pageTitle="Products" />
    <x-dashboard.layouts.alert type="danger" />
    <x-dashboard.layouts.alert type="success" />
    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">


                <x-front.filter-menu-component />
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" id="sorting">
                                            <option>Popularity</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane show active fade" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div id="myElement" data-value="{{ $slug }}"></div>
                                <div id="product-list" class="row"></div>
                                {{-- <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                <li><a href="javascript:void(0)">1</a></li>
                                                <li class="active"><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)"><i
                                                            class="lni lni-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <!--/ End Pagination -->
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- End Product Grids -->

        @push('scripts')
            <script>
                $(function() {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    var element = document.getElementById('myElement');
                    var slug = element.dataset.value;
                    var url = `/products/` + slug;
                    console.log(url);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {

                            var productList = $('#product-list');

                            $.each(response.data, function(index, product) {
                                productList.append(product.details);
                            });
                        }
                    });
                });
            </script>
        @endpush


</x-front.layouts.site-layout>
