<x-menu-item :active="Route::is('dashboard')" href="{{route('dashboard')}}">
    <x-slot name="icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
    </x-slot>
    <x-slot name="title">Home</x-slot>
</x-menu-item>

<x-menu-item :active="Route::is('locations.create')" href="{{route('locations.create')}}">
    <x-slot name="icon">
        <x-heroicon-o-document-add/>
    </x-slot>
    <x-slot name="title">Lokasi baru</x-slot>
</x-menu-item>

<x-menu-item :active="Route::is(['locations.index', 'locations.show', 'location.edit'])" href="{{route('locations.index')}}">
    <x-slot name="icon">
        <x-heroicon-o-location-marker/>
    </x-slot>
    <x-slot name="title">Lokasi</x-slot>
</x-menu-item>

<x-menu-item :active="Route::is('teams.show')" href="{{route('teams.show', ['team' => Auth::user()->currentTeam->id])}}">
    <x-slot name="icon">
        <x-heroicon-o-user-group/>
    </x-slot>
    <x-slot name="title">Pengaturan tim</x-slot>
</x-menu-item>

<x-menu-item :active="Route::is('teams.create')" href="{{route('teams.create')}}">
    <x-slot name="icon">
        <x-heroicon-o-view-grid-add/>
    </x-slot>
    <x-slot name="title">Tim baru</x-slot>
</x-menu-item>

<x-menu-item :active="Route::is('profile.show')" href="{{route('profile.show')}}">
    <x-slot name="icon">
        <x-heroicon-o-cog/>
    </x-slot>
    <x-slot name="title">Pengaturan</x-slot>
</x-menu-item>
