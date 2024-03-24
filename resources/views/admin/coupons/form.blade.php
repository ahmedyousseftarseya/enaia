@extends('admin.layouts.master')

@php
    $title = $resource->id ?  __('lang.edit') . ' ' . __('lang.coupon')  :  __('lang.add') . ' ' . __('lang.coupon');
@endphp


@section('title', $title)

@section('page-title', __('lang.coupons'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.coupons'),
        'url' => route('admin.coupons.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $resource->id ? route('admin.coupons.update', $resource->id) : route('admin.coupons.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($resource->id)
                    @method('PUT')
                @endif

                <div class="row">

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.type')) }}
                        <span class="text-danger fs-6">*</span>

                        <select name="type" id="type" class="form-select">
                            <option value="">{{ __('lang.select_item') }}</option>
                            @foreach ($types as $type)
                                <option value="{{ $type }}" {{ $resource->type == $type ? 'selected' : '' }}>{{ __('lang.' . $type) }}</option>
                            @endforeach
                        </select>

                        @error("type")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.value')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->number('value', old('value', $resource->value))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.value'))
                        }}

                        @error("value")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.from')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->date('from', old('from', $resource->from))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.from'))
                        }}

                        @error("from")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.to')) }}
                        <span class="text-danger fs-6">*</span>
                        {{ html()->date('to', old('to', $resource->to))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.to'))
                        }}

                        @error("to")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
              

                    <div class="form-check form-switch mt-4 d-flex align-items-center border-dark">
                        <input class="form-check-input" 
                            type="checkbox" role="switch" 
                            id="switchCheck" name="status"
                            {{ $resource->status == 'active' ? 'checked' : '' }}
                        />
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
