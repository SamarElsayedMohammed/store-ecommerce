@props(['selected'])
<x-form.select class="form-control" name="brand_id" id="category-parent-id" label='Brands' labelName='Brands'
    label="true" :options="$brands" selected="{{ $selected }}" />