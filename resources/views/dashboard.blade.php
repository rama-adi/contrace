<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div
        class="relative overflow-hidden flex flex-col items-center w-full px-4 py-8 mx-auto text-center rounded-lg shadow-2xl lg:text-left lg:block bg-gradient-to-br from-blue-800 to-teal-600 sm:px-6 md:pb-0 md:pt-12 lg:px-12 lg:py-12">
        <h2
            class="my-4 text-3xl font-bold tracking-tight text-white sm:text-4xl md:text-5xl lg:my-0 xl:text-4xl sm:leading-tight">
            Selamat datang di Contrace!
        </h2>
        <p class="mt-1 mb-10 text-sm font-medium text-indigo-200 uppercase xl:text-base xl:tracking-wider lg:mb-0">
            Anda bisa dengan mudah melakukan contact tracing menggunakan app Contrace!
        </p>
        <div class="flex mb-8 lg:mt-6 lg:mb-0">
            <div class="inline-flex">
                <a href="{{route('locations.create')}}"
                   class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border border-transparent rounded-md hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300">
                    Tambahkan lokasi baru
                </a>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Statistik tim ini
        </h3>
        <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
            <div>
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-base font-normal text-gray-900">
                        Lokasi
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                            {{Auth::user()->currentTeam->locations->count()}}
                        </div>
                    </dd>
                </div>
            </div>

            <div>
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-base font-normal text-gray-900">
                        Total pengunjung hari ini
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                            {{Auth::user()->currentTeam->getVisitor(Carbon\Carbon::today())}}
                        </div>

                    </dd>
                </div>
            </div>
            <div>
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-base font-normal text-gray-900">
                        Anggota tim
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                            {{Auth::user()->currentTeam->allUsers()->count()}}
                        </div>
                    </dd>
                </div>
            </div>
        </dl>
    </div>

    <div class="mt-8">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Semua lokasi anda
        </h3>
        <div class="flex flex-col mt-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kunjungan
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pengunjung
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Odd row -->
                            @foreach(\App\Models\Location::currentTeam()->get() as $location)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$location->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$location->visitors->count()}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$location->countTotalVisitors()}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('locations.show', ['location' => $location->id])}}" class="text-indigo-600 hover:text-indigo-900 mr-2">Lihat</a>
                                        <a href="{{route('locations.edit', ['location' => $location->id])}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Even row -->

                            <!-- More items... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->


</x-app-layout>
