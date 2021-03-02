<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from byrushan.com/projects/material-admin/app/2.6/index.html by HTTrack Website Copier/3.x [XR&CO 2014], Fri, 26 Jul 2019 11:34:03 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('global.title') }}</title>

        {{-- fav icon --}}
         <link rel="shortcut icon" type="image/x-icon" href="img/county.jpg">

        <!--icon files-->
		<link rel="stylesheet" href="{{ asset('css/icon_fonts/css/icon_set_1.css') }}">
		<link rel="stylesheet" href="{{ asset('css/icon_fonts/css/icon_set_2.css') }}">
		<link rel="stylesheet" href="{{ asset('css/icon_fonts/css/icon_set_3.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icon_fonts/css/icon_set_4.css') }}">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/jquery-scrollbar/jquery.scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/fullcalendar/fullcalendar.min.css') }}">


        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/jquery-scrollbar/jquery.scrollbar.css') }}">



        <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/dropzone/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/trumbowyg/ui/trumbowyg.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendors/rateyo/jquery.rateyo.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">

        <link rel="stylesheet" href="{{ asset('vendors/owl/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owl/css/owl.theme.default.min.css') }}">

        <!-- flat picker -->
        <link rel="stylesheet" href="{{ asset('css/flat-icon/font/flaticon.css') }}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dropify2.css') }}">



    </head>

    <body data-ma-theme="green">
        @include('layouts.active-page')
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <div class="header__logo hidden-sm-down">
                    <h1><a  href="#"><img class="the-logo" src="{{asset('demo/img/health-logo.png')}}"></a></h1>
                </div>

                <form  class="search">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search the site ">
                        <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                    </div>
                </form>
                <livewire:styles />


            </header>

            <aside class="sidebar pr-0">
                <div class="scrollbar-inner">
                    <div class="user mr-4">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="{{ asset('demo/img/profile-pics/8.jpg') }}" alt="">
                            <div>
                                <div class="user__name">{{ Session::get('resource')[0]['username'] }}</div>
                                <div class="user__email">{{ Session::get('resource')[0]['roles'] }}</div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('health-profile') }}">View Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </div>
                    <ul class="navigation">
                        @if (Session::get('resource')[0]['roles'] == "NCCGHEALTH")
                        <li class="{{ Request::is('health-dashboard')? 'navigation__active' : '' }}"><a href="{{ route('health-dashboard') }}"><i class="zmdi zmdi-home"></i>&nbsp; Home</a></li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-steam-square"></i>Lab Tech<i class="zmdi zmdi-caret-down drop-down-icon"></i></a>
                            <ul>
                                <li {{(current_page("get-all-test"))? 'class=navigation__active' : ''}}><a href="{{ route('get-all-test') }}"><i class="zmdi zmdi-tumblr"></i> &nbsp; Assign Tests</a></li>
                                <li {{(current_page("retest"))? 'class=navigation__active' : ''}}><a href="{{ route('retest') }}"><i class="zmdi zmdi-refresh"></i>&nbsp; Retest</a></li>
                                <li {{(current_page("get-tests-done"))? 'class=navigation__active' : ''}}><a href="{{ route('get-tests-done') }}"><i class="zmdi zmdi-refresh"></i> &nbsp; Get Tests</a></li>
                                <li {{(current_page("hit-map"))? 'class=navigation__active' : ''}}><a href="{{ route('hit-map') }}"><i class="zmdi zmdi-walk"></i>&nbsp; Check Status</a></li>
                                <li class="{{ Request::is('test-kits')? 'navigation__active' : '' }}"><a href="{{ route('test-kits') }}"><i class="ti-support"></i>&nbsp; Test Kits</a></li>
                                <li {{(current_page("bookings"))? 'class=navigation__active' : ''}}><a href="{{ route('bookings') }}"><i class="flaticon-register-1"></i>&nbsp; Bookings</a></li>
                                <li {{(current_page("users"))? 'class=navigation__active' : ''}}><a href="{{ route('users') }}"><i class="zmdi zmdi-account-add"></i>&nbsp; Add User</a></li>
                                <li {{(current_page("overdue-test"))? 'class=navigation__active' : ''}}><a href="{{ route('overdue-test') }}"><i class="zmdi zmdi-explicit"></i>&nbsp; Overdue Test</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-steam"></i>Doctor<i class="zmdi zmdi-caret-down drop-down-icon"></i></a>
                            <ul>
                                <li {{(current_page("doctor-updates"))? 'class=navigation__active' : ''}}><a href="{{ route('doctor-updates') }}"><i class="zmdi zmdi-check-all"></i> &nbsp; Doctor Approval</a></li>
                                <li {{(current_page("get-doc-approvals"))? 'class=navigation__active' : ''}}><a href="{{ route('get-doc-approvals') }}"><i class="zmdi zmdi-refresh"></i> &nbsp; Get Approvals</a></li>
                                <li {{(current_page("signature"))? 'class=navigation__active' : ''}}><a href="{{ route('signature') }}"><i class="flaticon-autograph"></i> &nbsp; Upload Signature</a></li>
                                <li class="{{ Request::is('get-approved')? 'navigation__active' : '' }}"><a href="{{ route('get-approved') }}"><i class="zmdi zmdi-print"></i>&nbsp;Approved Tests</a></li>
                            </ul>
                        </li>

                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-steam"></i>Food Hygiene<i class="zmdi zmdi-caret-down drop-down-icon"></i></a>
                                <ul>
                                    <li {{(current_page("get-inspections"))? 'class=navigation__active' : ''}}><a href="{{ route('get-inspections') }}"><i class="zmdi zmdi-long-arrow-down"></i> &nbsp; Assign Inspector</a></li>
                                    <li {{(current_page("inspection-results"))? 'class=navigation__active' : ''}}><a href="{{ route('inspection-results') }}"><i class="zmdi zmdi-long-arrow-down"></i> &nbsp; Assign Inspection Results </a></li>
                                    <li {{(current_page("inspected"))? 'class=navigation__active' : ''}}><a href="{{ route('inspected') }}"><i class="zmdi zmdi-check"></i>&nbsp; Inspected</a></li>
                                    <li {{(current_page("approval"))? 'class=navigation__active' : ''}}><a href="{{ route('approval') }}"><i class="zmdi zmdi-check-all"></i>&nbsp; Approval</a></li>
                                    <li {{(current_page("approval"))? 'class=navigation__active' : ''}}><a href="{{ route('approved-inspections') }}"><i class="zmdi zmdi-check-all"></i>&nbsp; Approved</a></li>
                                </ul>
                            </li>

                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-steam"></i>Printing<i class="zmdi zmdi-caret-down drop-down-icon"></i></a>
                                <ul>
                                    <li class="{{ Request::is('get-headers')? 'navigation__active' : '' }}"><a href="{{ route('get-headers') }}"><i class="zmdi zmdi-print"></i> &nbsp;Approve Print</a></li>
                                </ul>
                            </li>
                            <li class="navigation__sub">
                                <a href="#"><i class="zmdi zmdi-steam"></i>Support<i class="zmdi zmdi-caret-down drop-down-icon"></i></a>
                                <ul>
                                    <li {{(current_page("get-bill-by-id"))? 'class=navigation__active' : ''}}><a href="{{ route('get-bill-by-id') }}"><i class="zmdi zmdi-phone-in-talk"></i>&nbsp;Get Bill</a></li>
                                    <li {{(current_page("support-mobile"))? 'class=navigation__active' : ''}}><a href="{{ route('support-mobile') }}"><i class="zmdi zmdi-phone-missed"></i>&nbsp; Update Mobile</a></li>
                                    <li {{(current_page("support"))? 'class=navigation__active' : ''}}><a href="{{ route('support') }}"><i class="zmdi zmdi-desktop-mac"></i>&nbsp; Support</a></li>
                                    <li {{(current_page("config"))? 'class=navigation__active' : ''}}><a href="{{ route('config') }}"><i class="zmdi zmdi-settings-square"></i>&nbsp; Config</a></li>
                                    <li {{(current_page("get-individual-name"))? 'class=navigation__active' : ''}}><a href="{{ route('get-individual-name') }}"><i class="zmdi zmdi-desktop-mac"></i>&nbsp; Individual</a></li>


                                </ul>
                            </li>

{{--                        <li {{(current_page("get-bill-tests"))? 'class=navigation__active' : ''}}><a href="{{ route('get-bill-tests') }}"><i class="flaticon-checklist"></i>Test Conclusions</a></li>--}}

                            <li class="">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                 <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                        @elseif (Session::get('resource')[0]['roles'] == "NCCGHEALTHLAB")
                            <li class="{{ Request::is('health-dashboard')? 'navigation__active' : '' }}"><a href="{{ route('health-dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li {{(current_page("get-all-test"))? 'class=navigation__active' : ''}}><a href="{{ route('get-all-test') }}"><i class="zmdi zmdi-aspect-ratio"></i> Assign Test Results</a></li>
                            <li {{(current_page("retest"))? 'class=navigation__active' : ''}}><a href="{{ route('retest') }}"><i class="zmdi zmdi-refresh"></i> Retest</a></li>
                            <li class="{{ Request::is('test-kits')? 'navigation__active' : '' }}"><a href="{{ route('test-kits') }}"><i class="flaticon-hospital"></i> Test Kits Movement</a></li>
                            <li {{(current_page("get-tests-done"))? 'class=navigation__active' : ''}}><a href="{{ route('get-tests-done') }}"><i class="zmdi zmdi-refresh"></i> Get Tests</a></li>
                            <li {{(current_page("hit-map"))? 'class=navigation__active' : ''}}><a href="{{ route('hit-map') }}"><i class="zmdi zmdi-walk"></i>Check Status</a></li>
                            <li class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                    <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @elseif (Session::get('resource')[0]['roles'] == "NCCGHEALTHDOC")
                            <li class="{{ Request::is('health-dashboard')? 'navigation__active' : '' }}"><a href="{{ route('health-dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li {{(current_page("doctor-updates"))? 'class=navigation__active' : ''}}><a href="{{ route('doctor-updates') }}"><i class="zmdi zmdi-print"></i> Approve Tests</a></li>
                            <li {{(current_page("get-doc-approvals"))? 'class=navigation__active' : ''}}><a href="{{ route('get-doc-approvals') }}"><i class="zmdi zmdi-refresh"></i> Get Approvals</a></li>
                            <li {{(current_page("signature"))? 'class=navigation__active' : ''}}><a href="{{ route('signature') }}"><i class="zmdi zmdi-edit"></i> Upload Signature</a></li>
                            <li class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                    <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @elseif (Session::get('resource')[0]['roles'] == "HEALTH-BOOKINGS")
                        <li class="{{ Request::is('health-dashboard')? 'navigation__active' : '' }}"><a href="{{ route('health-dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li {{(current_page("bookings"))? 'class=navigation__active' : ''}}><a href="{{ route('bookings') }}"><i class="zmdi zmdi-desktop-mac"></i> Bookings</a></li>
                        <li {{(current_page("overdue-test"))? 'class=navigation__active' : ''}}><a href="{{ route('overdue-test') }}"><i class="zmdi zmdi-explicit"></i> Overdue Test</a></li>
                        <li class="">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                <i class="ti-power-off"></i>Logout</a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @elseif (Session::get('resource')[0]['roles'] == "NCCGHEALTHPRNT")
                            <li class="{{ Request::is('health-dashboard')? 'navigation__active' : '' }}"><a href="{{ route('health-dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="{{ Request::is('get-headers')? 'navigation__active' : '' }}"><a href="{{ route('get-headers') }}"><i class="zmdi zmdi-print"></i>Approve Print</a></li>
                            <li class="{{ Request::is('get-approved')? 'navigation__active' : '' }}"><a href="{{ route('get-approved') }}"><i class="zmdi zmdi-print"></i>Approved</a></li>
                            <li class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                    <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @elseif (Session::get('resource')[0]['roles'] == "HEALTHRPT")
                        <li class="{{ Request::is('health-reports')? 'navigation__active' : '' }}"><a href="{{ route('health-reports') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="{{ Request::is('health-transactions')? 'navigation__active' : '' }}"><a href="{{ route('health-transactions') }}"><i class="zmdi zmdi-swap"></i> Transactions</a></li>
                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-view-week"></i> Food Handler</a>
                            <ul>
                                <li class="{{ Request::is('get-all-approved')? 'navigation__active' : '' }}"><a href="{{ route('get-all-approved') }}"><i class="zmdi zmdi-print"></i>Approved Tests</a></li>
                                <li class="{{ Request::is('active-certs')? 'navigation__active' : '' }}"><a href="{{ route('active-certs') }}"><i class="flaticon-medal"></i> Active certs</a></li>
                                <li class="{{ Request::is('nonactive-certs')? 'navigation__active' : '' }}"><a href="{{ route('nonactive-certs') }}"><i class="flaticon-error-1"></i> Inactive certs</a></li>
                                <li class="{{ Request::is('cert-expiry-30-days')? 'navigation__active' : '' }}"><a href="{{ route('cert-expiry-30-days') }}"><i class="flaticon-calendar"></i> Expiry in 30 days</a></li>
                                <li class="{{ Request::is('corporate-bookings')? 'navigation__active' : '' }}"><a href="{{ route('corporate-bookings') }}"><i class="flaticon-watch"></i>Corporate Bookings</a></li>
                            </ul>
                        </li>
                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-view-week"></i> Food Hygiene</a>
                            <ul>
                                <li class="{{ Request::is('active-licenses')? 'navigation__active' : '' }}"><a href="{{ route('active-licenses') }}"><i class="flaticon-register-2"></i> Active Licenses</a></li>
                                <li class="{{ Request::is('nonactive-licenses')? 'navigation__active' : '' }}"><a href="{{ route('nonactive-licenses') }}"><i class="flaticon-error"></i> Non Active Licenses</a></li>
                                <li class="{{ Request::is('licenses-expiry-30-days')? 'navigation__active' : '' }}"><a href="{{ route('licenses-expiry-30-days') }}"><i class="flaticon-watch"></i> Licenses Expiry in 30 days</a></li>

                            </ul>
                        </li>
                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-view-week"></i> Bills/ Receipts</a>
                            <ul>
                                <li class="{{ Request::is('receipts')? 'navigation__active' : '' }}"><a href="{{ route('receipts') }}"><i class="ti-receipt"></i> Receipts</a></li>
                                <li class="{{ Request::is('health-bills')? 'navigation__active' : '' }}"><a href="{{ route('health-bills') }}"><i class="flaticon-invoices"></i> Bills</a></li>
                            </ul>
                        </li>

                            <li class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                    <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @elseif (Session::get('resource')[0]['roles'] == "HEALTHSPRT")
                           <li {{(current_page("support"))? 'class=navigation__active' : ''}}><a href="{{ route('support') }}"><i class="flaticon-test"></i> Support</a></li>
                           <li {{(current_page("support-mobile"))? 'class=navigation__active' : ''}}><a href="{{ route('support-mobile') }}"><i class="zmdi zmdi-phone-in-talk"></i> Update Mobile</a></li>
                           <li {{(current_page("get-bill-by-id"))? 'class=navigation__active' : ''}}><a href="{{ route('get-bill-by-id') }}"><i class="zmdi zmdi-phone-in-talk"></i>Get Bill</a></li>
                            <li {{(current_page("get-individual-name"))? 'class=navigation__active' : ''}}><a href="{{ route('get-individual-name') }}"><i class="zmdi zmdi-desktop-mac"></i> Individual</a></li>

                            <li class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                    <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        @elseif (Session::get('resource')[0]['roles'] == "HEALTHBILLER")
                            <li class="{{ Request::is('health-biller')? 'navigation__active' : '' }}"><a href="{{ route('health-biller') }}"><i class="zmdi zmdi-home"></i> Home</a></li>

                            <li {{(current_page("health-register"))? 'class=navigation__active' : ''}}><a href="{{ route('health-register') }}"><i class="zmdi zmdi-account-add"></i> Register</a></li>
                            <li {{(current_page("renew-handler"))? 'class=navigation__active' : ''}}><a href="{{ route('renew-handler') }}"><i class="zmdi zmdi-refresh"></i> Renew</a></li>
                            <li {{(current_page("hygiene"))? 'class=navigation__active' : ''}}><a href="{{ route('hygiene') }}"><i class="zmdi zmdi-apple"></i> Food Hygiene</a></li>
                            <li {{(current_page("renew-food-hygiene"))? 'class=navigation__active' : ''}}><a href="{{ route('renew-food-hygiene') }}"><i class="zmdi zmdi-apple"></i> Renew Food Hygiene</a></li>
                            <li {{(current_page("corporate"))? 'class=navigation__active' : ''}}><a href="{{ route('corporate') }}"><i class="zmdi zmdi-apple"></i>Corporate</a></li>
                            <li class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                    <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        @elseif (Session::get('resource')[0]['roles'] == "HEALTHDIRAPPROVAL")
                            <li class="{{ Request::is('health-biller')? 'navigation__active' : '' }}"><a href="{{ route('health-biller') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li {{(current_page("bookings"))? 'class=navigation__active' : ''}}><a href="{{ route('bookings') }}"><i class="zmdi zmdi-desktop-mac"></i> Bookings</a></li>
                            <li {{(current_page("users"))? 'class=navigation__active' : ''}}><a href="{{ route('users') }}"><i class="zmdi zmdi-account-add"></i> Add User</a></li>
                            <li {{(current_page("overdue-test"))? 'class=navigation__active' : ''}}><a href="{{ route('overdue-test') }}"><i class="zmdi zmdi-explicit"></i> Overdue Test</a></li>
                            <li {{(current_page("get-inspections"))? 'class=navigation__active' : ''}}><a href="{{ route('get-inspections') }}"><i class="zmdi zmdi-long-arrow-down"></i> Pending Inspections</a></li>
                            <li {{(current_page("inspected"))? 'class=navigation__active' : ''}}><a href="{{ route('inspected') }}"><i class="zmdi zmdi-check"></i>Inspected</a></li>
                            <li {{(current_page("approval"))? 'class=navigation__active' : ''}}><a href="{{ route('approval') }}"><i class="zmdi zmdi-check-all"></i>Approval</a></li>
                            <li {{(current_page("signature"))? 'class=navigation__active' : ''}}><a href="{{ route('signature') }}"><i class="flaticon-autograph"></i>Upload Signature</a></li>

                            <li class="">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" data-toggle-fullscreen="">
                                    <i class="ti-power-off"></i>Logout</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        @endif
                    </ul>
                </div>
            </aside>

            @yield('content')

            <footer class="footer hidden-xs-down">
                <p>Powered by RevenueSure</p>
            </footer>
        </main>

        <livewire:scripts />

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendors/popper.js/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendors/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>

        <script src="{{ asset('vendors/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('vendors/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
        <script src="{{ asset('vendors/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('vendors/jqvmap/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('vendors/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('vendors/salvattore/salvattore.min.js') }}"></script>
        <script src="{{ asset('vendors/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('vendors/moment/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/fullcalendar/fullcalendar.min.js') }}"></script>

        <!-- Charts and maps-->
        <script src="{{ asset('demo/js/flot-charts/curved-line.js') }}"></script>
        <script src="{{ asset('demo/js/flot-charts/dynamic.js') }}"></script>
        <script src="{{ asset('demo/js/flot-charts/line.js') }}"></script>
        <script src="{{ asset('demo/js/flot-charts/chart-tooltips.js') }}"></script>
        <script src="{{ asset('demo/js/other-charts.js') }}"></script>
        <script src="{{ asset('demo/js/jqvmap.js') }}"></script>

        <!-- App functions and actions -->
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <!-- Vendors: Data tables -->
        <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables-buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('vendors/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables-buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('vendors/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('vendors/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
        <script src="{{ asset('vendors/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ asset('vendors/trumbowyg/trumbowyg.min.js') }}"></script>
        <script src="{{ asset('vendors/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('vendors/rateyo/jquery.rateyo.min.js') }}"></script>
        <script src="{{ asset('vendors/jquery-text-counter/textcounter.min.js') }}"></script>
        <script src="{{ asset('vendors/autosize/autosize.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('js/dropify2.js') }}"></script>

        {{-- wow --}}
        <script src="{{ asset('vendors/owl/js/owl.carousel.min.js') }}"></script>
        {{-- wow --}}

        <script>
			$('.dropify').dropify();
		</script>


    </body>

</html>
