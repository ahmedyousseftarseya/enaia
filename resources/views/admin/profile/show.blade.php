@extends('admin.layouts.master')

@section('title', __('lang.profile'))

@section('page-title', __('lang.profile'))

@section('content')

    <div class="row">
        {{-- right side --}}
        <div class="col-xxl-4 mt-4">
            <div class="card">
                <div class="card-body p-0">

                    {{-- cover image and actions --}}
                    <div class="user-profile-img">
                        <img src="{{ $admin->image_url }}"
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
                                                <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="post" class="dropdown-item">
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
                            <img src="{{ $admin->image_url }}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                        </div>

                        {{-- info (email, phone, ..) --}}
                        <div class="table-responsive mt-3 pb-3">
                            <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.username') }} :</th>
                                        <td class="text-muted">{{ $admin->username }}</td>
                                    </tr>

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.role') }} :</th>
                                        <td class="text-muted">{{ $admin->getRole()->name ?? '-' }}</td>
                                    </tr>
                                  
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.phone') }} :</th>
                                        <td class="text-muted">{{ $admin->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.email') }} :</th>
                                        <td class="text-muted">{{ $admin->email }}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>

        {{-- ////////////////////////////// --}}
        <div class="col-xxl-8">
          
            @component('admin.layouts.components.card', ['title' => __('lang.edit_profile')])

                @slot('content')

                    @include('admin.profile._form')
                    
                @endslot
            @endcomponent

        </div>

    </div>
    <!-- end row -->



@endsection


