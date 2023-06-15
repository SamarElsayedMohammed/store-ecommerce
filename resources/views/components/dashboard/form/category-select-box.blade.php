@props(['selected'])
<x-form.select class="form-control" name="parent_id" id="category-parent-id" label='Category' labelName='Category'
    label="true" :options="$parents" selected="{{ $selected }}" />
