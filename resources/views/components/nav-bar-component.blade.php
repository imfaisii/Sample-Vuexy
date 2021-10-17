@php
$user = Auth::user()
    ->with(['UserAttributes'])
    ->first();
@endphp
<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                    data-feather="search"></i></a>
            <div class="search-input">
                <div class="search-input-icon"><i data-feather="search"></i></div>
                <input class="form-control input" type="text" placeholder="Explore AMS..." tabindex="-1"
                    data-search="search">
                <div class="search-input-close"><i data-feather="x"></i></div>
                <ul class="search-list search-list-main"></ul>
            </div>
        </li>
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-menu ficon">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag"
                    href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag"><a class="dropdown-item"
                        href="#" data-language="en"><i class="flag-icon flag-icon-us"></i>
                        English</a><a class="dropdown-item" href="#" data-language="fr"><i
                            class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"
                        data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item"
                        href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i>
                        Portuguese</a></div>
            </li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                        data-feather="moon"></i></a></li>
            <!-- Notification start Here -->
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
                    data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                        class="badge rounded-pill bg-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary">6 New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list"><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img
                                            src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar"
                                            width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Congratulation Sam
                                            🎉</span>winner!</p><small class="notification-text"> Won the monthly
                                        best seller badge.</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all
                            notifications</a></li>
                </ul>
            </li>
            <!-- Notification Ends Here -->
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder">{{ $user->name }}</span><span
                            class="user-status">{{ $user->UserAttributes->user_type }}</span>
                    </div><span class="avatar"><img class="round"
                            src="{{ asset('assets/images/Profile/') }}/{{ $user->UserAttributes->image }}"
                            alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                {{-- <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">Static</span><span
                                class="user-status">Static</span></div><span class="avatar"><img
                                class="round" src="#" alt="avatar" height="40" width="40"><span
                                class="avatar-status-online"></span></span>
                    </a> --}}
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item"
                        href="page-profile.html"><i class="me-50" data-feather="user"></i> Profile</a><a
                        class="dropdown-item" href="app-email.html"><i class="me-50" data-feather="mail"></i>
                        Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="me-50"
                            data-feather="check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i
                            class="me-50" data-feather="message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item"
                        href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i>
                        Settings</a><a class="dropdown-item" href="page-pricing.html"><i class="me-50"
                            data-feather="credit-card"></i>
                        Pricing</a><a class="dropdown-item" href="page-faq.html"><i class="me-50"
                            data-feather="help-circle"></i> FAQ</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="dropdown-item "
                            style="width:100%">
                            <i class="me-50" data-feather="power"></i>
                            <span class="ml-2">Logout </span>
                        </button>
                    </form>

                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- Area Used in Search Bar Start -->
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a></li>

</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75"
                    data-feather="alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>
<!-- Area Used in Search Bar End -->
<!-- END: Header-->
