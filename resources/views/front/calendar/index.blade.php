@extends('front.layouts.master')
@push('extended-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/calendars/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">

@endpush

@section('content')

    {{-- Main Components --}}

    <x-bread-crumb-component />
    <x-calendar-component />

@endsection

@push('extended-js')

    <script src="{{ asset('app-assets/vendors/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-calendar-events.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-calendar.js') }}"></script>

@endpush
