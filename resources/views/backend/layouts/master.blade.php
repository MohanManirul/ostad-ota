<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    @stack('per_page_title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!--css start-->
    @include('backend.layouts._css')
    <!--css end-->

    <style>
        #back-to-top {
            bottom: 60px;
        }
    </style>

</head>

<body>
    {{-- progree bar start --}}
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    {{-- progree bar end --}}

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('backend.layouts._topBar')
        @include('backend.layouts._leftSideBar')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->
                </div>
                <!-- container-fluid -->
            </div>

            @include('backend.layouts._footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    @include('backend.layouts._js')

</body>

</html>
