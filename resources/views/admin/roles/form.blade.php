@extends('admin.layouts.master')

@php
    $title = $resource->id ?  __('lang.edit') . ' ' . __('lang.role')  :  __('lang.add') . ' ' . __('lang.role');
@endphp


@section('title', $title)

@section('page-title', __('lang.roles'))

@section('content')

    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => $title,
        'pagetitle' => __('lang.roles'),
        'url' => route('admin.roles.index'),
    ])
    @endcomponent


    {{-- form --}}
    @component('admin.layouts.components.card', ['title' => '', 'class' => 'p-2'])

        @slot('content')

            <form class="form"
                action="{{ $resource->id ? route('admin.roles.update', $resource->id) : route('admin.roles.store') }}"
                method="post" enctype="multipart/form-data">

                @csrf
                @if ($resource->id)
                    @method('PUT')
                @endif

                <div class="row">

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
                        {{ html()->label(__('lang.display_name')) }}
                        {{ html()->text('display_name', old('display_name', $resource->display_name))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.display_name'))
                        }}

                        @error("display_name")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        {{ html()->label(__('lang.description')) }}
                        {{ html()->text('description', old('description', $resource->description))
                            ->class('form-control') 
                            ->attribute('required')
                            ->placeholder(__('lang.description'))
                        }}

                        @error("description")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-check form-switch mt-5 d-flex align-items-center border-dark">
                            <input class="form-check-input" type="checkbox" role="switch" id="selectAll">
                            <label class="form-check-label {{ isRtl() ? 'me-5' : 'ms-3' }}" for="selectAll">{{ __('lang.select_all') }}</label>
                        </div>

                        @foreach ($permissions as $category => $listPermissions)
                            <div class="col-4 mt-5">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary">{{ __('lang.' . $category) }}</h5>
                                    </div>
                                    <div class="card-body">

                                        @foreach ($listPermissions as $permission)
                                            <div class="form-check form-switch mt-3 d-flex align-items-center border-dark">
                                                <input class="form-check-input" name="permissions[]" value="{{ $permission->id }}"
                                                    type="checkbox" role="switch" id="switchCheck-{{ $permission->id }}"
                                                    {{ in_array($permission->id, $resource->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                                                />
                                                <label class="form-check-label {{ isRtl() ? 'me-5' : 'ms-3' }}" for="switchCheck-{{ $permission->id }}">
                                                    <h5 class="card-title my-0">
                                                        {{ app()->getLocale() == 'ar' ? $permission->description :  $permission->display_name}}
                                                    </h5>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div><!-- end col -->
                        @endforeach
                    </div>

                
                   
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                    </div>

                </div>
            </form>
            
        @endslot
    @endcomponent

@endsection


@section('scripts')

    <script>
        $('#selectAll').on('change', function() {
            if (this.checked) {
                $('input[type="checkbox"]').each(function() {
                    this.checked = true;
                });
            } else {
                $('input[type="checkbox"]').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>


@endSection