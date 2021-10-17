<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="AMS is to provide support to agenices manage their leads and agents digitally">
    <meta name="keywords" content="AMS, Agency, IMO, Organization, Insurance , BPO, PrimeIT, Prime BPO,  web app">
    <meta name="author" content="Fast-Devz">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} - {{ ucwords(request()->segment(count(request()->segments()))) }} </title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/fav.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @include('vendors.toaster')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    @stack('extended-css')
    @stack('custom_css')
    <!-- END: Custom CSS-->



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">


    @if (Route::currentRouteName() != 'support.chat')
    @include('vendors.window-load')
    <x-nav-bar-component></x-nav-bar-component>
    <x-side-bar-component></x-side-bar-component>
   @endif

    <!-- BEGIN: Content-->
    <div class="app-content @if (Route::currentRouteName() != 'support.chat') content @endif ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">

                @if (Route::currentRouteName() != 'support.chat')
                <x-bread-crumb-component />
                @endif

                @yield('content')

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <x-footer-component></x-footer-component>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src={{ asset('assets/js/custom/app.js') }}></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-blockui.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>

    <!-- END: Theme JS-->
    @include('vendors.window-load')
    @stack('extended-js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- The below Script welcome the logged in user -->
    @if (Route::currentRouteName() == 'dashboard')
        <script>
            let SOME_NAME = '{{ Auth::user()->name }}';
            let check = "{{ session('login') }}";
            let APP_NAME = "{{ env('APP_NAME') }}";
        </script>
        <script src="{{ asset('assets/js/custom/first_login_welcome.js') }}"></script>
        {{ session(['login' => false]) }}
        <!-- Sets the session variable login to false so that one time welcome message is shown -->
    @endif

    @stack('custom_script')
    <!-- -->
    <!-- Sets the session variable login to false so that one time welcome message is shown -->
    <!-- -->
</body>
<!-- END: Body-->

</html>
