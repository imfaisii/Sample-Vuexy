@extends('layouts.auth.master')
@push('custom_css')

@endpush

@section('content')

    <!-- Error page-->
    <div class="misc-wrapper"><a class="brand-logo" @auth href="{{ route('dashboard') }}" @endauth @guest
        href="{{ route('login') }}" @endguest>


        <h2 class="brand-text text-primary ms-1">AMS</h2>
    </a>
    <div class="misc-inner p-2 p-sm-3">
        <div class="w-100 text-center">
            <h2 class="mb-1">Sorry for this Page but</h2>
            <p class="mb-2" style="color: red;">{{Request::get('message')}}</p><img class="img-fluid"
            src="{{ asset('app-assets/images/pages/error.svg') }}" alt="Error page" /><br><br><a
            class="btn btn-primary mb-2 btn-sm-block" @auth href="{{ route('dashboard') }}" @endauth @guest
        href="{{ route('login') }}" @endguest>Back</a>
    </div>
</div>
</div>
<!-- / Error page-->

@endsection

@push('custom_script')

@endpush
