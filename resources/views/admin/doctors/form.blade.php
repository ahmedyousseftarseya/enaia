@extends('admin.layouts.master')

@php
    $title = $doctor->id ?  __('lang.edit') . ' ' . __('lang.doctor')  :  __('lang.add') . ' ' . __('lang.doctor');
@endphp


@section('title', $title)

@section('page-title', __('lang.doctors'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.doctors'),
        'url' => route('admin.doctors.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $doctor->id ? route('admin.doctors.update', $doctor->id) : route('admin.doctors.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($doctor->id)
                    @method('PUT')
                @endif

                <div class="row">
                    
                    <div class="text-center mb-5">
                        <img class="img-200 rounded-circle image-preview position-relative" alt="dsds"
                            src="{{ asset($doctor->image ?? 'build/images/user.png') }}">
                        <label for="fileid" style="left: 49%; bottom: -20%"  class="position-absolute text-white">
                            <span style="color: gray; cursor: pointer"><i class='fa fa-camera'></i></span>
                        </label>
                        <input type="file" id="fileid" style="display: none" class="image form-control" name="image" accept="image/*">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.specialization')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->select('specialization_id', $specializations)->class('form-select select2') }}

                        @error('specialization_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.nurses')) }}
                        <span class="text-muted">({{ __('lang.you_can_choose_multiple') }})</span>
                        {{ html()->multiselect('nurses[]', $nurses, old('nurses',  $doctor->getNursesIds()))
                            ->class('form-control select2')
                        }}

                        @error('nurses')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">
                            
                            {{ html()->label(__('lang.name_' . $locale)) }}
                            <span class="text-danger fs-6">*</span>
                            {{ html()->text("$locale" . '[name]', old("$locale" . '[name]', optional($doctor->translate($locale))->name))
                                ->class('form-control') 
                                ->attribute('required')
                                ->placeholder(__('lang.name_' . $locale))
                            }}

                            @error("$locale.name")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">
                            
                            {{ html()->label(__('lang.about_' . $locale)) }}
                            <span class="text-danger fs-6">*</span>
                            {{ html()->textarea("$locale" . '[about]', old("$locale" . '[about]', optional($doctor->translate($locale))->about))
                                ->class('form-control') 
                                ->attributes(['required', 'rows' => 7, 'style' => 'resize: none'])
                                ->placeholder(__('lang.about_' . $locale))
                            }}

                            @error("$locale.about")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">
                            
                            {{ html()->label(__('lang.experience_' . $locale)) }}
                            <span class="text-danger fs-6">*</span>
                            {{ html()->textarea("$locale" . '[experience]', old("$locale" . '[experience]', optional($doctor->translate($locale))->experience))
                                ->class('form-control') 
                                ->attributes(['required', 'rows' => 7, 'style' => 'resize: none'])
                                ->placeholder(__('lang.experience_' . $locale))
                            }}

                            @error("$locale.experience")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.phone')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->text("phone", old("phone", optional($doctor)->phone))
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
                        {{ html()->email("email", old("email", optional($doctor)->email))
                            ->class('form-control') 
                            ->placeholder(__('lang.email'))
                        }}

                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.password')) }}
                        {{ html()->password("password", old("password", optional($doctor)->password))
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
