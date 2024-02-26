<header id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="javascript:void(0)" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                </a>

                <a href="javascript:void(0)" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('build/images/logo-light.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('build/images/logo-light-sm.png') }}" alt="" height="26">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="bx bx-menu align-middle"></i>
            </button>

            <!-- start page title -->
            <div class="page-title-box align-self-center d-none d-md-block">
                <h4 class="page-title mb-0">@yield('page-title')</h4>
            </div>
            <!-- end page title -->

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block language-switch ms-2">
                <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    @if(app()->getLocale() == 'ar')
                        <img class="header-lang-img"
                            src="{{ asset("build/images/flags/arabic.png") }}"
                            alt="Header Language" height="18"
                        />
                    @else
                        <img class="header-lang-img"
                            src="{{ asset("build/images/flags/us.jpg") }}"
                            alt="Header Language" height="18"
                        />
                    @endif
                      
                </button>
                
                <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     <a href="{{ route('admin.lang', 'ar') }}" class="dropdown-item notify-item language" data-lang="ar">
                        <img src="{{ asset('build/images/flags/arabic.png') }}" alt="user-image" class="{{ isRtl() ? 'ms-1' : 'me-1' }}"
                            height="12"> <span class="align-middle">Arabic</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('admin.lang', 'en') }}" class="dropdown-item notify-item language" data-lang="en">
                        <img src="{{ asset('build/images/flags/us.jpg') }}" alt="user-image" class="{{ isRtl() ? 'ms-1' : 'me-1' }}"
                            height="12"> <span class="align-middle">English</span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</header>


