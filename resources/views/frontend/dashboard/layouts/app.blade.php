
<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    
    @stack('per_page_meta')
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

   <!--css start-->
   @include('backend.layouts._css')
   <!--css end-->

<style>
    #back-to-top{
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
    

    <div id="layout-wrapper">



            @yield('content')

            
            
            
        </div>

        @include('backend.layouts._footer')


    @include('backend.layouts._js')


</body>

</html>