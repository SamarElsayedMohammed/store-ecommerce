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

                        <div class="card-content collapse show  ">


                            <div class="card-body">
                                <form class="form" action="{{ route('admin.products.images.store.db') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <div class="form-body">

                                        <h4 class="form-section"><i class="ft-home"></i> صور المنتج </h4>
                                        <div class="form-group">
                                            <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
                                            </div>
                                            <br><br>
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

            @if (isset($images) && count($images) > 0)

                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-tooltip">Product Images</h4>
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
                            <div class="card-body" id="products-images">
                                <div class="grid-hover row" id="images">
                                    @foreach ($images as $item)
                                        <div id="image" class="col-md-3 col-4">
                                            <figure class="effect-zoe">
                                                <img style="width:100%;height:150px;"
                                                    src="{{ asset($item->file_name) }}" />
                                                <figcaption>
                                                    <p style="border:1px solid #f5eded !important; background-color:rgb(252, 252, 252)"
                                                        class="icon-links text-center">
                                                        @php
                                                            $product_image = json_encode([
                                                                'image_id' => $item->id,
                                                                'product_id' => $item->Fileable_id,
                                                            ]);
                                                        @endphp
                                                        <a href="#image" id="deleteImageAjax" class="deleteImageAjax"
                                                            data-product="{{ $product_image }}" class="mr-1 "><i
                                                                style="font-size: 30px;" class="ft-trash"></i></a>
                                                    </p>

                                                </figcaption>
                                            </figure>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
    </div>

    </div>
    @push('style')
        <link rel="stylesheet" type="text/css"
            href="{{ asset('dashboard/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('dashboard/app-assets/css' . getFolder() . '/plugins/file-uploaders/dropzone.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('dashboard/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('dashboard/app-assets/css' . getFolder() . '/plugins/file-uploaders/dropzone.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('dashboard/app-assets/vendors/js/vendors.min.js" type="text/javascript') }}"></script>

        <script src="{{ asset('dashboard/app-assets/js/core/app-menu.js" type="text/javascript') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/core/app.js" type="text/javascript') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/scripts/customizer.js" type="text/javascript') }}"></script>
        <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/dropzone.min.js') }}" type="text/javascript">
        </script>

        <script>
            var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", // The name that will be used to transfer the file
                maxFiles: 10,
                maxFilesize: 5, // MB
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
                dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
                dictCancelUpload: "الغاء الرفع ",
                dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
                dictRemoveFile: "حذف الصوره",
                dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }

                ,
                url: "{{ route('admin.products.images.store') }}", // Set the url
                success: function(file, response) {
                    $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                },
                removedfile: function(file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
                    console.log(name);
                    $.ajax({
                        type: 'GET',
                        url: '/admin/products/images/delete/tmp/' + name,
                        // data: '_token = <?php echo csrf_token(); ?>',
                        success: function(data) {
                            // Handle the response from the server
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            // Handle the error
                        }
                    });

                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()

                },
                // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
                init: function() {

                    @if (isset($event) && $event->document)
                        var files =
                            {!! json_encode($event->document) !!}
                        for (var i in files) {
                            var file = files[i]
                            this.options.addedfile.call(this, file)
                            file.previewElement.classList.add('dz-complete')
                            $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                        }
                    @endif
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script>
            $(document).ready(function() {
                $('body').on('click', 'a.deleteImageAjax', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: "{{ Route('admin.products.images.delete.db') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            // 'imageId': $(this).attr('data-id'),
                            'imageProduct': $(this).attr('data-product'),
                        },
                        success: function(data) {
                            $("#image").remove();
                            $("#products-images").load(
                                "{{ Route('admin.products.images.add', $id) }} #images");
                            // location.reload();


                        }
                    });
                });
            });
        </script>

        <script>
            $("a").on("click", function() {

            });
        </script>
    @endpush
</x-dashboard.layouts.admin-layout>
