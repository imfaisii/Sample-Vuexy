 {{-- <form method="POST" action="{{ route('password.email') }}"> --}}
@extends('layouts.auth.master')
@push('extended-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@endpush
@section('content')

<div class="auth-wrapper auth-cover">
    <div class="auth-inner row m-0">
        <!-- Brand logo--><a class="brand-logo" href="{{route('login')}}">
            
           {{-- <img src="{{asset('assets/images/logo.png')}}"> --}}
            <h2 class="brand-text text-primary ms-1">AMS</h2>
        </a>
        <!-- /Brand logo-->
        <!-- Left Text-->
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{asset('app-assets/images/pages/forgot-password-v2.svg')}}" alt="Forgot password AMS" /></div>
        </div>
        <!-- /Left Text-->
        <!-- Forgot password-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Forgot Password? 🔒</h2>
                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
                <form class="auth-forgot-password-form mt-2" id="forget-password-form" action="{{ route('forget_password') }}" method="POST" novalidate>
                    @csrf
                    <div class="mb-1">
                        <label class="form-label" for="forgot-password-email">Email</label>
                        <input class="form-control" id="forgot-password-email" type="text" name="email" placeholder="*****@example.com" aria-describedby="forgot-password-email" autofocus="" tabindex="1" />
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect w-100 forget-btn">
                        <span class="spinner-border spinner-border-sm forget-spinner" role="status" aria-hidden="true"
                            style="display: none"></span>
                        <span class="ms-25 align-middle forget-btn-inner">Send Reset Link</span>
                    </button>
                  
                </form>
                <p class="text-center mt-2"><a href="{{route('login')}}"><i data-feather="chevron-left"></i> Back to login</a></p>
            </div>
        </div>
        <!-- /Forgot password-->
    </div>
</div>

@endsection

@push('extended-js')
<script>
    let val = true;
</script>
<script src="{{asset('app-assets/js/scripts/pages/auth-forgot-password.js')}}"></script>
<script src="{{asset('js/forget_password/forget_password.js')}}"></script>
<script src="{{asset('js/dynamic_ajax.js')}}"></script>

@endpush



