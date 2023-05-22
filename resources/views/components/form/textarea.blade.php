@props([
    'name', 'value' => '', 'label' => false,'id'=>''
])

@if($label)
<x-form.label for="{{$id}}">{{$name}}</x-form.label>
@endif

<textarea 
    name="{{ $name }}"
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ]) }}
>{{ old($name, $value) }}</textarea>

<x-form.validation-feedback :name="$name" />