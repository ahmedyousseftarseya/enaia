@extends('admin.layouts.master')

@section('title', __('lang.services_list'))


@section('page-title', __('lang.services'))

@section('content')


    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => __('lang.services_list'),
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
            @include('admin.services.filter')
        @endslot
    @endcomponent


    @component('admin.layouts.components.card', ['title' => ''])

        @slot('action')
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">{{ __('lang.add') . ' ' . __('lang.service') }}</a>
        @endslot

        @slot('content')

            {{-- table component --}}
            @component('admin.layouts.components.table')
                @slot('headers')
                    <th>#</th>
                    <th>{{ __('lang.title') }}</th>
                    <th>{{ __('lang.description') }}</th>
                    <th>{{ __('lang.active') }}</th>
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
                                    {{ $resource->title }}
                                </td>
                                <td>{{ $resource->description }}</td>
                                <td>
                                    <div class="form-check form-switch mt-4 d-flex align-items-center border-dark">
                                        <input class="form-check-input" onchange="changeStatus({{ $resource->id }})" type="checkbox"
                                            role="switch" id="switchCheck-{{ $resource->id }}" name="active"
                                            {{ $resource->active || !$resource->id ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.services.edit', $resource->id) }}" class="btn btn-xs btn-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>

                                    <form action="{{ route('admin.services.destroy', $resource->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger sw-alert"
                                            onclick="return confirm('{{ __('lang.are_you_sure') }}')">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>

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

                $.post("{{ route('admin.services.changeStatus') }}", {
                    id: id,
                    _token: "{{ csrf_token() }}"
                }, function(data) {
                    if (data.success) {
                        alert(data.message);
                    }
                })
            } else {
                $('#switchCheck-' + id).prop('checked', !$('#switchCheck-' + id).prop('checked'));
            }
        }
    </script>
@endsection
