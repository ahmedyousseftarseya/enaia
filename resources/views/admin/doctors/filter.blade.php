<form action="{{ route('admin.doctors.index') }}" method="get">
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">{{ __('lang.search') }}</label>
                {{ html()->text('search', request('search'))
                    ->class('form-control') 
                    ->placeholder(__('lang.search'). ' ' . __('lang.by') . ' ' . __('lang.name') . ', ' . __('lang.phone') . ', ' . __('lang.email'))
                }}
            </div>
        </div>
        
        <div class="col-4">
            {{ html()->label(__('lang.specialization')) }}
            <span class="text-danger fs-6">*</span>
            {{ html()->select('specialization_id', $specializations, request('specialization_id'))->class('select2')->placeholder(__('lang.select-item')) }}
        </div>

        <div class="col-4" style="margin-top: 2.2em!important">
            <input type="submit" class="btn btn-primary {{ isRtl() ? 'ms-2' : 'me-2' }}" value="{{ __('lang.search') }}">
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-danger">{{ __('lang.reset') }}</a>
        </div>

    </div>
</form>