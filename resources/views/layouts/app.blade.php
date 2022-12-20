<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Talaba.net Boshqaruv paneli!</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-talaba-net.png') }}">

     <!-- App css -->
     <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
     @yield('css-link')
</head>
<body id="body" class="dark-sidebar" >
    <!-- leftbar-tab-menu -->
    <div class="left-sidebar">
        <!-- LOGO -->
        <div class="brand">
            <a href="{{ route('home') }}" class="logo">
                <span>
                    <img src="{{ asset('assets/images/logo-talaba-net.png') }}" alt="logo-small" class="logo-sm">
                    
                    <span style="color: white;font-size: 17px;">Telaba.net</span>
                </span>
            </a>
        </div>
        <div class="sidebar-user-pro media border-end">                    
            <div class="position-relative mx-auto">
                <img src="{{ asset('assets/images/users/user-8.jpg') }}" alt="user" class="rounded-circle thumb-md">
                <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
            </div>
            <div class="media-body ms-2 user-detail align-self-center">
                <h5 class="font-14 m-0 fw-bold">{{ Auth::user()->name }}</h5>  
                <p class="opacity-50 mb-0">{{ Auth::user()->email }}</p>          
            </div>                    
        </div>
        
        <!-- Tab panes -->

        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <div class="menu-body navbar-vertical pt-0">
                <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                        

                        <li class="menu-label mt-0 text-primary font-12 fw-semibold">B<span>o'limlar</span><br><span class="font-10 text-secondary fw-normal">Menyularni tanlang!</span></li>

                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"> <i class="ti ti-dashboard menu-icon"></i> <span>Bosh sahifa</span></a>
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rate') }}"> <i class="ti ti-layout-list menu-icon"></i> <span>Tariflar</span></a>
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client') }}"> <i class="ti ti-users menu-icon"></i> <span>Klientlar</span></a>
                        </li><!--end nav-item-->
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vuacher') }}"> <i class="ti ti-file-invoice menu-icon"></i> <span>Vuacherlar</span></a>
                            <div class="collapse show" id="sidebarAnalytics">
                                <ul class="nav flex-column">
                                    <li class="nav-item menuitem-active">
                                        <a class="nav-link" href="{{ route('vuacher.set.list') }}" aria-expanded="true">Berilgan vuacherlar ro'yhati</a>
                                    </li><!--end nav-item-->
                                </ul><!--end nav-->
                            </div>
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('payment') }}"> <i class="ti ti-credit-card menu-icon"></i> <span>To'lovlar</span></a>
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('provider') }}"> <i class="ti ti-browser menu-icon"></i> <span>To'lov tizimlari</span></a>
                        </li><!--end nav-item-->
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bots') }}"> <i class="ti ti-tool menu-icon"></i> <span>Bot sozlamalari</span></a>
                        </li><!--end nav-item-->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}"> <i class="ti ti-user menu-icon"></i> <span>Profile</span></a>
                        </li><!--end nav-item-->

                        

                        <!-- <li class="nav-item menuitem-active">
                            <a class="nav-link active" href="{{ route('home') }}"> <i class="ti ti-dashboard menu-icon"></i> <span>Bosh sahifa</span></a>
                        </li> --><!--end nav-item-->
                        
                    </ul>
                    
                </div><!--end sidebarCollapse-->
            </div>
        </div>    
    </div>
    <!-- end left-sidenav-->
    <!-- end leftbar-menu-->

    <!-- Top Bar Start -->
    <!-- Top Bar Start -->
    <div class="topbar">            
        <!-- Navbar -->
        <nav class="navbar-custom" id="navbar-custom">    
            <ul class="list-unstyled topbar-nav float-end mb-0">

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="{{ route('profile') }}" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/images/users/user-8.jpg') }}" alt="profile-user" class="rounded-circle me-2 thumb-sm" />
                            <div>
                                <small class="d-none d-md-block font-11">Admin</small>
                                <span class="d-none d-md-block fw-semibold font-12">{{ Auth::user()->name }} <i
                                        class="mdi mdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('profile') }}"><i class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('profile') }}"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i> Sozlamalar</a>
                        <div class="dropdown-divider mb-0"></div>
                        

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="ti ti-power font-16 me-1 align-text-bottom"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li><!--end topbar-profile-->
                 
            </ul><!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">                        
                <li>
                    <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </li> 
                <li class="hide-phone app-search">
                    <form role="search" action="#" method="get">
                        <input type="search" name="search" class="form-control top-search mb-0" placeholder="Type text...">
                        <button type="submit"><i class="ti ti-search"></i></button>
                    </form>
                </li>                       
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">
            @yield('content')
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->   

    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/pages/analytics-index.init.js') }}"></script>
    @yield('script-link')
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script type="text/javascript">
        @yield('script')
    </script>
</body>
</html>
