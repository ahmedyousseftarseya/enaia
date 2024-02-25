<form action="{{ route('admin.users.index') }}" method="get">
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <label class="form-label">{{ __('lang.search') }}</label>
                {{ html()->text('search', request('search'))
                    ->class('form-control') 
                    ->placeholder(__('lang.search'). ' ' . __('lang.by') . ' ' . __('lang.name') . ', ' . __('lang.phone') . ', ' . __('lang.email'))
                }}
            </div>
        </div>
        
        <div class="col-3">
            {{ html()->label(__('lang.gender')) }}
            <select name="gender" id="gender" class="form-select">
                <option value="">{{ __('lang.select_item') }}</option>
                @foreach ($genders as  $gender)
                    <option value="{{ $gender }}" {{ $gender == request()->gender ? 'selected' : '' }}>{{ __('lang.' . $gender) }} </option>
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
        
        <div class="col-3" style="margin-top: 2em !important;">
            <input type="submit" class="btn btn-primary {{ isRtl() ? 'ms-2' : 'me-2' }}" value="{{ __('lang.search') }}">
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">{{ __('lang.reset') }}</a>
        </div>

    </div>
</form>