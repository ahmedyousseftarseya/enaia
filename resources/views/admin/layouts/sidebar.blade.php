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
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30">
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
                <li class="menu-title" data-key="t-menu">Dashboard</li>

                <li>
                    <a href="{{ route('admin.index') }}">
                        <i class="bx bx-home-alt icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.dashboard') }}</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa fa-user-md icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.doctors') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.doctors.index') }}">{{ __('lang.doctors_list') }}</a></li>
                        <li><a href="{{ route('admin.doctors.create') }}">{{ __('lang.add') . ' ' . __('lang.doctor') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.nurses') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.nurses.index') }}">{{ __('lang.nurses_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                        <li><a href="{{ route('admin.nurses.create') }}">{{ __('lang.add') . ' ' . __('lang.nurse') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.head_nurses') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.head-nurses.index') }}">{{ __('lang.head_nurses_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                        <li><a href="{{ route('admin.head-nurses.create') }}">{{ __('lang.add') . ' ' . __('lang.head_nurse') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.customers') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.users.index') }}">{{ __('lang.customers_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.services') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.services.index') }}">{{ __('lang.services_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                        <li><a href="{{ route('admin.services.create') }}">{{ __('lang.add') . ' ' . __('lang.service') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.admins') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.admins.index') }}">{{ __('lang.admins_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                        <li><a href="{{ route('admin.admins.create') }}">{{ __('lang.add') . ' ' . __('lang.admin') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.roles') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.roles.index') }}">{{ __('lang.roles_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                        <li><a href="{{ route('admin.roles.create') }}">{{ __('lang.add') . ' ' . __('lang.role') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.countries') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.countries.index') }}">{{ __('lang.countries_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                        <li><a href="{{ route('admin.countries.create') }}">{{ __('lang.add') . ' ' . __('lang.country') }}</a></li>
                    </ul>
                </li>

                 
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
                        <span class="menu-item">{{ __('lang.cities') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.cities.index') }}">{{ __('lang.cities_list') }}
                                {{-- <span class="badge rounded-pill bg-primary">2</span> --}}
                            </a>
                        </li>
                        
                        <li><a href="{{ route('admin.cities.create') }}">{{ __('lang.add') . ' ' . __('lang.city') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user icon nav-icon"></i>
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

                
                {{-- <li class="menu-title" data-key="t-applications">Applications</li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fa fa-user-md icon nav-icon"></i>
                        <span class="menu-item" data-key="t-email">Doctors</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox" data-key="t-inbox">Doctors List</a></li>
                        <li><a href="email-read" data-key="t-read-email">Add Doctor</a></li>
                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="apps-calendar">
                        <i class="bx bx-calendar-event icon nav-icon"></i>
                        <span class="menu-item" data-key="t-calendar">Calendar</span>
                    </a>
                </li> --}}


                {{-- <li>
                    <a href="apps-chat">
                        <i class="bx bx-chat icon nav-icon"></i>
                        <span class="menu-item" data-key="t-chat">Chat</span>
                        <span class="badge rounded-pill bg-danger" data-key="t-hot">Hot</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
