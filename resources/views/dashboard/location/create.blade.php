<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lokasi baru
        </h2>
    </x-slot>
    <livewire:forms.location-form/>
    {{Storage::disk('public')->url('')}}
</x-app-layout>
