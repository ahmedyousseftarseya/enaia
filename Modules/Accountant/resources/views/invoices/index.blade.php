@extends('accountant::layouts.master')

@section('title', __('lang.invoices_list'))

@section('page-title', __('lang.invoices'))

@section('content')

    {{-- breadcrumb component --}}
    @component('accountant::layouts.components.breadcrumb', [
        'title' => __('lang.invoices_list'),
        'pagetitle' => __('lang.invoices'),
    ])
    @endcomponent

    {{-- filter component --}}
    @component('accountant::layouts.components.filter', [
        'title' => __('lang.filter'),
        'id' => 'filter_body',
    ])
        @slot('tool')
            <button class="btn btn-xs btn-primary" onclick="$('#filter_body').slideToggle()"><span
                    class="fa fa-filter"></span></button>
        @endslot

        @slot('content')
            @include('accountant::invoices.filter')
        @endslot
    @endcomponent


    @component('accountant::layouts.components.card', ['title' => ''])
    
        @slot('content')

            {{-- table component --}}
            @component('accountant::layouts.components.table')
                @slot('headers')
                    <th>#</th>
                    <th>{{ __('lang.ref_no') }}</th>
                    <th>{{ __('lang.date') }}</th>
                    <th>{{ __('lang.payment_method') }}</th>
                    <th>{{ __('lang.payment_status') }}</th>
                    <th>{{ __('lang.tax') }}</th>
                    <th>{{ __('lang.total') }}</th>
                    <th>{{ __('lang.is_return') }}</th>
                    <th>{{ __('lang.show') }}</th>
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
                                    {{ $resource->ref_no }}
                                </td>
                                <td>{{ $resource->date }}</td>
                                <td>{{ $resource->payment_method }}</td>
                                <td>{{ $resource->payment_status }}</td>
                                <td>{{ $resource->tax }}</td>
                                <td>{{ $resource->total }}</td>
                                <td>
                                    @if ($resource->is_return)
                                        <h5><span class="badge bg-success px-4 py-2">{{ __('lang.yes') }}</span></h5>
                                    @else
                                        <h5><span class="badge bg-danger px-4 py-2">{{ __('lang.no') }}</span></h5>
                                    @endif
                                </td>
                            
                                <td>
                                    <a data-href="{{ route('accountant.invoices.show', $resource->id) }}" data-container=".show-invoice" class="btn-modal btn btn-xs btn-primary">
                                        <span class="fa fa-eye"></span>
                                    </a>
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

    <div class="modal fade show-invoice" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    </div>

@endSection
