<div class="form-group">

    <x-form.input type="text" :data-id="$role->id" class="form-control file center-block" id="role-name" name="name"
        placeholder="role name" label='true' labelName='Role Name' value="{{ $role->name }}" />
</div>

<div class="form-body">

    <h4 class="form-section"><i class="ft-home"></i> Role Data</h4>

    <div class="row">
        <div class="col-md-6">

            <div class="form-group mt-1">

                @foreach (config('abilities') as $ability => $label)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $ability }}"
                            @if (in_array($ability, $role->abilities ?? [])) checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
