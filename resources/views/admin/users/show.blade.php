@extends('admin.layouts.master')

@section('title', __('lang.show') . ' ' . __('lang.customer'))

@section('page-title', __('lang.show') .  ' ' . $user->name )

@section('content')

    <div class="row">
        {{-- right side --}}
        <div class="col-xxl-4 mt-4">
            <div class="card">
                <div class="card-body p-0">

                    {{-- cover image and actions --}}
                    <div class="user-profile-img">
                        <img src="{{ $user->image_url }}"
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
                                                <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}">{{ __('lang.edit') }}</a>
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="dropdown-item">
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
                            <img src="{{ $user->image_url }}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                        </div>

                        {{-- info (email, phone, ..) --}}
                        <div class="table-responsive mt-3 pb-3">
                            <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.national_id') }} :</th>
                                        <td class="text-muted">{{ $user->national_id }}</td>
                                    </tr>

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.name') }} :</th>
                                        <td class="text-muted">{{ $user->name }}</td>
                                    </tr>

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.date_of_birth') }} :</th>
                                        <td class="text-muted">{{ $user->date_of_birth }}</td>
                                    </tr>
                                  
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.phone') }} :</th>
                                        <td class="text-muted">{{ $user->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th class="fw-bold">{{ __('lang.email') }} :</th>
                                        <td class="text-muted">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.gender') }} :</th>
                                        <td class="text-muted">{{ $user->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.nationality') }} :</th>
                                        <td class="text-muted">{{ $user->nationality }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.blood_group') }} :</th>
                                        <td class="text-muted">{{ $user->blood_group }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">{{ __('lang.address') }} :</th>
                                        <td class="text-muted">{{ $user->address }}</td>
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
          
            @component('admin.layouts.components.card', ['title' => __('lang.reservations')])

                @slot('content')

                  {{-- table component --}}
            @component('admin.layouts.components.table')
            @slot('headers')
                <th>#</th>
                <th>{{ __('lang.date') }}</th>
                <th>{{ __('lang.doctor') }}</th>
                <th>{{ __('lang.service') }}</th>
                <th>{{ __('lang.action') }}</th>
            @endslot

            @slot('data')
                {{-- @if ($resources->count() == 0)
                    <tr>
                        <td colspan="8" class="text-center py-3 text-muted">
                            {{ __('lang.no_data') }}
                        </td>
                    </tr>
                @else --}}
                    {{-- @foreach ($resources as $resource) --}}
                        <tr>
                            <td>#</td>
                            <td>
                                <img src="#" class="img-50 rounded-circle {{ isRtl() ? 'ms-2' : 'me-2' }}"
                                    alt="not found">
                               dsdsds
                            </td>
                            <td>dsds</td>
                            <td>dsds</td>
                            <td>dsds</td>
                            <td>
                                {{-- <a href="{{ route('admin.admins.show', $resource->id) }}" class="btn btn-xs btn-info">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="{{ route('admin.admins.edit', $resource->id) }}" class="btn btn-xs btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <form action="{{ route('admin.admins.destroy', $resource->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger sw-alert"
                                        onclick="return confirm('{{ __('lang.are_you_sure') }}')">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form> --}}

                            </td>
                        </tr>
                    {{-- @endforeach --}}
                {{-- @endif --}}
            @endslot
        @endcomponent
        {{-- end table component --}}
                    
                @endslot
            @endcomponent

        </div>

        </div>

    </div>
    <!-- end row -->



@endsection


