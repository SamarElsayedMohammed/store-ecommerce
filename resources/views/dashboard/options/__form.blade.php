{{-- <div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i> Attribute Data</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="attribute-name" name="name"
                    placeholder="Attribute name" id="attribute-name" label='true' labelName='Name'
                    value="{{ $attribute->name }}" required />
            </div>
        </div>


    </div>
</div> --}}
<div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i> الخصائص</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="option-name" name="name"
                    placeholder="Attribute name" id="option-name" label='true' labelName='Name'
                    value="{{ $option->name }}" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="number" class="form-control" id="price-price" name="price"
                    placeholder="option price" id="price-price" label='true' labelName='price'
                    value="{{ $option->price }}" required />
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">

                <x-form.select class="form-control select2" name="product_id" id="category-parent-id" label='options'
                    labelName='options' label="true" :options="$products" selected="{{ $option->product_id }}" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.select class="form-control select2" name="attribute_id" id="attribute_id" label='Attributes'
                    labelName='Attributes' label="true" :options="$attributes" selected="{{ $option->attribute_id }}" />
            </div>
        </div>

    </div>

</div>

@push('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('dashboard/app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript">
    </script>
@endpush
