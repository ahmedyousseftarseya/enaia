<form class="form"
    action="{{ route('accountant.profile.update', $accountant->id) }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="row">

        <div class="text-center mb-5">
            <img class="img-200 rounded-circle image-preview position-relative" alt="dsds"
                src="{{ asset($accountant->image_url) }}">
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

            {{ html()->label(__('lang.name')) }}
            <span class="text-danger fs-6">*</span>
            {{ html()->text('name', old('name', $accountant->name))->class('form-control')->attribute('required')->placeholder(__('lang.name')) }}

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">

            {{ html()->label(__('lang.username')) }}
            <span class="text-danger fs-6">*</span>
            {{ html()->text('username', old('username', $accountant->username))->class('form-control')->attribute('required')->placeholder(__('lang.username')) }}

            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">

            {{ html()->label(__('lang.email')) }}
            {{ html()->email('email', old('email', $accountant->email))->class('form-control')->attribute('required')->placeholder(__('lang.email')) }}

            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">
            {{ html()->label(__('lang.phone')) }}
            {{ html()->text('phone', old('phone', optional($accountant)->phone))->class('form-control')->attribute('required')->placeholder(__('lang.phone')) }}

            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">
            {{ html()->label(__('lang.password')) }}
            {!! $accountant->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
            {{ html()->password('password', old('password', optional($accountant)->password))->class('form-control')->attribute($accountant->id ? '' : 'required')->placeholder(__('lang.password')) }}

            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-4">
            {{ html()->label(__('lang.password_confirmation')) }}
            {!! $accountant->id ? '' : '<span class="text-danger fs-6">*</span>' !!}
            {{ html()->password('password_confirmation', old('password_confirmation', optional($accountant)->password_confirmation))->class('form-control')->attribute($accountant->id ? '' : 'required')->placeholder(__('lang.password_confirmation')) }}

            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
        </div>

    </div>
</form>
