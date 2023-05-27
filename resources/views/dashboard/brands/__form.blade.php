<div class="form-group">

    <x-form.input type="file" class="form-control file center-block" id="brand-image" name="photo"
        placeholder="brand photo" label='true' labelName='Photo' />
</div>

<div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i> Brand Data</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="brand-name" name="name"
                    placeholder="brand name" id="brand-name" label='true' labelName='Name' value="{{ $brand->name }}"
                    required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="brand-slug" name="slug"
                    placeholder="brand slug" id="brand-slug" label='true' labelName='slug' value="{{ $brand->slug }}"
                    required />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="form-group mt-1">

                <x-form.radio class="form-control" name="is_active" placeholder="brand slug" id="brand-active"
                    label='Activation' labelName='Activation' value="{{ $brand->is_active }}" label="true" />
            </div>
        </div>
    </div>
</div>
