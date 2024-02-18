@extends('admin.layouts.master')

@php
    $title = $resource->id ?  __('lang.edit') . ' ' . __('lang.admin')  :  __('lang.add') . ' ' . __('lang.admin');
@endphp


@section('title', $title)

@section('page-title', __('lang.admins'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.admins'),
        'url' => route('admin.admins.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $resource->id ? route('admin.admins.update', $resource->id) : route('admin.admins.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($resource->id)
                    @method('PUT')
                @endif

                <div class="row">
                    
                    <div class="text-center mb-5">
                        <img class="img-200 rounded-circle image-preview position-relative" alt="dsds"
                            src="{{ asset($resource->image ?? 'build/images/user.png') }}">
                        <label for="fileid" style="left: 49%; bottom: -20%"  class="position-absolute text-white">
                            <span style="color: gray; cursor: pointer"><i class='fa fa-camera'></i></span>
                        </label>
                        <input type="file" id="fileid" style="display: none" class="image form-control" name="image" accept="image/*">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        
                        {{ html()->label(__('lang.username')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text('username', old('username', $resource->username))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.username'))
                        }}

                        @error("username")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        
                        {{ html()->label(__('lang.email')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->email('email', old('email', $resource->email))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.email'))
                        }}

                        @error("email")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.phone')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("phone", old("phone", optional($resource)->phone))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.phone'))
                        }}

                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.password')) }}
                        {!! $resource->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
                        {{ html()->password("password", old("password", optional($resource)->password))
                            ->class('form-control') 
                            ->attribute($resource->id ? '' : 'required')
                            ->placeholder(__('lang.password'))
                        }}

                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.password_confirmation')) }}
                        {!! $resource->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
                        {{ html()->password("password_confirmation", old("password_confirmation", optional($resource)->password_confirmation))
                            ->class('form-control') 
                            ->attribute($resource->id ? '' : 'required')
                            ->placeholder(__('lang.password_confirmation'))
                        }}

                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.role')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->select('role', $roles, old('role', $resource->getRole()->id ?? ''))
                            ->class('form-control select2')
                            ->attribute('required')
                            ->placeholder(__('lang.select-item'))
                        }}

                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>

                </div>
            </form>
            
        @endslot
    @endcomponent

@endsection
