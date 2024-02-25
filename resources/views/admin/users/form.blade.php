@extends('admin.layouts.master')

@php
    $title =  __('lang.edit') . ' ' . __('lang.customer');
@endphp


@section('title', $title)

@section('page-title', __('lang.customers'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.users'),
        'url' => route('admin.users.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form" action="{{ route('admin.users.update', $resource->id) }}" method="post" enctype="multipart/form-data">
                
                @csrf
                @method('PUT')

                <div class="row">
                    
                    <div class="text-center mb-5">
                        <img class="img-200 rounded-circle image-preview position-relative" alt="dsds"
                            src="{{ asset($resource->image_url) }}">
                        <label for="fileid" style="left: 49%; bottom: -20%"  class="position-absolute text-white">
                            <span style="color: gray; cursor: pointer"><i class='fa fa-camera'></i></span>
                        </label>
                        <input type="file" id="fileid" style="display: none" class="image form-control" name="image" accept="image/*">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.national_id')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->number('national_id', old('national_id', $resource->national_id))
                            ->class('form-control')
                            ->attribute('required')
                        }}

                        @error('national_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        
                        {{ html()->label(__('lang.name')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text('name', old('name', $resource->name))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.name'))
                        }}

                        @error("name")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        
                        {{ html()->label(__('lang.date_of_birth')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->date('date_of_birth', old('date_of_birth', $resource->date_of_birth))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.date_of_birth'))
                        }}

                        @error("date_of_birth")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.phone')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("phone", old("phone", $resource->phone))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.phone'))
                        }}

                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        
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

                    <div class="col-6 mt-4">
                        
                        {{ html()->label(__('lang.gender')) }}
                        <span class="text-danger fs-6">*</span>
                        <select name="gender" id="gender" class="form-select">
                            <option value="" disabled>{{ __('lang.select_item') }}</option>
                            @foreach ($genders as  $gender)
                                <option value="{{ $gender }}" {{ $gender == $resource->gender ? 'selected' : '' }}>{{ __('lang.' . $gender) }} </option>
                            @endforeach
                        </select>

                        @error("gender")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        
                        {{ html()->label(__('lang.status')) }}
                        <span class="text-danger fs-6">*</span>
                        <select name="status" class="form-select">
                            <option value="" disabled>{{ __('lang.select_item') }}</option>
                            @foreach ($status as  $value)
                                <option value="{{ $value }}" {{ $value == $resource->status ? 'selected' : '' }}>{{ __('lang.' . $value) }} </option>
                            @endforeach
                        </select>

                        @error("status")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.nationality')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("nationality", old("nationality", $resource->nationality))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.nationality'))
                        }}

                        @error('nationality')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.blood_group')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("blood_group", old("blood_group", $resource->blood_group))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.blood_group'))
                        }}

                        @error('blood_group')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.address')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("address", old("address", $resource->address))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.address'))
                        }}

                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.password')) }}
                        {!! $resource->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
                        {{ html()->password("password", old("password", $resource->password))
                            ->class('form-control') 
                            ->placeholder(__('lang.password'))
                        }}

                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.password_confirmation')) }}
                        {!! $resource->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
                        {{ html()->password("password_confirmation", old("password_confirmation", $resource->password_confirmation))
                            ->class('form-control') 
                            ->placeholder(__('lang.password_confirmation'))
                        }}

                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.lat')) }}
                        {{ html()->text("lat", old("lat", $resource->lat))
                            ->class('form-control')
                            ->placeholder(__('lang.lat'))
                        }}

                        @error('lat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.lng')) }}
                        {{ html()->text("lng", old("lng", $resource->lng))
                            ->class('form-control')
                            ->placeholder(__('lang.lng'))
                        }}

                        @error('lng')
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
