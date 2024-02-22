<header id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
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
                            height="12"> <span class="align-middle">{{ __('lang.arabic') }}</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('admin.lang', 'en') }}" class="dropdown-item notify-item language" data-lang="en">
                        <img src="{{ asset('build/images/flags/us.jpg') }}" alt="user-image" class="{{ isRtl() ? 'ms-1' : 'me-1' }}"
                            height="12"> <span class="align-middle">{{ __('lang.english') }}</span>
                    </a>
                </div>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ auth('admin')->user()->image_url }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block fw-medium font-size-15 {{ isRtl() ? 'me-2' : 'ms-2' }}">{{ auth('admin')->user()->username }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">{{ auth('admin')->user()->username }}</h6>
                        <p class="mb-0 font-size-11 text-muted">{{auth('admin')->user()->email }}</p>
                    </div>

                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="mdi mdi-account-circle text-muted font-size-16 align-middle {{ isRtl() ? 'ms-2' : 'me-2' }}"></i> 
                        <span class="align-middle">{{ __('lang.profile') }}</span>
                    </a>
                    
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.settings.globalSettings') }}">
                        <i class="mdi mdi-cog-outline text-muted font-size-16 align-middle {{ isRtl() ? 'ms-2' : 'me-2' }}"></i> 
                        <span class="align-middle {{ isRtl() ? 'ms-3' : 'me-3' }}">{{ __('lang.settings') }}</span>
                        <span class="badge bg-success-subtle text-success ms-auto">New</span>
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle {{ isRtl() ? 'ms-2' : 'me-2' }}"></i> <span
                            class="align-middle">{{ __('lang.logout') }}</span></a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</header>
