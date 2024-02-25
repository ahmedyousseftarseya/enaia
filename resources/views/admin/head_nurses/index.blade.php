@extends('admin.layouts.master')

@section('title', __('lang.head_nurses_list'))


@section('page-title', __('lang.nurses'))

@section('content')


    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => __('lang.head_nurses_list'),
        'pagetitle' => __('lang.nurses'),
        'url' => route('admin.nurses.index'),
    ])
    @endcomponent

    {{-- filter component --}}
    @component('admin.layouts.components.filter', [
        'title' => __('lang.filter'),
        'id' => 'filter_body',
    ])
        @slot('tool')
            <button class="btn btn-xs btn-primary" onclick="$('#filter_body').slideToggle()"><span
                    class="fa fa-filter"></span></button>
        @endslot

        @slot('content')
            @include('admin.head_nurses.filter')
        @endslot
    @endcomponent


    @component('admin.layouts.components.card', ['title' => ''])

        @slot('action')
            @if(auth('admin')->user()->isAbleTo('admin_create-head-nurses'))
                <a href="{{ route('admin.head-nurses.create') }}" class="btn btn-primary">{{ __('lang.add'). ' ' . __('lang.head_nurse') }}</a>
            @endif
        @endslot

        @slot('content')

            {{-- table component --}}
            @component('admin.layouts.components.table')
                @slot('headers')
                    <th>#</th>
                    <th>{{ __('lang.name') }}</th>
                    <th>{{ __('lang.phone') }}</th>
                    <th>{{ __('lang.address') }}</th>
                    <th>{{ __('lang.action') }}</th>
                @endslot

                @slot('data')
                    @if ($resources->count() == 0)
                        <tr>
                            <td colspan="8" class="text-center py-3 text-muted">
                                {{ __('lang.no_data') }}
                            </td>
                        </tr>
                    @else
                        @foreach ($resources as $resource)
                            <tr>
                                <td>{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $resource->image_url }}" class="img-50 rounded-circle {{ isRtl() ? 'ms-2' : 'me-2' }}"
                                        alt="not found">
                                    {{ $resource->name }}
                                </td>
                                <td>{{ $resource->phone }}</td>
                                <td>{{ $resource->address ?? '-' }}</td>
                                <td>
                                    @if(auth('admin')->user()->isAbleTo('admin_update-head-nurses'))
                                        <a href="{{ route('admin.head-nurses.edit', $resource->id) }}" class="btn btn-xs btn-primary">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    @endif

                                    @if(auth('admin')->user()->isAbleTo('admin_delete-head-nurses'))
                                        <form action="{{ route('admin.head-nurses.destroy', $resource->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-xs btn-danger sw-alert"
                                                onclick="return confirm('{{ __('lang.are_you_sure') }}')">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endslot
            @endcomponent
            {{-- end table component --}}

        @endslot

    @endcomponent
    {{-- end card component --}}


    <div class="d-flex justify-content-center mt-1">
        {{ $resources->appends(request()->query())->render() }}
    </div>

@endSection
