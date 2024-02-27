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

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/nurse-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.nurses') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-nurses'))
                            <li><a href="{{ route('admin.nurses.index') }}">{{ __('lang.nurses_list') }}</a></li>
                        @endif
                        
                        @if(auth('admin')->user()->isAbleTo('admin_create-nurses'))
                            <li><a href="{{ route('admin.nurses.create') }}">{{ __('lang.add') . ' ' . __('lang.nurse') }}</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/head-nurse-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.accountants') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- @if(auth('admin')->user()->isAbleTo('admin_read-accountants')) --}}
                            <li> <a href="{{ route('admin.accountants.index') }}">{{ __('lang.accountants_list') }}</a></li>
                        {{-- @endif --}}
                        
                        {{-- @if(auth('admin')->user()->isAbleTo('admin_create-accountants')) --}}
                            <li><a href="{{ route('admin.accountants.create') }}">{{ __('lang.add') . ' ' . __('lang.accountant') }}</a></li>
                        {{-- @endif --}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/head-nurse-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.head_nurses') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-head-nurses'))
                            <li> <a href="{{ route('admin.head-nurses.index') }}">{{ __('lang.head_nurses_list') }}</a></li>
                        @endif
                        
                        @if(auth('admin')->user()->isAbleTo('admin_create-head-nurses'))
                            <li><a href="{{ route('admin.head-nurses.create') }}">{{ __('lang.add') . ' ' . __('lang.head_nurse') }}</a></li>
                        @endif
                    </ul>
                </li>

                @if(auth('admin')->user()->isAbleTo('admin_read-customers'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <img src="{{ URL::asset('build/images/customer-icon.png') }}" alt=""class="img-23">
                            <span class="menu-item">{{ __('lang.customers') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.users.index') }}">{{ __('lang.customers_list') }}</a></li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/service-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.services') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-services'))
                            <li> <a href="{{ route('admin.services.index') }}">{{ __('lang.services_list') }}</a> </li>
                        @endif

                        @if(auth('admin')->user()->isAbleTo('admin_create-services'))
                            <li><a href="{{ route('admin.services.create') }}">{{ __('lang.add') . ' ' . __('lang.service') }}</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/admin-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.admins') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-admins'))
                            <li> <a href="{{ route('admin.admins.index') }}">{{ __('lang.admins_list') }}</a> </li>
                        @endif
                        
                        @if(auth('admin')->user()->isAbleTo('admin_create-admins'))
                            <li><a href="{{ route('admin.admins.create') }}">{{ __('lang.add') . ' ' . __('lang.admin') }}</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/roles-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.roles') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-roles'))
                            <li><a href="{{ route('admin.roles.index') }}">{{ __('lang.roles_list') }} </a> </li>
                        @endif
                        
                        @if(auth('admin')->user()->isAbleTo('admin_create-roles'))
                            <li><a href="{{ route('admin.roles.create') }}">{{ __('lang.add') . ' ' . __('lang.role') }}</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/country-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.countries') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-countries'))
                            <li><a href="{{ route('admin.countries.index') }}">{{ __('lang.countries_list') }}</a></li>
                        @endif
                        
                        @if(auth('admin')->user()->isAbleTo('admin_create-countries'))
                            <li><a href="{{ route('admin.countries.create') }}">{{ __('lang.add') . ' ' . __('lang.country') }}</a></li>
                        @endif
                    </ul>
                </li>
                 
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/city-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.cities') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth('admin')->user()->isAbleTo('admin_read-cities'))
                            <li><a href="{{ route('admin.cities.index') }}">{{ __('lang.cities_list') }}</a></li>
                        @endif
                        
                        @if(auth('admin')->user()->isAbleTo('admin_create-cities'))
                            <li><a href="{{ route('admin.cities.create') }}">{{ __('lang.add') . ' ' . __('lang.city') }}</a></li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <img src="{{ URL::asset('build/images/city-icon.png') }}" alt=""class="img-23">
                        <span class="menu-item">{{ __('lang.coupons') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- @if(auth('admin')->user()->isAbleTo('admin_read-coupons')) --}}
                            <li><a href="{{ route('admin.coupons.index') }}">{{ __('lang.coupons_list') }}</a></li>
                        {{-- @endif --}}
                        
                        {{-- @if(auth('admin')->user()->isAbleTo('admin_create-coupons')) --}}
                            <li><a href="{{ route('admin.coupons.create') }}">{{ __('lang.add') . ' ' . __('lang.coupon') }}</a></li>
                        {{-- @endif --}}
                    </ul>
                </li>

                @if(auth('admin')->user()->isAbleTo('admin_read-settings'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <img src="{{ URL::asset('build/images/settings-icon.png') }}" alt=""class="img-23">
                            <span class="menu-item">{{ __('lang.settings') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.settings.globalSettings') }}">{{ __('lang.global_settings') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.settings.contactSettings') }}">{{ __('lang.contact_settings') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
              
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
