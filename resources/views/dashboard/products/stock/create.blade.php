<x-dashboard.layouts.admin-layout title="Shipping Method">

    <x-dashboard.layouts.breadcrumb page="Edit" pageTitle="Shipping Method">

        <x-slot:links>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="#"><i class="lni lni-home"></i>Products</a></li>
        </x-slot:links>

    </x-dashboard.layouts.breadcrumb>

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip">Create New Product</h4>
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
                                <form class="form" action="{{ route('admin.products.stock.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <div class="form-body">

                                        <h4 class="form-section"><i class="ft-home"></i> اداره المستودع </h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> كود المنتج
                                                    </label>
                                                    <input type="text" id="sku" class="form-control"
                                                        placeholder="  " value="{{ old('sku') }}" name="sku">
                                                    @error('sku')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">تتبع المستودع
                                                    </label>
                                                    <select name="manage_stock" class="select2 form-control"
                                                        id="manageStock">
                                                        <optgroup label="من فضلك أختر النوع ">
                                                            <option value="1">اتاحة التتبع</option>
                                                            <option value="0" selected>عدم اتاحه التتبع</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('manage_stock')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- QTY  -->



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">حالة المنتج
                                                    </label>
                                                    <select name="in_stock" class="select2 form-control">
                                                        <optgroup label="من فضلك أختر  ">
                                                            <option value="1">متاح</option>
                                                            <option value="0">غير متاح </option>
                                                        </optgroup>
                                                    </select>
                                                    @error('in_stock')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6" style="display:none" id="qtyDiv">
                                                <div class="form-group">
                                                    <label for="projectinput1">الكمية
                                                    </label>
                                                    <input type="text" id="sku" class="form-control"
                                                        placeholder="  " value="{{ old('qty') }}" name="qty">
                                                    @error('qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>




                                    </div>


                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                            <i class="ft-x"></i> تراجع
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> تحديث
                                        </button>
                                    </div>


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
        <script>
            $(document).on('change', '#manageStock', function() {
                if ($(this).val() == 1) {
                    $('#qtyDiv').show();
                } else {
                    $('#qtyDiv').hide();
                }
            });
        </script>
        <script src="{{ asset('dashboard/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('dashboard/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('dashboard/app-assets/js/scripts/forms/switch.js') }}" type="text/javascript"></script>
    @endpush
</x-dashboard.layouts.admin-layout>
