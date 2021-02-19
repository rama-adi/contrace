@extends('dashboard.location._base_show')

@section('location_title')
    Lihat lokasi
@endsection

@section('location_content')
    <turbo-frame id="show_location">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Deskripsi
                </dt>
                <dd class="mt-1 max-w-prose text-sm text-gray-900">
                    <p>
                        {!! Purify::clean($location->body); !!}
                    </p>

                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Maksimal pendamping
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $location->max_company }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Total pengunjung
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $location->countTotalVisitors() }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Total kunjungan
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $location->visitors()->count() }}
                </dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Dibuat pada
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $location->created_at->format('Y-m-d') }}
                </dd>
            </div>

            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    Perjanjian yang harus disetujui
                </dt>
                <dd class="mt-1 max-w-prose text-sm text-gray-900">
                    {!! Purify::clean($location->agreement) !!}
                    <div class="mb-10"></div>
                </dd>
            </div>
        </dl>
    </turbo-frame>
@endsection
