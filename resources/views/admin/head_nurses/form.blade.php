@extends('admin.layouts.master')

@php
    $title = $resource->id ?  __('lang.edit') . ' ' . __('lang.head_nurse')  :  __('lang.add') . ' ' . __('lang.head_nurse');
@endphp


@section('title', $title)

@section('page-title', __('lang.head_nurses'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.head_nurses'),
        'url' => route('admin.head-nurses.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $resource->id ? route('admin.head-nurses.update', $resource->id) : route('admin.head-nurses.store') }}"
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
                        {{ html()->label(__('lang.nurses')) }}
                        <span class="text-muted">({{ __('lang.you_can_choose_multiple') }})</span>
                        {{ html()->multiselect('nurses[]', $nurses, old('nurses',  $resource->getNursesIds()))
                            ->class('form-control select2')
                        }}

                        @error('nurses')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        
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
                        {{ html()->password("password", old("password", optional($resource)->password))
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
