<!-- Bootstrap Css -->
<link href="{{ asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
{{-- selet2 --}}
<link href="{{ asset('build/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


@if (app()->getLocale() == 'ar')

    <link href="{{ asset('build/css/app.min.rtl.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/css/custom-rtl.css') }}"  rel="stylesheet" type="text/css" />

@else
    <!-- App Css-->
    <link href="{{ asset('build/css/app.min.css') }}"  rel="stylesheet" type="text/css" />
@endif


<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap');

    *,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Tajawal', sans-serif;
    }

    .form-switch .form-check-input {
        border: 1px solid #1f58c7;
        margin-left: -2em;
    }

    /* image classes */
    .img-200 {
        height: 200px;
        width: 200px;
    }

    .img-50 {
        height: 50px;
        width: 50px;
    }

    .img-23 {
        height: 23px;
        width: 23px;
        filter: invert(53%) sepia(11%) saturate(439%) hue-rotate(185deg) brightness(93%) contrast(83%);
    }

    /* customize select2 */
    .select2,
    .selection {
        border-radius: 10px !important;
        height: 44px !important;
        border: 1px solid #dbd6d6 !important;
        padding: 8px 16px !important;
    }
    
    .form-control
    {
        border-radius: 10px !important;
        border: 1px solid #dbd6d6 !important;
        padding: 8px 16px !important;
    }

     .form-select
    {
        border: 1px solid #dbd6d6 !important;
    }

    .selection {
        border: none !important;
        padding: 0px !important;
    }

    .select2-container--default .select2-selection--single {
        background-color: transparent !important;
        border: none !important;
        line-height: 0px;
    }

   
</style>


@yield('css')
