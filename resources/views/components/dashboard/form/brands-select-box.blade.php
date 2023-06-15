@props(['selected'])
<x-form.select class="form-control select2" name="brand_id" id="category-parent-id" label='Brands' labelName='Brands'
    label="true" :options="$brands" selected="{{ $selected }}" />
