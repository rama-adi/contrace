@extends('dashboard.location._base_show')

@push('styles')
    <meta name="turbo-cache-control" content="no-cache">
@endpush

@section('location_title')
    Lihat lokasi
@endsection

@section('location_content')
    <turbo-frame id="show_location">
        <div class="-mt-8 mb-10">
            <livewire:tables.visitor :location="$location" />
        </div>
    </turbo-frame>
@endsection
