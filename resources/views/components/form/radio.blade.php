@props(['name', 'options', 'checked' => '1', 'label' => false, 'id' => '', 'value'=>"0", 'labelName'])

@if ($label)
    <x-form.label id="{{ $id }}">{{ $labelName }}</x-form.label>
@endif

<input type="checkbox" name="{{ $name }}" value="{{ $checked }}" id="{{ $id }}" class="switchery"
    data-color="success" @checked(old($name, $checked) == old($name, $value))
    {{ $attributes->class(['form-check-input', 'is-invalid' => $errors->has($name)]) }} />
<x-form.error-feedback :name="$name" />
