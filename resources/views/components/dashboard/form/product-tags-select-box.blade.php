<div class="text-bold-600 font-medium-2">
    اختر من فضلك التاجات
</div>
<select name="tags_id[]" class="select2 form-control block" multiple="multiple" id="responsive_multi">
    <optgroup label="اختر من فضلك التاجات">
        @foreach ($tags as $item)
            <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
        @endforeach
    </optgroup>

</select>
{{-- </div> --}}
@push('style')
    <link rel="stylesheet" type="text/css" href={{ asset('dashboard/app-assets/vendors/css/forms/selects/select2.min.css') }}>
@endpush
@push('scripts')
    <script src={{ asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js') }} type="text/javascript">
    </script>
    <script src={{ asset('dashboard/app-assets/js/scripts/forms/select/form-select2.js') }} type="text/javascript"></script>
@endpush
