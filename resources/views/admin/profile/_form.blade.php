<form class="form" action="{{ $admin->id ? route('admin.admins.update', $admin->id) : route('admin.admins.store') }}"
    method="post" enctype="multipart/form-data">

    @csrf
    @if ($admin->id)
        @method('PUT')
    @endif

    <div class="row">

        <div class="text-center mb-4">
            <img class="img-200 rounded-circle image-preview position-relative" alt="dsds"
                src="{{ asset($admin->image_url) }}">
            <label for="fileid" style="left: 49%; bottom: -20%" class="position-absolute text-white">
                <span style="color: gray; cursor: pointer"><i class='fa fa-camera'></i></span>
            </label>
            <input type="file" id="fileid" style="display: none" class="image form-control" name="image"
                accept="image/*">

            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">
            {{ html()->label(__('lang.role')) }}
            <span class="text-danger fs-6">*</span>
            {{ html()->select('role', $roles, old('role', $admin->getRole()->id ?? ''))->class('form-control select2')->attribute('required')->placeholder(__('lang.select_item')) }}

            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">

            {{ html()->label(__('lang.username')) }}
            <span class="text-danger fs-6">*</span>
            {{ html()->text('username', old('username', $admin->username))->class('form-control')->attribute('required')->placeholder(__('lang.username')) }}

            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">

            {{ html()->label(__('lang.email')) }}
            <span class="text-danger fs-6">*</span>
            {{ html()->email('email', old('email', $admin->email))->class('form-control')->attribute('required')->placeholder(__('lang.email')) }}

            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">
            {{ html()->label(__('lang.phone')) }}
            <span class="text-danger fs-6">*</span>
            {{ html()->text('phone', old('phone', optional($admin)->phone))->class('form-control')->attribute('required')->placeholder(__('lang.phone')) }}

            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">
            {{ html()->label(__('lang.password')) }}
            {!! $admin->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
            {{ html()->password('password', old('password', optional($admin)->password))->class('form-control')->attribute($admin->id ? '' : 'required')->placeholder(__('lang.password')) }}

            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">
            {{ html()->label(__('lang.password_confirmation')) }}
            {!! $admin->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
            {{ html()->password('password_confirmation', old('password_confirmation', optional($admin)->password_confirmation))->class('form-control')->attribute($admin->id ? '' : 'required')->placeholder(__('lang.password_confirmation')) }}

            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
        </div>

    </div>
</form>
