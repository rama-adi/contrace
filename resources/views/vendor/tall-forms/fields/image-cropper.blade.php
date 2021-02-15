<x-tall-image-cropper
    :field="$field"
    :image-url="filled(data_get($this, $field->key)) ? Storage::disk('public')->url(data_get($this, $field->key)) : ''"
/>
