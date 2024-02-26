<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('admin.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="28">
            </span>
        </a>

        <a href="index" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt=""class="img-23">
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-light-sm.png') }}" alt="" height="26">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">{{ __('lang.dashboard') }}</li>

                @if(auth('admin')->user()->isAbleTo('admin_read-dashboard'))
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <img src="{{ URL::asset('build/images/home-icon.png') }}" alt="" class="img-23">
                            <span class="menu-item">{{ __('lang.dashboard') }}</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/doctor-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.doctors') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-doctors'))
                            <li><a href="{{ route('admin.doctors.index') }}">{{ __('lang.doctors_list') }}</a></li>
                        @endif

                        @if(auth('admin')->user()->isAbleTo('admin_create-doctors'))
                            <li><a href="{{ route('admin.doctors.create') }}">{{ __('lang.add') . ' ' . __('lang.doctor') }}</a></li>
                        @endif
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
