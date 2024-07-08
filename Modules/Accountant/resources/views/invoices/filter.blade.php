<form action="{{ route('accountant.invoices.index') }}" method="get">
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <label class="form-label">{{ __('lang.search') }}</label>
                {{ html()->text('search', request('search'))
                    ->class('form-control') 
                    ->placeholder(__('lang.search'). ' ' . __('lang.by') . ' ' . __('lang.ref_no'))
                }}
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label class="form-label">{{ __('lang.date') }}</label>
                {{ html()->date('date', request('date'))
                    ->class('form-control') 
                }}
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label class="form-label">{{ __('lang.is_return') }}</label>
                <select name="is_return" id="is_return" class="form-select">
                    <option value="">{{ __('lang.select_item') }}</option>
                    <option value="1" {{ request('is_return') == '1' ? 'selected' : '' }}>{{ __('lang.yes') }}</option>
                    <option value="0" {{ request('is_return') == '0' ? 'selected' : '' }}>{{ __('lang.no') }}</option>
                </select>
            </div>
        </div>
        
        <div class="col-3" style="margin-top: 2.2em !important;">
            <input type="submit" class="btn btn-primary {{ isRtl() ? 'ms-2' : 'me-2' }}" value="{{ __('lang.search') }}">
            <a href="{{ route('accountant.invoices.index') }}" class="btn btn-danger">{{ __('lang.reset') }}</a>
        </div>

    </div>
</form>