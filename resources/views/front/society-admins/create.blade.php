@extends('front.layouts.master')

@push('extended-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css') }}">

@endpush

@section('content')

    {{-- Breadcrumb Here --}}

    <x-bread-crumb-component />

    {{-- Required Components --}}

    <x-add-society-admin />


@endsection

@push('extended-js')

    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

@endpush
