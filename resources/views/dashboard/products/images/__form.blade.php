<div class="form-group">

    <x-form.input type="file" class="form-control file center-block" id="product-image" name="photo"
        placeholder="product photo" label='true' labelName='Photo' />
</div>

<div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i> Product Data</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="product-name" name="name"
                    placeholder="product name" id="product-name" label='true' labelName='Name'
                    value="{{ $product->name }}" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="product-slug" name="slug"
                    placeholder="product slug" id="product-slug" label='true' labelName='slug'
                    value="{{ $product->slug }}" required />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.textarea class="form-control" id="product-description" name="description"
                    placeholder="product description" id="product-description" label='true' labelName='Description'
                    value="{{ $product->description }}" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.textarea class="form-control" id="product-short-description" name="short-description"
                    placeholder="product short description" id="product-short-description" label='true'
                    labelName=' Short Description' value="{{ $product->short_description }}" required />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="form-group mt-1">

                <x-form.radio class="form-control" name="is_active" placeholder="product slug" id="product-active"
                    label='Activation' labelName='Activation' value="{{ $product->is_active }}" label="true" />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="form-group mt-1">

            <x-dashboard.form.category-tag-select-box />

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="form-group mt-1">

            <x-dashboard.form.product-tags-select-box />

        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">

            <div class="form-group mt-1">
                {{-- @dd($parents->toarray()) --}}
                <x-dashboard.form.category-select-box  selected="{{$product->brand_id}}"/>
            </div>
        </div>
    </div>
</div>
