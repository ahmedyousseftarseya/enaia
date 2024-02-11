<!-- Bootstrap Css -->
<link href="{{ URL::asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

@if (app()->getLocale() == 'ar')
    <link href="{{ URL::asset('build/css/app.min.rtl.css') }}"  rel="stylesheet" type="text/css" />
    <style>
        .metismenu {
            margin-right: -40px;
        }
    </style>
@else
    <!-- App Css-->
    <link href="{{ URL::asset('build/css/app.min.css') }}"  rel="stylesheet" type="text/css" />
@endif


@yield('css')
