
@extends('layouts.guest-full')
@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white overflow-hidden shadow lg:my-4 lg:rounded-md">
            <article>
                <!-- Profile header -->
                <div>
                    <div>
                        <img class="h-32 w-full object-cover lg:h-48"
                             src="{{Storage::disk('public')->url($location->banner)}}"
                             alt="Logo {{$location->name}}">
                    </div>
                    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                            <div class="flex">
                                <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                     src="{{Storage::disk('public')->url($location->icon)}}"
                                     alt="Logo {{$location->name}}" alt="">
                            </div>
                            <div
                                class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                <div class="my-4">
                                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                                        {{$location->name}} <small
                                            class="block sm:inline text-gray-400 font-semibold text-sm">Contact
                                            tracing</small>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="mt-6 sm:mt-2 2xl:mt-5">
                    <div class="border-b border-gray-200">
                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <!-- Current: "border-blue-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                <p class="border-blue-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                   aria-current="page">
                                    Isi formulir
                                </p>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Description list -->
               <livewire:guest.check-in :team="$team" :location="$location"/>
            </article>
        </div>
    </div>
@endsection
