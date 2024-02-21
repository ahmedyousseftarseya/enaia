@extends('admin.layouts.master')

@php
    $title = $resource->id ?  __('lang.edit') . ' ' . __('lang.country')  :  __('lang.add') . ' ' . __('lang.country');
@endphp


@section('title', $title)

@section('page-title', __('lang.countries'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.countries'),
        'url' => route('admin.countries.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $resource->id ? route('admin.countries.update', $resource->id) : route('admin.countries.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($resource->id)
                    @method('PUT')
                @endif

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

            
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">
                            
                            {{ html()->label(__('lang.name_' . $locale)) }}
                            <span class="text-danger fs-6">*</span>
                            {{ html()->text("$locale" . '[name]', old("$locale" . '[name]', $resource->name))
                                ->class('form-control') 
                                ->attribute('required')
                                ->placeholder(__('lang.name_' . $locale))
                            }}

                            @error("$locale.name")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach


                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.zip_code')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("zip_code", old("zip_code", optional($resource)->zip_code))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.zip_code'))
                        }}

                        @error('zip_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.digit_number')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->number("digit_number", old("digit_number", optional($resource)->digit_number))
                            ->class('form-control')
                            ->attribute('required')
                            ->placeholder(__('lang.digit_number'))
                        }}

                        @error('digit_number')
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
