<x-dashboard.layouts.admin-layout title="Shipping Method">

    <x-dashboard.layouts.breadcrumb page="Edit" pageTitle="Brands">

        <x-slot:links>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i>Products </a></li>
        </x-slot:links>

    </x-dashboard.layouts.breadcrumb>

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip">Show Products</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <x-dashboard.layouts.alert type="danger" />
                        <x-dashboard.layouts.alert type="success" />

                        <div class="card-content collapse show ">

                            <div class="table-responsive card-body card-dashboard">
                                <table class="table display nowrap table-striped table-bordered scroll-horizontal">

                                    <thead class="">
                                        <tr>
                                            <th>الاسم </th>
                                            <th> الاسم بالرابط </th>
                                            <th>الحالة</th>
                                            <th>السعر</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @isset($products)
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->slug }}</td>
                                                    <td>{{ $product->getActive() }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('admin.products.prices.create', $product->id) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">السعر</a>

                                                            <a href="{{ route('admin.products.images.add', $product->id) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">الصور</a>

                                                            <a href="{{ route('admin.products.stock.create', $product->id) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">المستودع</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</x-dashboard.layouts.admin-layout>
