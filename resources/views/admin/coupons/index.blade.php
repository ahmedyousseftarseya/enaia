@extends('admin.layouts.master')

@section('title', __('lang.coupons_list'))


@section('page-title', __('lang.coupons'))

@section('content')


    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => __('lang.coupons_list'),
        'pagetitle' => __('lang.coupons'),
        'url' => route('admin.coupons.index'),
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
            @include('admin.coupons.filter')
        @endslot
    @endcomponent


    @component('admin.layouts.components.card', ['title' => ''])

        @slot('action')
            {{-- @if (auth('admin')->user()->isAbleTo('admin_create-coupons')) --}}
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">{{ __('lang.add') . ' ' . __('lang.coupon') }}</a>
            {{-- @endif --}}
        @endslot

        @slot('content')

            {{-- table component --}}
            @component('admin.layouts.components.table')
                @slot('headers')
                    <th>#</th>
                    <th>{{ __('lang.code') }}</th>
                    <th>{{ __('lang.type') }}</th>
                    <th>{{ __('lang.value') }}</th>
                    <th>{{ __('lang.from') }}</th>
                    <th>{{ __('lang.to') }}</th>
                    {{-- @if (auth('admin')->user()->isAbleTo('admin_update-status-coupons')) --}}
                    <th>{{ __('lang.active') }}</th>
                    {{-- @endif --}}
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
                                    {{ $resource->code }}
                                </td>
                                <td>{{ __('lang.' . $resource->type) }}</td>
                                <td>{{ $resource->value }}</td>
                                <td>{{ $resource->from }}</td>
                                <td>{{ $resource->to }}</td>
                                {{-- @if (auth('admin')->user()->isAbleTo('admin_update-status-coupons')) --}}
                                <td>
                                    <div class="form-check form-switch mt-4 d-flex align-items-center border-dark">
                                        <input class="form-check-input" onchange="changeStatus({{ $resource->id }})" type="checkbox"
                                            role="switch" id="switchCheck-{{ $resource->id }}" name="active"
                                            {{ $resource->status == 'active' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                {{-- @endif --}}
                                <td>
                                    {{-- @if (auth('admin')->user()->isAbleTo('admin_update-coupons')) --}}
                                    <a href="{{ route('admin.coupons.edit', $resource->id) }}" class="btn btn-xs btn-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    {{-- @endif --}}

                                    {{-- @if (auth('admin')->user()->isAbleTo('admin_delete-coupons')) --}}
                                    <form action="{{ route('admin.coupons.destroy', $resource->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger sw-alert"
                                            onclick="return confirm('{{ __('lang.are_you_sure') }}')">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>
                                    {{-- @endif --}}

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


@section('scripts')
    <script>
        function changeStatus(id) {
            if (confirm("{{ __('lang.are_you_sure') }}")) {

                let status = $('#switchCheck-' + id).prop('checked') ? 'active' : 'inactive';

                $.post("{{ route('admin.coupons.changeStatus') }}", {
                    id: id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                }, function(data) {
                    if (data.success) {
                        $('#switchCheck-' + id).prop('checked', status == 'active' ? true : false);
                        alert(data.message);
                    }
                })
            } else {
                $('#switchCheck-' + id).prop('checked', !$('#switchCheck-' + id).prop('checked'));
            }
        }
    </script>
@endsection
