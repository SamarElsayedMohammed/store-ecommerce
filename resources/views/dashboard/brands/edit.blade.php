<x-dashboard.layouts.admin-layout title="Shipping Method">

    <x-dashboard.layouts.breadcrumb page="Edit" pageTitle="Shipping Method">

        <x-slot:links>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i>Brands </a></li>
        </x-slot:links>

    </x-dashboard.layouts.breadcrumb>

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip">Edit:" {{ $brand->name }} "</h4>
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


                            <div class="card-body">
                                <form class="form" action="{{ route('admin.brands.update', $brand->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <div class="text-center">
                                            <img src="@imagePath($brand->image_path)" class="rounded-circle  height-250"
                                                alt="صورة القسم  ">
                                        </div>
                                    </div>

                                    <x-form.input name="id" value="{{ $brand->id }}" type="hidden" />

                                    @include('dashboard.brands.__form')


                                    <x-form.form-actions name="update" />

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('style')
        <link rel="stylesheet" type="text/css"
            href="{{ asset('dashboard/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('dashboard/app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/switch.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('dashboard/app-assets/css/core/colors/palette-switch.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('dashboard/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('dashboard/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('dashboard/app-assets/js/scripts/forms/switch.js') }}" type="text/javascript"></script>
    @endpush
</x-dashboard.layouts.admin-layout>
