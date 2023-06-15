<div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i> Tag Data</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="tag-name" name="name" placeholder="tag name"
                    id="tag-name" label='true' labelName='Name' value="{{ $tag->name }}" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="tag-slug" name="slug" placeholder="tag slug"
                    id="tag-slug" label='true' labelName='slug' value="{{ $tag->slug }}" required />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="form-group mt-1">

                <x-form.radio class="form-control" name="is_active" placeholder="brand slug" id="tag-active"
                    label='Activation' labelName='Activation' value="{{ $tag->is_active }}" label="true" />
            </div>
        </div>
    </div>
</div>
