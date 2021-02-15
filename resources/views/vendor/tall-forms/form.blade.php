@if($beforeFormView)
    @include($beforeFormView)
@endif
<x-tall-form :onKeyDownEnter="$onKeyDownEnter" :attr="\Tanthammar\TallForms\ConfigAttr::key('form')">
    @include('tall-forms::includes.form-head')
    @if(isset($isTabs) && $isTabs)
        @include('tall-forms::fields.tabs')
    @else
        @include('tall-forms::includes.field-loop')
    @endif
    @include('tall-forms::includes.form-footer')
</x-tall-form>
@if($afterFormView)
    @include($afterFormView)
@endif
