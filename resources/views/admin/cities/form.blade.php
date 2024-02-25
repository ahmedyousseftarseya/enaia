@extends('admin.layouts.master')

@php
    $title = $resource->id ?  __('lang.edit') . ' ' . __('lang.city')  :  __('lang.add') . ' ' . __('lang.city');
@endphp


@section('title', $title)

@section('page-title', __('lang.cities'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.cities'),
        'url' => route('admin.cities.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $resource->id ? route('admin.cities.update', $resource->id) : route('admin.cities.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($resource->id)
                    @method('PUT')
                @endif

                <div class="row">

                    
                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.country')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->select('country_id', $countries, old('country_id',  $resource->country_id))
                            ->class('form-control select2')
                            ->attribute('required')
                            ->placeholder(__('lang.select_item'))
                        }}

                        @error('country_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.shipping_cost')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->number('shipping_cost', old('shipping_cost',  $resource->shipping_cost))
                            ->class('form-control')
                            ->attribute('required')
                        }}

                        @error('shipping_cost')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
            
                    @foreach (config('translatable.locales') as $locale)
                        <div class="col-12 mt-4">
                            
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


                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>

                </div>
            </form>
            
        @endslot
    @endcomponent

@endsection
