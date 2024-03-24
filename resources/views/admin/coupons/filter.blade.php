<form action="{{ route('admin.coupons.index') }}" method="get">
    <div class="row">
        <div class="col-3">
            <label class="form-label">{{ __('lang.search') }}</label>
            {{ html()->text('search', request('search'))
                ->class('form-control') 
                ->placeholder(__('lang.search'). ' ' . __('lang.by') . ' ' . __('lang.title') . ', ' . __('lang.description'))
            }}
        </div>

        <div class="col-3">
            {{ html()->label(__('lang.type')) }}
            <select name="type" id="type" class="form-select">
                <option value="">{{ __('lang.select_item') }}</option>
                @foreach ($types as $type)
                    <option value="{{ $type }}" {{ $type == request()->type ? 'selected' : '' }}>{{ __('lang.' . $type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-3">
            {{ html()->label(__('lang.status')) }}
            <select name="status" class="form-select">
                <option value="">{{ __('lang.select_item') }}</option>
                @foreach ($status as  $value)
                    <option value="{{ $value }}" {{ $value == request()->status ? 'selected' : '' }}>{{ __('lang.' . $value) }} </option>
                @endforeach
            </select>
        </div>
        
        <div class="col-3" style="margin-top: 2.2em !important;">
            <input type="submit" class="btn btn-primary {{ isRtl() ? 'ms-2' : 'me-2' }}" value="{{ __('lang.search') }}">
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-danger">{{ __('lang.reset') }}</a>
        </div>

    </div>
</form>