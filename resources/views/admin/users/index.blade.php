@extends('admin.layouts.master')

@section('title', __('lang.customers_list'))


@section('page-title', __('lang.customers'))

@section('content')


    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => __('lang.customers_list'),
        'pagetitle' => __('lang.customers'),
        'url' => route('admin.users.index'),
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
            @include('admin.users.filter')
        @endslot
    @endcomponent


    @component('admin.layouts.components.card', ['title' => ''])

        @slot('content')

            {{-- table component --}}
            @component('admin.layouts.components.table')
                @slot('headers')
                    {{-- <th>#</th> --}}
                    <th>{{ __('lang.national_id') }}</th>
                    <th>{{ __('lang.name') }}</th>
                    <th>{{ __('lang.date_of_birth') }}</th>
                    <th>{{ __('lang.phone') }}</th>
                    <th>{{ __('lang.email') }}</th>
                    <th>{{ __('lang.gender') }}</th>
                    <th>{{ __('lang.nationality') }}</th>
                    <th>{{ __('lang.blood_group') }}</th>
                    <th>{{ __('lang.address') }}</th>
                    @if(auth('admin')->user()->isAbleTo('admin_update-status-customers'))
                        <th>{{ __('lang.status') }}</th>
                    @endif
                    <th>{{ __('lang.action') }}</th>
                @endslot

                @slot('data')
                    @if ($resources->count() == 0)
                        <tr>
                            <td colspan="11" class="text-center py-3 text-muted">
                                {{ __('lang.no_data') }}
                            </td>
                        </tr>
                    @else
                        @foreach ($resources as $resource)
                            <tr>
                                {{-- <td>{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</td> --}}
                                <td>{{ $resource->national_id }}</td>
                                <td>
                                    <img src="{{ $resource->image_url }}" class="img-50 rounded-circle {{ isRtl() ? 'ms-2' : 'me-2' }}"
                                        alt="not found">
                                    {{ $resource->name }}
                                </td>
                                <td>{{ $resource->date_of_birth }}</td>
                                <td>{{ $resource->phone }}</td>
                                <td>{{ $resource->email }}</td>
                                <td>{{ $resource->gender }}</td>
                                <td>{{ $resource->nationality }}</td>
                                <td>{{ $resource->blood_group }}</td>
                                <td>{{ $resource->address }}</td>
                                @if(auth('admin')->user()->isAbleTo('admin_update-status-customers'))
                                <td>
                                    <select name="status" id="status_{{ $resource->id }}" 
                                        data-old-status="{{ $resource->status }}"
                                        class="form-select" onchange="changeStatus({{ $resource->id }}, this.value)">
                                        <option value="" disabled>{{ __('lang.select_item') }}</option>
                                        @foreach ($status as  $value)
                                            <option value="{{ $value }}" {{ $value == $resource->status ? 'selected' : '' }}>{{ __('lang.' . $value) }} </option>
                                        @endforeach
                                    </select>
                                </td>
                                @endif
                                <td>
                                    @if(auth('admin')->user()->isAbleTo('admin_show-customers'))
                                        <a href="{{ route('admin.users.show', $resource->id) }}" class="btn btn-xs btn-info">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    @endif

                                    @if(auth('admin')->user()->isAbleTo('admin_update-customers'))
                                        <a href="{{ route('admin.users.edit', $resource->id) }}" class="btn btn-xs btn-primary">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    @endif

                                    @if(auth('admin')->user()->isAbleTo('admin_delete-customers'))
                                        <form action="{{ route('admin.users.destroy', $resource->id) }}" method="post" class="d-inline">
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

@section('scripts')
    <script>
        let isUserInitiatedChange = false;
        function changeStatus(id, value) {
            if(isUserInitiatedChange){
                return;
            }
            const oldStatus = $('#status_' + id).attr('data-old-status');

            if (confirm("{{ __('lang.are_you_sure') }}")) {

                $.post("{{ route('admin.users.changeStatus') }}", {
                    id: id,
                    status: value,
                    _token: "{{ csrf_token() }}"
                }, function(data) {
                    if (data.success) {
                        $('#status_' + id).find("option[value='" + value + "']").attr("selected", true).siblings().attr("selected", false);
                        $('#status_' + id).attr('data-old-status', status);
                        alert(data.message);
                    }
                })
            } else {
                isUserInitiatedChange = true;
                $('#status_' + id).find("option[value='" + oldStatus + "']").attr("selected", true).siblings().attr("selected", false);
                $('#status_' + id).val(oldStatus).change();
                isUserInitiatedChange = false;
            }
        }
    </script>
@endsection

