@extends('admin.layouts.master')

@section('title', __('lang.nurses_list'))


@section('page-title', __('lang.nurses'))

@section('content')


    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => __('lang.nurses_list'),
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
            @include('admin.nurses.filter')
        @endslot
    @endcomponent


    @component('admin.layouts.components.card', ['title' => ''])

        @slot('action')
            <a href="{{ route('admin.nurses.create') }}" class="btn btn-primary">{{ __('lang.add'). ' ' . __('lang.nurse') }}</a>
        @endslot

        @slot('content')

            {{-- table component --}}
            @component('admin.layouts.components.table')
                @slot('headers')
                    <th>#</th>
                    <th>{{ __('lang.name') }}</th>
                    <th>{{ __('lang.phone') }}</th>
                    <th>{{ __('lang.action') }}</th>
                @endslot

                @slot('data')
                    @if ($nurses->count() == 0)
                        <tr>
                            <td colspan="8" class="text-center py-3 text-muted">
                                {{ __('lang.no_data') }}
                            </td>
                        </tr>
                    @else
                        @foreach ($nurses as $nurse)
                            <tr>
                                <td>{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $nurse->image_url }}" class="img-50 rounded-circle {{ isRtl() ? 'ms-2' : 'me-2' }}"
                                        alt="not found">
                                    {{ $nurse->name }}
                                </td>
                                <td>{{ $nurse->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.nurses.edit', $nurse->id) }}" class="btn btn-xs btn-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>

                                    <form action="{{ route('admin.nurses.destroy', $nurse->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger sw-alert"
                                            onclick="return confirm('{{ __('lang.are_you_sure') }}')">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>

                                    {{-- <a href="{{ route('admin.nurses.destroy', $nurse->id) }}"
                                        class="btn btn-xs btn-danger" data-confirm-delete="true">
                                        <span class="fa fa-trash"></span>
                                    </a> --}}

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
        {{ $nurses->appends(request()->query())->render() }}
    </div>

@endSection
