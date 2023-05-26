<div class="form-group">

    <x-form.input type="file" class="form-control file center-block" id="category-image" name="photo"
        placeholder="category photo" label='true' labelName='Photo' />
</div>

<div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="category-name" name="name"
                    placeholder="category name" id="category-name" label='true' labelName='Name' value="{{$category->name}}" required />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <x-form.input type="text" class="form-control" id="category-slug" name="slug"
                    placeholder="category slug" id="category-slug" label='true' labelName='slug' value="{{$category->slug}}" required />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="form-group mt-1">

                <x-form.radio class="form-control" name="is_active" placeholder="category slug" id="category-active"
                    label='Activation' labelName='Activation' value="{{$category->is_active}}" label="true" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="form-group mt-1">
                {{-- @dd($parents->toarray()) --}}
                <x-dashboard.form.category-select-box  selected="{{$category->parent_id}}"/>
            </div>
        </div>
    </div>
</div>

