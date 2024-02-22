@extends('admin.layouts.master')

@php
    $title = $resource->id ?  __('lang.edit') . ' ' . __('lang.service')  :  __('lang.add') . ' ' . __('lang.service');
@endphp


@section('title', $title)

@section('page-title', __('lang.services'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.services'),
        'url' => route('admin.services.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $resource->id ? route('admin.services.update', $resource->id) : route('admin.services.store') }}"
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
                            
                            {{ html()->label(__('lang.title_' . $locale)) }}
                            <span class="text-danger fs-6">*</span>
                            {{ html()->text("$locale" . '[title]', old("$locale" . '[title]', $resource?->title))
                                ->class('form-control') 
                                ->attribute('required')
                                ->placeholder(__('lang.title_' . $locale))
                            }}

                            @error("$locale.title")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach


                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">
                            
                            {{ html()->label(__('lang.description_' . $locale)) }}
                            {{ html()->textarea("$locale" . '[description]', old("$locale" . '[description]', $resource?->description))
                                ->class('form-control') 
                                ->attributes(['rows' => 7, 'style' => 'resize: none'])
                                ->placeholder(__('lang.description_' . $locale))
                            }}

                            @error("$locale.description")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <div class="form-check form-switch mt-4 d-flex align-items-center border-dark">
                        <input class="form-check-input" type="checkbox" role="switch" id="switchCheck" name="active" {{ $resource->active || !$resource->id ? 'checked' : '' }}>
                        <label class="form-check-label {{ isRtl() ? 'me-5' : 'ms-5' }}" for="switchCheck">{{ __('lang.active') }}</label>
                    </div>

                   
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>

                </div>
            </form>
            
        @endslot
    @endcomponent

@endsection
