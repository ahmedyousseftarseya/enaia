<form action="{{ route('admin.head-nurses.index') }}" method="get">
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label">{{ __('lang.search') }}</label>
                {{ html()->text('search', request('search'))
                    ->class('form-control') 
                    ->placeholder(__('lang.search'). ' ' . __('lang.by') . ' ' . __('lang.name') . ', ' . __('lang.phone'))
                }}
            </div>
        </div>
        
        <div class="col-4" style="margin-top: 2.2em !important;">
            <input type="submit" class="btn btn-primary {{ isRtl() ? 'ms-2' : 'me-2' }}" value="{{ __('lang.search') }}">
            <a href="{{ route('admin.head-nurses.index') }}" class="btn btn-danger">{{ __('lang.reset') }}</a>
        </div>

    </div>
</form>