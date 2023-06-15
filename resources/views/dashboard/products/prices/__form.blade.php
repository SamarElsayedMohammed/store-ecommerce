<div class="form-group">

    <x-form.input type="file" class="form-control file center-block" id="product-image" name="photo"
        placeholder="product photo" label='true' labelName='Photo' />
</div>

<div class="form-body">
    <input type="hidden" name="product_id" value="{{ $id }}">
    <h4 class="form-section"><i class="ft-home"></i> Product Price Data</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="product-price" name="price"
                    placeholder="product price" id="product-price" label='true' labelName='Price'
                    value="{{ $product->price }}" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="product-special_price" name="special_price"
                    placeholder="product special price" id="product-special_price" label='true'
                    labelName='special price' value="{{ $product->special_price }}" />
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="date" class="form-control" id="product-special_price_start"
                    name="special_price_start" placeholder="product special_price_start"
                    id="product-special_price_start" label='true' labelName='special_price_start'
                    value="{{ $product->special_price_start }}" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="date" class="form-control" id="product-special_price_end"
                    name="special_price_end" placeholder="product special_price_end" id="product-special_price_end"
                    label='true' labelName='special_price_end' value="{{ $product->special_price_end }}" required />
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

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="projectinput1">نوع السعر
                </label>
                <select name="special_price_type" class="select2 form-control" multiple>
                    <optgroup label="من فضلك أختر النوع ">
                        <option value="percent">precent</option>
                        <option value="fixed">fixed</option>
                    </optgroup>
                </select>
                @error('special_price_type')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>
        </div>


    </div>
    {{-- <div class="row">
        <div class="col-md-12">

            <div class="form-group mt-1">
                @php
                    $option = [['text' => 'percent', 'value' => 'percent'], ['text' => 'fixed', 'value' => 'fixed']];
                    // dd($option );
                @endphp
                <x-form.select class="form-control" name="special_price_type" id="special_price_type"
                    label='special_price_type' labelName='special_price_type' label="true"
                    options="{{$option}}" />
            </div>
        </div>
    </div> --}}

</div>
