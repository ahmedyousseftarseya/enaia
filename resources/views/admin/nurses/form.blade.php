@extends('admin.layouts.master')

@php
    $title = $nurse->id ?  __('lang.edit') . ' ' . __('lang.nurse')  :  __('lang.add') . ' ' . __('lang.nurse');
@endphp


@section('title', $title)

@section('page-title', __('lang.nurses'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.nurses'),
        'url' => route('admin.nurses.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $nurse->id ? route('admin.nurses.update', $nurse->id) : route('admin.nurses.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($nurse->id)
                    @method('PUT')
                @endif

                <div class="row">
                    
                    <div class="text-center mb-5">
                        <img class="img-200 rounded-circle image-preview position-relative" alt="dsds"
                            src="{{ asset($nurse->image_url) }}">
                        <label for="fileid" style="left: 49%; bottom: -20%"  class="position-absolute text-white">
                            <span style="color: gray; cursor: pointer"><i class='fa fa-camera'></i></span>
                        </label>
                        <input type="file" id="fileid" style="display: none" class="image form-control" name="image" accept="image/*">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        
                        {{ html()->label(__('lang.name')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text('name', old('name', $nurse->name))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.name'))
                        }}

                        @error("name")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.phone')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("phone", old("phone", optional($nurse)->phone))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.phone'))
                        }}

                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.address')) }}
                        {{ html()->text("address", old("address", optional($nurse)->address))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.address'))
                        }}

                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.password')) }}
                        {{ html()->password("password", old("password", optional($nurse)->password))
                            ->class('form-control') 
                            ->placeholder(__('lang.password'))
                        }}

                        @error('password')
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
