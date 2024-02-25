@extends('admin.layouts.master')

@section('title', __('lang.settings'))

@section('page-title', __('lang.settings'))

@section('content')

    @component('admin.layouts.components.card', ['title' => __('lang.contact_settings')])

        @slot('content')

            <form class="n" method="POST" action="{{ route('admin.settings.update') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.phone_1')) }}
                        {{ html()->number("phone_1", old("phone_1", $settings['phone_1'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.phone_1'))
                        }}

                        @error("phone_1")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.phone_2')) }}
                        {{ html()->number("phone_2", old("phone_2", $settings['phone_2'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.phone_2'))
                        }}

                        @error("phone_2")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.email_1')) }}
                        {{ html()->email("email_1", old("email_1", $settings['email_1'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.email_1'))
                        }}

                        @error("email_1")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.email_2')) }}
                        {{ html()->email("email_2", old("email_2", $settings['email_2'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.email_2'))
                        }}

                        @error("email_2")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.facebook')) }}
                        {{ html()->text("facebook", old("facebook", $settings['facebook'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.facebook'))
                        }}

                        @error("facebook")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.twitter')) }}
                        {{ html()->text("twitter", old("twitter", $settings['twitter'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.twitter'))
                        }}

                        @error("twitter")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.linkedin')) }}
                        {{ html()->text("linkedin", old("linkedin", $settings['linkedin'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.linkedin'))
                        }}

                        @error("linkedin")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.instagram')) }}
                        {{ html()->text("instagram", old("instagram", $settings['instagram'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.instagram'))
                        }}

                        @error("instagram")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.tiktok')) }}
                        {{ html()->text("tiktok", old("tiktok", $settings['tiktok'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.tiktok'))
                        }}

                        @error("tiktok")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 mt-4">
                        {{ html()->label(__('lang.youtube')) }}
                        {{ html()->text("youtube", old("youtube", $settings['youtube'] ?? ''))
                            ->class('form-control') 
                            ->placeholder(__('lang.youtube'))
                        }}

                        @error("youtube")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                
                <div class="row mt-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>
                </div>
            </form>

        @endslot

    @endcomponent
    {{-- end card component --}}

@endSection
