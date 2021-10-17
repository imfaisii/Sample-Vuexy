@extends('front.layouts.master')
@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Congratulations 🎉 Saad!</h5>
                        <p class="card-text font-small-3">You have made the most this month</p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <a href="#">RS . 48.9k</a>
                        </h3>
                        <button type="button" class="btn btn-primary">View Sales</button>
                        <img src="../../../app-assets/images/illustration/badge.svg" class="congratulation-medal"
                            alt="Medal Pic" />
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">230</h4>
                                        <p class="card-text font-small-3 mb-0">Societies Added</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">8.549k</h4>
                                        <p class="card-text font-small-3 mb-0">New Customers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">1400</h4>
                                        <p class="card-text font-small-3 mb-0">Plots Sold</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">RS . 9745M</h4>
                                        <p class="card-text font-small-3 mb-0">Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>

        <div class="row match-height">
            <div class="col-lg-4 col-12">
                <div class="row match-height">
                    <!-- Bar Chart - Orders -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6>Orders</h6>
                                <h2 class="fw-bolder mb-1">2,76k</h2>
                                <div id="statistics-order-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Bar Chart - Orders -->

                    <!-- Line Chart - Profit -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Profit</h6>
                                <h2 class="fw-bolder mb-1">6,24k</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->

                    <!-- Earnings Card -->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="card earnings-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title mb-1">Earnings</h4>
                                        <div class="font-small-2">This Month</div>
                                        <h5 class="mb-1">RS . 4055.56</h5>
                                        <p class="card-text text-muted font-small-2">
                                            <span class="fw-bolder">68.2%</span><span> more earnings than
                                                last month.</span>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <div id="earnings-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Earnings Card -->
                </div>
            </div>

            <!-- Revenue Report Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center me-2">
                                        <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                        <span>Earning</span>
                                    </div>
                                    <div class="d-flex align-items-center ms-75">
                                        <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                        <span>Expense</span>
                                    </div>
                                </div>
                            </div>
                            <div id="revenue-report-chart"></div>
                        </div>
                        <div class="col-md-4 col-12 budget-wrapper">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    2020
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">2020</a>
                                    <a class="dropdown-item" href="#">2019</a>
                                    <a class="dropdown-item" href="#">2018</a>
                                </div>
                            </div>
                            <h2 class="mb-25">RS . 25,852</h2>
                            <div class="d-flex justify-content-center">
                                <span class="fw-bolder me-25">Budget:</span>
                                <span>56,800</span>
                            </div>
                            <div id="budget-chart"></div>
                            <button type="button" class="btn btn-primary">Increase Budget</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue Report Card -->
        </div>

        <div class="row match-height">
            <!-- Company Table Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Views</th>
                                        <th>Revenue</th>
                                        <th>Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/toolbox.svg"
                                                            alt="Toolbar svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Dixons</div>
                                                    <div class="font-small-2 text-muted">meguc@ruj.io</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Technology</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">23.4k</span>
                                                <span class="font-small-2 text-muted">in 24 hours</span>
                                            </div>
                                        </td>
                                        <td>RS . 891.2</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">68%</span>
                                                <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/parachute.svg"
                                                            alt="Parachute svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Motels</div>
                                                    <div class="font-small-2 text-muted">vecav@hodzi.co.uk
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-success me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="coffee" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Grocery</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">78k</span>
                                                <span class="font-small-2 text-muted">in 2 days</span>
                                            </div>
                                        </td>
                                        <td>RS . 668.51</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">97%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/brush.svg"
                                                            alt="Brush svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Zipcar</div>
                                                    <div class="font-small-2 text-muted">davcilse@is.gov</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">162</span>
                                                <span class="font-small-2 text-muted">in 5 days</span>
                                            </div>
                                        </td>
                                        <td>RS . 522.29</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">62%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/star.svg"
                                                            alt="Star svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Owning</div>
                                                    <div class="font-small-2 text-muted">us@cuhil.gov</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Technology</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">214</span>
                                                <span class="font-small-2 text-muted">in 24 hours</span>
                                            </div>
                                        </td>
                                        <td>RS . 291.01</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">88%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/book.svg"
                                                            alt="Book svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Cafés</div>
                                                    <div class="font-small-2 text-muted">pudais@jife.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-success me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="coffee" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Grocery</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">208</span>
                                                <span class="font-small-2 text-muted">in 1 week</span>
                                            </div>
                                        </td>
                                        <td>RS . 783.93</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">16%</span>
                                                <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/rocket.svg"
                                                            alt="Rocket svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Kmart</div>
                                                    <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">990</span>
                                                <span class="font-small-2 text-muted">in 1 month</span>
                                            </div>
                                        </td>
                                        <td>RS . 780.05</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">78%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="../../../app-assets/images/icons/speaker.svg"
                                                            alt="Speaker svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Payers</div>
                                                    <div class="font-small-2 text-muted">luk@izug.io</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">12.9k</span>
                                                <span class="font-small-2 text-muted">in 12 hours</span>
                                            </div>
                                        </td>
                                        <td>RS . 531.49</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">42%</span>
                                                <i data-feather="trending-up" class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Company Table Card -->

            <!-- Goal Overview Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Goal Overview</h4>
                        <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                    </div>
                    <div class="card-body p-0">
                        <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Completed</p>
                                <h3 class="fw-bolder mb-0">786,617</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">In Progress</p>
                                <h3 class="fw-bolder mb-0">13,561</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Goal Overview Card -->
        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    <!-- END: Content-->
@endsection

@push('extended-js')

    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>

@endpush
