@extends('accountant::layouts.master')

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
                        <img src="{{ $accountant->image_url }}"
                            class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                        <div class="overlay-content rounded-top">
                        </div>
                    </div>
                    {{-- end cover image and actions --}}

                    <div class="p-4 pt-0">

                        {{-- doctor image --}}
                        <div class="mt-n5 position-relative text-center border-bottom pb-3">
                            <img src="{{ $accountant->image_url }}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                        </div>

                        {{-- info (email, phone, ..) --}}
                        <div class="table-responsive mt-3 pb-3">
                            <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.name') }} :</th>
                                        <td class="text-muted">{{ $accountant->name }}</td>
                                    </tr>

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.username') }} :</th>
                                        <td class="text-muted">{{ $accountant->username }}</td>
                                    </tr>
                                  
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.phone') }} :</th>
                                        <td class="text-muted">{{ $accountant->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.email') }} :</th>
                                        <td class="text-muted">{{ $accountant->email }}</td>
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
          
            @component('accountant::layouts.components.card', ['title' => __('lang.edit_profile')])

                @slot('content')

                    @include('accountant::profile._form')
                    
                @endslot
            @endcomponent

        </div>

    </div>
    <!-- end row -->



@endsection


