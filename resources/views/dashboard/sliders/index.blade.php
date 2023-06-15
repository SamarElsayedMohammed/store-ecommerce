<x-dashboard.layouts.admin-layout title="Shipping Method">

    <x-dashboard.layouts.breadcrumb page="Edit" pageTitle="Brands">

        <x-slot:links>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i>Brands </a></li>
        </x-slot:links>

    </x-dashboard.layouts.breadcrumb>

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip">Show Brands</h4>
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
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Activation</th>
                                            <th>Image</th>
                                            <th>Controls</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @isset($brands)
                                            @foreach ($brands as $brand)
                                                <tr>
                                                    <td>{{ $brand->name }}</td>
                                                    <td>{{ $brand->slug }}</td>
                                                    <td>{{ $brand->getActive() }}</td>
                                                    <td>
                                                        <img style="width: 150px; height: 100px;" src="@imagePath( $brand->image_path)">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                                            class="btn btn-outline-primary m-1 "><i
                                                                class="la la-edit"></i></a>
                                                        <a href="{{ route('admin.brands.delete', $brand->id) }}"
                                                            class="btn btn-outline-danger m-1 "><i
                                                                class="la la-trash-o"></i></a>
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
