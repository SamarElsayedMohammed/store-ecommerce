@props([
   'name', 'selected' => '', 'label' => false, 'options','id'=>''
])

@if($label)
<x-form.label for="{{$id}}">{{$name}}</x-form.label>
@endif

<select 
    name="{{ $name }}"
    {{ $attributes->class([
        'form-control',
        'form-select',
        'is-invalid' => $errors->has($name)
    ]) }}
>
    @foreach($options as $value => $text)
    <option value="{{ $value }}" @selected($value == $selected)>{{ $text }}</option>
    @endforeach
</select>

<x-form.validation-feedback :name="$name" />