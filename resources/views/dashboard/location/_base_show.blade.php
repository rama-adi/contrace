<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('location_title')
        </h2>
    </x-slot>

    <article class="-my-4 sm:-mx-6 lg:-mx-8 -mt-10">
        <!-- Profile header -->
        <div>
            <div>
                <img class="h-32 w-full object-cover lg:h-48"
                     src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($location->banner)}}"
                     alt="">
            </div>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                    <div class="flex">
                        <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                             src="{{\Illuminate\Support\Facades\Storage::disk('public')->url($location->icon)}}"
                             alt="">
                    </div>
                    <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                        <div class="sm:hidden 2xl:block mt-6 min-w-0 flex-1">
                            <h1 class="text-2xl font-bold text-gray-900 truncate">
                                {{$location->name}}
                            </h1>
                        </div>
                        <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <a href="{{route('locations.edit', ['location' => $location->id])}}"
                               class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <x-heroicon-o-pencil class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
                                <span>Edit</span>
                            </a>

                            <a href="{{route('locations.edit', ['location' => $location->id])}}"
                               class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <x-heroicon-o-table class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
                                <span>Export Excel</span>
                            </a>

                            <livewire:ui.share-location :location="$location" :team="\Illuminate\Support\Facades\Auth::user()->currentTeam"/>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block 2xl:hidden mt-6 min-w-0 flex-1">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                        {{$location->name}}
                    </h1>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <a href="{{ Route::is('locations.show') ? '#' : route('locations.show', ['location' => $location]) }}"
                           class="{{Route::is('locations.show') ? 'border-blue-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm'}}"
                           aria-current="page">
                            Informasi
                        </a>
                        <a href="{{ Route::is('locations.visitation') ? '#' : route('locations.visitation', ['location' => $location]) }}"
                           class="{{Route::is('locations.visitation') ? 'border-blue-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm'}}"
                           aria-current="page">
                            Daftar kunjungan
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="mt-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('location_content')
        </div>
    </article>
</x-app-layout>

