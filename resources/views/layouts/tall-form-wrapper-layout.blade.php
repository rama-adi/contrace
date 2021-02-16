@push('styles')
    <meta name="turbo-visit-control" content="reload">
@endpush
<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6 mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900"> {{ $formTitle ?? null }}</h3>

            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                <div class="px-4 py-5 sm:p-6">
                    @include('tall-forms::form')
                </div>
                <div class="px-4 py-4 sm:px-6">
                    @include('tall-forms::includes.buttons-root')
                </div>
            </div>
        </div>
    </div>
</div>
@if(optional($model)->exists && Route::is('locations.edit'))
    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <livewire:actions.delete-location :location="$model"/>
@endif
