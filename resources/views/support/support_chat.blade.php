@extends('layouts.master')

@include('theme_include.toaster')

@push('custom_css')
<link href="{{ asset('assets/css/personal_chat.css') }}" rel="stylesheet">
@endpush

@section('content')
    <x-support.chat />
@endsection

@push('custom_script')
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script src="{{ asset('echo.js') }}"></script>
    <script src="{{ asset('echo.iife.js') }}"></script>
    <script src="{{ asset('js/support/chat.js') }}"></script>
    <script src="{{ asset('js/support/chat_pusher.js') }}"></script>
@endpush
@include('vendors.window-unload-support')
