@extends('admin.layouts.master-without-nav')
@section('title')
    Login
@endsection
@section('page-title', 'Login')

@section('css')

    <style>
        .ishorizontal-topbar, .isvertical-topbar {
            right: 0px;
            left: 0px;
        }

    </style>

@endsection

@include('admin.auth.topbar')

@section('content')
    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="mb-4 pb-2">
                            <a href="javascript:void(0)" class="d-block auth-logo">
                                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="30"
                                    class="auth-logo-dark me-start">
                                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30"
                                    class="auth-logo-light me-start">
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5>{{ __('lang.welcome_back') }}</h5>
                                    <p class="text-muted">{{ __('lang.sign_in_to_continue_to_admin_panel') }}</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('accountant.login') }}" class="auth-input {{ isRtl() ? 'text-end' : '' }}">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="username" class="form-label">{{ __('lang.username') }}</label>
                                            <input id="username" type="username" name="username"
                                                class="form-control {{ isRtl() ? 'text-end' : '' }} "
                                                {{-- @error('username') is-invalid @enderror"  --}}
                                                value="{{ old('username', 'test') }}" required autocomplete="username" autofocus
                                            />
                                            @error('username')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="password-input">{{ __('lang.password') }}</label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                {{-- <span class="bx bx-lock-alt"></span> --}}
                                                <input type="password" id="password-input" name="password"
                                                    class="form-control {{ isRtl() ? 'text-end' : '' }}"
                                                    {{-- @error('password') is-invalid @enderror" --}}
                                                    placeholder="Enter password" 
                                                    required autocomplete="current-password" value="123456"
                                                />
                                                <button type="button"
                                                    class="btn btn-link position-absolute h-100 {{ isRtl() ? 'start-0' : 'end-0' }} top-0"
                                                    id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">Remember
                                                me</label>
                                        </div> --}}

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">{{ __('lang.login') }}</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> webadmin. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                Themesdesign
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->
@endsection

@section('scripts')
    <script src="{{ asset('build/js/pages/pass-addon.init.js') }}"></script>
@endsection
