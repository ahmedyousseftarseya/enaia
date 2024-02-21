@extends('admin.layouts.master')

@section('title', __('lang.doctors_list'))

@section('page-title', __('lang.doctors'))

@section('content')

    <div class="row">
        {{-- right side --}}
        <div class="col-xxl-3">
            <div class="card">

                <div class="card-body p-0">

                    {{-- cover image and actions --}}
                    <div class="user-profile-img">
                        <img src="{{ $doctor->image_url }}"
                            class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                        <div class="overlay-content rounded-top">
                            <div>
                                <div class="user-nav p-3">
                                    <div class="d-flex justify-content-end">
                                        <div class="dropdown">
                                            <a class="text-muted dropdown-toggle font-size-16" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                <i class="bx bx-dots-vertical text-white font-size-20"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('admin.doctors.edit', $doctor->id) }}">{{ __('lang.edit') }}</a>
                                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="post" class="dropdown-item">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="outline-none bg-transparent border-0"
                                                        onclick="return confirm('{{ __('lang.are_you_sure') }}')">
                                                        {{ __('lang.delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end cover image and actions --}}


                    <div class="p-4 pt-0">

                        {{-- doctor image --}}
                        <div class="mt-n5 position-relative text-center border-bottom pb-3">
                            <img src="{{ $doctor->image_url }}" alt=""
                                class="avatar-xl rounded-circle img-thumbnail">

                            <div class="mt-3">
                                <h5 class="mb-1">{{ $doctor->name }}</h5>
                                {{-- <p class="text-muted mb-0">
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star-half text-warning font-size-14"></i>
                                </p> --}}
                            </div>

                        </div>

                        {{-- info (email, phone, ..) --}}

                        <div class="table-responsive mt-3 border-bottom pb-3">
                            <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.specialization') }} :</th>
                                        <td class="text-muted">{{ $doctor->specialization?->name }}</td>
                                    </tr>
                                    <!-- end tr -->
                                  
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.phone') }} :</th>
                                        <td class="text-muted">{{ $doctor->phone }}</td>
                                    </tr>
                                    <!-- end tr -->

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.email') }} :</th>
                                        <td class="text-muted">{{ $doctor->email }}</td>
                                    </tr>
                                    <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table>
                        </div>


                        <div class="p-3 mt-3">
                            <div class="row text-center">
                                <div class="col-6 border-end">
                                    <div class="p-1">
                                        <h5 class="mb-1">{{ $doctor->nurses->count() }}</h5>
                                        <p class="text-muted mb-0">{{ __('lang.nurses') }}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-1">
                                        <h5 class="mb-1">10</h5>
                                        <p class="text-muted mb-0">{{ __('lang.reservations') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        {{-- ////////////////////////////// --}}
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">
                                <span>{{ __('lang.overview') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#reservations" role="tab">
                                <span>{{ __('lang.reservations') }}</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <!-- Tab content -->
            <div class="tab-content">
                {{-- overview --}}
                <div class="tab-pane active" id="overview" role="tabpanel">
                   @include('admin.doctors.__show.overview')
                </div>

                {{-- reservations --}}
                <div class="tab-pane" id="reservations" role="tabpanel">
                   @include('admin.doctors.__show.reservations')
                </div>

            </div>

        </div>

    </div>
    <!-- end row -->



@endsection
@section('scripts')
    <!-- apexcharts -->
    {{-- <script src="{{ asset('build/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('build/js/pages/profile.init.js') }}"></script> --}}
    {{-- <!-- App js -->
    <script src="{{ asset('build/js/app.js') }}"></script> --}}
@endsection


