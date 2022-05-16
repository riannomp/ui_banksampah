<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('tittle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/images/favicon.ico">
    <!-- App css -->
    <link href="{{ asset('template/dist') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('template/dist') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/dist') }}/assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-stylesheet" />


    <link href="{{ asset('template/dist') }}/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/dist') }}/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('template/dist') }}/assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template/dist') }}/assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template/dist') }}/assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />



</head>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    @if (auth()->user()->level == 'admin' || auth()->user()->level == 'teller' || auth()->user()->level == 'kepala')
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ url('img/logo') }}/{{ $user->pegawai->foto }}" alt="user-image"
                                class="rounded-circle">
                            <span
                                class="d-none d-sm-inline-block ml-1 font-weight-medium">{{ $user->pegawai->nama }}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </a>
                    @endif
                    @if (auth()->user()->level == 'koor')
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ url('img/logo') }}/{{ $user->koordinator->foto }}" alt="user-image"
                                class="rounded-circle">
                            <span
                                class="d-none d-sm-inline-block ml-1 font-weight-medium">{{ $user->koordinator->nama }}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </a>
                    @endif
                    @if (auth()->user()->level == 'nasabah')
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                            data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ url('img/logo') }}/{{ $user->nasabah->foto }}" alt="user-image"
                                class="rounded-circle">
                            <span
                                class="d-none d-sm-inline-block ml-1 font-weight-medium">{{ $user->nasabah->nama }}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </a>
                    @endif
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow text-white m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Settings</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ url('dashboard') }}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('template/dist') }}/assets/images/sampah/banksampah_logo.png" alt=""
                            height="50">
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <img src="{{ asset('template/dist') }}/assets/images/sampah/banksampah_logo.png" alt=""
                            height="50">
                    </span>
                </a>

                <a href="{{ url('dashboard') }}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('template/dist') }}/assets/images/logo-light.png" alt="" height="22">
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <img src="{{ asset('template/dist') }}/assets/images/logo-sm-light.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>


            </ul>
        </div>
        <!-- end Topbar -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">{{ Auth::user()->level }}</li>

                        <li>
                            <a href="{{ url('dashboard') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        @if (auth()->user()->level == 'admin')
                            <li>
                                <a href="{{ url('admin/data_sampah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span>Data Sampah</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('admin/setoran_sampah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span>Setoran Sampah</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/data_nasabah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span> Data Nasabah </span>
                                </a>

                            </li>

                            <li>
                                <a href="{{ url('admin/jenis_sampah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span> Jenis Sampah </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/data_user') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span> Data User </span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->level == 'teller')
                            <li>
                                <a href="{{ url('teller/data_sampah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span>Data Sampah </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('teller/setoran_sampah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span>Setoran Sampah </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('teller/data_nasabah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span> Data Nasabah </span>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->level == 'koor')
                            <li>
                                <a href="{{ url('koor/setoran_sampah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span>Setoran Sampah </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('koor/data_nasabah') }}">
                                    <i class="mdi mdi-content-copy"></i>
                                    <span> Data Nasabah </span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->level == 'nasabah')
                            <li>
                                <a href="{{ url('nasabah/tabungan') }}">
                                    <i class="mdi mdi-format-underline"></i>
                                    <span> Tabungan</span>
                                </a>
                            </li>
                        @endif
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->


                @yield('content')
            </div> <!-- end content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2022 &copy; Rianno <a href="">MansDev</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-18 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-4">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="{{ asset('template/dist') }}/assets/images/layouts/light.png"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('template/dist') }}/assets/images/layouts/dark.png"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="{{ asset('template/dist') }}/assets/css/bootstrap-dark.min.css"
                        data-appStyle="{{ asset('template/dist') }}/assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('template/dist') }}/assets/images/layouts/rtl.png"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="{{ asset('template/dist') }}/assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <a href="https://1.envato.market/XY7j5" class="btn btn-danger btn-block mt-3" target="_blank"><i
                        class="mdi mdi-download mr-1"></i> Download Now</a>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a>

    <!-- Vendor js -->
    <script src="{{ asset('template/dist') }}/assets/js/vendor.min.js"></script>

    <!--Morris Chart-->
    <script src="{{ asset('template/dist') }}/assets/libs/morris-js/morris.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init js-->
    <script src="{{ asset('template/dist') }}/assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('template/dist') }}/assets/js/app.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/select2/select2.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/datatables/jquery.dataTables.min.js"></script>

    <script src="{{ asset('template/dist') }}/assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('template/dist') }}/assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/datatables/buttons.bootstrap4.min.js"></script>


    <script src="{{ asset('template/dist') }}/assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/datatables/buttons.print.min.js"></script>

    <script src="{{ asset('template/dist') }}/assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('template/dist') }}/assets/libs/datatables/dataTables.select.min.js"></script>

    <!-- Datatables init -->
    <script src="{{ asset('template/dist') }}/assets/js/pages/datatables.init.js"></script>

    @yield('script')
</body>

</html>
