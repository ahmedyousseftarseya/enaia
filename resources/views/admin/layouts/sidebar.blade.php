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
                        <i class="bx bx-home-alt icon nav-icon"></i>
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
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-store icon nav-icon"></i>
                        <span class="menu-item" data-key="t-ecommerce">Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products" data-key="t-products">Products</a></li>
                        <li><a href="ecommerce-product-detail" data-key="t-product-detail">Product Detail</a></li>
                        <li><a href="ecommerce-orders" data-key="t-orders">Orders</a></li>
                        <li><a href="ecommerce-customers" data-key="t-customers">Customers</a></li>
                        <li><a href="ecommerce-cart" data-key="t-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout" data-key="t-checkout">Checkout</a></li>
                        <li><a href="ecommerce-shops" data-key="t-shops">Shops</a></li>
                        <li><a href="ecommerce-add-product" data-key="t-add-product">Add Product</a></li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
