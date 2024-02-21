<form action="{{ route('admin.cities.index') }}" method="get">
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">{{ __('lang.search') }}</label>
                {{ html()->text('search', request('search'))
                    ->class('form-control') 
                    ->placeholder(__('lang.search'). ' ' . __('lang.by') . ' ' . __('lang.name'))
                }}
            </div>
        </div>

        <div class="col-4">
            {{ html()->label(__('lang.country')) }}
            {{ html()->select('country_id', $countries, old('country_id',  request()->country_id))
                ->class('form-control select2')
                ->placeholder(__('lang.select_item'))
            }}
        </div>
        
        
        <div class="col-4" style="margin-top: 2.2em !important;">
            <input type="submit" class="btn btn-primary {{ isRtl() ? 'ms-2' : 'me-2' }}" value="{{ __('lang.search') }}">
            <a href="{{ route('admin.cities.index') }}" class="btn btn-danger">{{ __('lang.reset') }}</a>
        </div>

    </div>
</form>