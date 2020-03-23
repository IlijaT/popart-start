<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar__holder">
                    <div class="navbar__icons">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none">
                                <path class="top-hamburger-line" fill-rule="evenodd" clip-rule="evenodd" d="M0.101562 0V2H16.1294V0H0.101562Z" fill="#144069"/>
                                <path class="middle-hamburger-line" fill-rule="evenodd" clip-rule="evenodd" d="M0.101562 7H16.1294V5H0.101562V7ZM0.101562" fill="#144069"/>
                                <path class="bottom-hamburger-line" fill-rule="evenodd" clip-rule="evenodd" d="M0.101562 12H16.1294V10H0.101562V12ZM0.101562" fill="#144069"/>
                            </svg>
                        </a>
                        <a href="#" class="sidebar-home">
                            <svg width="19" height="15" viewBox="0 0 19 15" fill="none">
                                <path d="M9.15371 3.59961L2.74172 8.87644C2.74172 8.88389 2.73984 8.89484 2.73609 8.90978C2.73242 8.92459 2.73047 8.93535 2.73047 8.943V14.2863C2.73047 14.4793 2.80113 14.6465 2.9424 14.7873C3.08364 14.9281 3.25089 14.999 3.44419 14.999H7.7262V10.7242H10.5813V14.9992H14.8632C15.0565 14.9992 15.224 14.9284 15.365 14.7873C15.5063 14.6466 15.5772 14.4793 15.5772 14.2863V8.943C15.5772 8.91336 15.5731 8.89098 15.5659 8.87644L9.15371 3.59961Z" fill="#144069"/>
                                <path d="M18.0187 7.67449L15.5767 5.64844V1.10651C15.5767 1.00268 15.5432 0.917288 15.4761 0.850458C15.4096 0.783705 15.324 0.750329 15.2198 0.750329H13.0787C12.9746 0.750329 12.8891 0.783705 12.8221 0.850458C12.7553 0.917288 12.7219 1.00272 12.7219 1.10651V3.27725L10.001 1.00623C9.76335 0.81326 9.4808 0.716797 9.15364 0.716797C8.82653 0.716797 8.54401 0.81326 8.30615 1.00623L0.287979 7.67449C0.21365 7.73376 0.172912 7.81353 0.165334 7.91374C0.157796 8.01387 0.18377 8.10132 0.243334 8.17548L0.934713 8.99928C0.994277 9.06604 1.07224 9.10686 1.16891 9.12179C1.25816 9.12928 1.34741 9.10323 1.43666 9.04389L9.15341 2.62045L16.8702 9.04385C16.9298 9.09563 17.0078 9.12148 17.1044 9.12148H17.1379C17.2345 9.10682 17.3123 9.06572 17.3721 8.99913L18.0636 8.17544C18.123 8.10113 18.1491 8.01383 18.1414 7.91358C18.1337 7.81365 18.0929 7.73387 18.0187 7.67449Z" fill="#144069"/>
                            </svg>
                        </a>
                        <a href="#">
                            <span class="navbar__icons-text">Back to website</span>
                        </a>
                    </div>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <span class="navbar-custom-menu__icon-holder">
                            <img class="navbar-custom-menu__icon" src="{{ asset('images/user-icon.png') }}" alt="User">
                        </span>
                        <span class="navbar-custom-menu__name">Admin Administratovic</span>
                        <span>
                            <form id="logout-form" action="#">
                                @csrf
                                <button type="submit" class="blue-dashed-btn blue-dashed-btn--logout">Logout</button>
                            </form>
                        </span>
                    </div>
                </div>

            </nav>
        </header>

        @include('layouts._dashboard_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content container-fluid">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

 
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('js/dashboard.js') }}"></script>

    @yield('script')

</body>

</html>
