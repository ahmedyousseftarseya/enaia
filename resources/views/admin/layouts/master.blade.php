<!doctype html>

<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- include head css -->
    @include('admin.layouts.css')
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- topbar -->
        @include('admin.layouts.topbar')

        <!-- sidebar components -->
        @include('admin.layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')

                    @include('sweetalert::alert')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- footer -->
            {{-- @include('admin.layouts.footer') --}}

        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- customizer -->
    @include('admin.layouts.right-sidebar')

    <!-- vendor-scripts -->
    @include('admin.layouts.scripts')

</body>

</html>
