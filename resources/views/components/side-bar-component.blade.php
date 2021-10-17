 <!-- BEGIN: Main Menu-->
 <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
     <div class="navbar-header">
         <ul class="nav navbar-nav flex-row">
             <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('dashboard') }}"><span
                         class="brand-logo">
                         <img src="{{ asset('assets/images/logo.png') }}">
                     </span>
                     <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
                 </a></li>
             <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                         class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                         class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                         data-ticon="disc"></i></a></li>
         </ul>
     </div>
     <div class="shadow-bottom"></div>
     <div class="main-menu-content">
         <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
             <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i
                         data-feather="home"></i><span class="menu-title text-truncate"
                         data-i18n="Dashboards">Dashboard</span><span
                         class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
             </li>


             {{-- <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                         data-feather="navigation"></i><span class="menu-title text-truncate">Locations</span></a>
                 <ul class="menu-content">
                     <li class="@if (Route::is('front.dashboard.locations.create')) active @endif"><a class=" d-flex align-items-center"
                             href="{{ route('front.dashboard.locations.create') }}"><i data-feather="plus"></i><span
                                 class="menu-item text-truncate" data-i18n="List">Create
                                 New</span></a>
                     </li>
                     <li class="@if (Route::is('front.dashboard.locations.index')) active @endif"><a class="d-flex align-items-center"
                             href="{{ route('front.dashboard.locations.index') }}"><i data-feather="eye"></i><span
                                 class="menu-item text-truncate" data-i18n="Preview">View
                                 /
                                 Edit</span></a>
                     </li>
                 </ul>
             </li> --}}

         <li class=" nav-item {{ Route::is(['support.index']) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('support.index')}}"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Support">
                         Support  </span></a>
             </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                         data-feather="shield"></i><span class="menu-title text-truncate"
                         data-i18n="Roles &amp; Permission">Roles &amp;
                         Permission</span></a>
                 <ul class="menu-content">
                     <li class="{{ Route::is(['Role']) ? 'active' : '' }}"><a class="d-flex align-items-center "
                             href="{{ route('Role') }}"><i data-feather="circle"></i><span
                                 class="menu-item text-truncate" data-i18n="Roles">Roles</span></a>
                     </li>
                     <li class="{{ Route::is(['Permission']) ? 'active' : '' }}"><a
                             class="d-flex align-items-center " href="{{ route('Permission') }}"><i
                                 data-feather="circle"></i><span class="menu-item text-truncate"
                                 data-i18n="Permission">Permission</span></a>
                     </li>
                 </ul>
             </li>
         </ul>
     </div>
 </div>
 <!-- END: Main Menu-->
