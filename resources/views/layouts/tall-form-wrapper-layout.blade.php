<div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ $formTitle ?? null }}
        </h3>
    </div>
    <div class="px-4 py-5 sm:p-6">
        @include('tall-forms::form')
    </div>
    <div class="px-4 py-4 sm:px-6">
        @include('tall-forms::includes.buttons-root')
    </div>
</div>
