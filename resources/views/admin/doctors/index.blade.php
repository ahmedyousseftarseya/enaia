@extends('admin.layouts.master')

@section('title', __('lang.doctors_list'))


@section('page-title', __('lang.doctors'))

@section('content')


    {{-- breadcrumb component --}}
    @component('admin.layouts.components.breadcrumb', [
        'title' => __('lang.doctors_list'),
        'pagetitle' => __('lang.doctors'),
        'url' => route('admin.doctors.index'),
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
            @include('admin.doctors.filter')
        @endslot
    @endcomponent


    @component('admin.layouts.components.card', ['title' => ''])

        @slot('action')
            @if(auth('admin')->user()->isAbleTo('admin_create-doctors'))
                <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">{{ __('lang.add'). ' ' . __('lang.doctor') }}</a>
            @endif
        @endslot

        @slot('content')

            {{-- table component --}}
            @component('admin.layouts.components.table')
                @slot('headers')
                    <th>#</th>
                    <th>{{ __('lang.name') }}</th>
                    <th>{{ __('lang.specialization') }}</th>
                    <th>{{ __('lang.phone') }}</th>
                    <th>{{ __('lang.email') }}</th>
                    <th>{{ __('lang.action') }}</th>
                @endslot

                @slot('data')
                    @if ($doctors->count() == 0)
                        <tr>
                            <td colspan="8" class="text-center py-3 text-muted">
                                {{ __('lang.no_data') }}
                            </td>
                        </tr>
                    @else
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $doctor->image_url }}" class="img-50 rounded-circle {{ isRtl() ? 'ms-2' : 'me-2' }}"
                                        alt="not found">
                                    {{ $doctor->name }}
                                </td>
                                <td>{{ optional($doctor->specialization)->name }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>
                                    @if(auth('admin')->user()->isAbleTo('admin_show-doctors'))
                                        <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-xs btn-info">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    @endif

                                    @if(auth('admin')->user()->isAbleTo('admin_update-doctors'))
                                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-xs btn-primary">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    @endif

                                    @if(auth('admin')->user()->isAbleTo('admin_delete-doctors'))
                                        <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="post" class="d-inline">
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
        {{ $doctors->appends(request()->query())->render() }}
    </div>

@endSection
