<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center active" id="account-tab" data-bs-toggle="tab"
                    href="#account" aria-controls="account" role="tab" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg><span class="d-none d-sm-block">Society Information</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="information-tab" data-bs-toggle="tab"
                    href="#information" aria-controls="information" role="tab" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-info">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg><span class="d-none d-sm-block">Additional</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- Account Tab starts -->
            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                <!-- users edit start -->
                <div class="d-flex mb-2">
                    <img src="{{ asset('app-assets/images/slider/01.jpg') }}" alt="users avatar"
                        class="user-avatar users-avatar-shadow rounded me-2 my-25 cursor-pointer" height="90"
                        width="90">
                    <div class="mt-50">
                        <h4>Society Image</h4>
                        <div class="col-12 d-flex mt-1 px-0">
                            <label class="btn btn-primary me-75 mb-0 waves-effect waves-float waves-light"
                                for="change-picture">
                                <span class="d-none d-sm-block">Change</span>
                                <input class="form-control" type="file" id="change-picture" hidden=""
                                    accept="image/png, image/jpeg, image/jpg">
                                <span class="d-block d-sm-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit me-0">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </span>
                            </label>
                            <button class="btn btn-outline-secondary d-none d-sm-block waves-effect">Remove</button>
                            <button class="btn btn-outline-secondary d-block d-sm-none waves-effect">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash-2 me-0">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- users edit ends -->
                <!-- users edit account form start -->
                <form class="form-validate" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="username">User ID</label>
                                <input type="text" class="form-control" placeholder="Username" value="Some ID"
                                    name="username" id="username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="role">Society ID</label>
                                <select class="form-select" id="role">
                                    <option>S-0001</option>
                                    <option>S-0002</option>
                                    <option>S-0003</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                            <button type="submit"
                                class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1 waves-effect waves-float waves-light">Save
                                Changes</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- users edit account form ends -->
            </div>
            <!-- Account Tab ends -->

            <!-- Information Tab starts -->
            <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                <!-- users edit Info form start -->
                <form class="form-validate" novalidate="novalidate">
                    <div class="row mt-1">
                        <div class="col-12">
                            <h4 class="mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user font-medium-4 me-25">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="align-middle">Personal Information</span>
                            </h4>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="birth">Birth date</label>
                                <input id="birth" type="text" class="form-control birthdate-picker flatpickr-input"
                                    name="dob" placeholder="YYYY-MM-DD" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="mobile">Mobile</label>
                                <input id="mobile" type="text" class="form-control" value="+6595895857" name="phone">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="website">Website</label>
                                <input id="website" type="text" class="form-control" placeholder="Website here..."
                                    value="https://rowboat.com/insititious/Angelo" name="website">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="languages">Languages</label>
                                <select id="languages" class="form-select">
                                    <option value="English">English</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="French" selected="">French</option>
                                    <option value="Russian">Russian</option>
                                    <option value="German">German</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Sanskrit">Sanskrit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="d-block form-label mb-1">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="male" name="gender" class="form-check-input">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="female" name="gender" class="form-check-input" checked="">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="d-block form-label mb-1">Contact Options</label>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="email-cb" checked="">
                                    <label class="form-check-label" for="email-cb">Email</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="message" checked="">
                                    <label class="form-check-label" for="message">Message</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="phone">
                                    <label class="form-check-label" for="phone">Phone</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h4 class="mb-1 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-map-pin font-medium-4 me-25">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span class="align-middle">Address</span>
                            </h4>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="address-1">Address Line 1</label>
                                <input id="address-1" type="text" class="form-control" value="A-65, Belvedere Streets"
                                    name="address">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="address-2">Address Line 2</label>
                                <input id="address-2" type="text" class="form-control"
                                    placeholder="T-78, Groove Street">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="postcode">Postcode</label>
                                <input id="postcode" type="text" class="form-control" placeholder="597626" name="zip">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="city">City</label>
                                <input id="city" type="text" class="form-control" value="New York" name="city">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="state">State</label>
                                <input id="state" type="text" class="form-control" name="state"
                                    placeholder="Manhattan">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="country">Country</label>
                                <input id="country" type="text" class="form-control" name="country"
                                    placeholder="United States">
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                            <button type="submit"
                                class="btn btn-primary mb-1 mb-sm-0 me-0 me-sm-1 waves-effect waves-float waves-light">Save
                                Changes</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- users edit Info form ends -->
            </div>
            <!-- Information Tab ends -->
        </div>
    </div>
</div>
