<div x-data="{
    false,
    field: @entangle($field->key),
    null,
    searchInput: @entangle($field->searchKey)}
">
    <x-tall-search
        :field="$field"
        :options="$field->options"
    />
</div>

