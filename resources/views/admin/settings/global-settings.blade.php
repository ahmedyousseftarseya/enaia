@extends('admin.layouts.master')

@section('title', __('lang.settings'))

@section('page-title', __('lang.settings'))

@section('content')

    @component('admin.layouts.components.card', ['title' => __('lang.global_settings')])

        @slot('content')

            <form class="n" method="POST" action="{{ route('admin.settings.update') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="text-center mb-5">
                        <img class="img-200 rounded-circle image-preview position-relative" alt="dsds"
                            src="{{ asset($settings["logo"] ?? 'build/images/logo-light-sm.png')  }}">
                        <label for="fileid" style="left: 49%; bottom: -20%"  class="position-absolute text-white">
                            <span style="color: gray; cursor: pointer"><i class='fa fa-camera'></i></span>
                        </label>
                        <input type="file" id="fileid" style="display: none" class="image form-control" name="logo" accept="image/*">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">
                            
                            {{ html()->label(__('lang.site_name_' . $locale)) }}
                            {{ html()->text("site_name_$locale", old("site_name_$locale", $settings['site_name_' . $locale] ?? ''))
                                ->class('form-control') 
                                ->placeholder(__('lang.site_name_' . $locale))
                            }}

                            @error("site_name_' . $locale")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">

                            {{ html()->label(__('lang.website_address_' . $locale)) }}
                            {{ html()->text("website_address_$locale", old("website_address_$locale", $settings['website_address_' . $locale] ?? ''))
                                ->class('form-control') 
                                ->placeholder(__('lang.website_address_' . $locale))
                            }}

                            @error("website_address_' . $locale")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">
                            
                            {{ html()->label(__('lang.short_description_' . $locale)) }}
                            {{ html()->textarea("short_description_$locale", old("short_description_$locale", $settings['short_description_' . $locale] ?? ''))
                                ->class('form-control') 
                                ->attributes(['rows' => 8])
                                ->placeholder(__('lang.short_description_' . $locale))
                            }}

                            @error("short_description_' . $locale")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach


                     @foreach (config('translatable.locales') as $locale)
                        <div class="col-6 mt-4">

                            {{ html()->label(__('lang.policy_' . $locale)) }}
                            {{ html()->textarea("policy_$locale", old("policy_$locale", $settings['policy_' . $locale] ?? ''))
                                ->class('form-control') 
                                ->attributes(['rows' => 8])
                                ->placeholder(__('lang.policy_' . $locale))
                            }}

                            @error("policy_' . $locale")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                </div>

                
                <div class="row mt-5">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>
                </div>
            </form>

        @endslot

    @endcomponent
    {{-- end card component --}}

@endSection
