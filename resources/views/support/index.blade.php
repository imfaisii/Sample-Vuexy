@extends('layouts.master')
@include('support.variables_index')
@include('theme_include.sweet_alert')
@include('theme_include.select')


@push('custom_css')

@endpush

@section('content')
 <x-support.index/>
@endsection

@push('custom_script')
@can('csr-view')
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('echo.js') }}"></script>
<script src="{{ asset('echo.iife.js') }}"></script>
<script src="{{asset('js/support/csr_listening.js')}}"></script> 
@endcan
@can('agent-view')
<script src="{{asset('js/support/make_room.js')}}"></script> 
@endcan
@endpush
