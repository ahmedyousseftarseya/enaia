<div class="card">
    <div class="card-body">
        <h5 class="font-size-16 mb-3">{{ __('lang.about') }}</h5>
        <div class="mt-3">
            <p class="font-size-15 mb-1 w-75">{{ $doctor->about }}</p>

            <h5 class="font-size-15 mt-5">{{ __('lang.experience') }}</h5>
            <div class="row">

                <p class="text-muted w-75">{{ $doctor->experience }}</p>

            </div>
        </div>

        {{-- nurses --}}
        <div class="mt-4">
            <h5 class="font-size-16 mb-4">{{ __('lang.nurses') }}</h5>
            <div class="table-responsive">
                <table class="table table-nowrap table-hover mb-1">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('lang.name') }}</th>
                            <th scope="col">{{ __('lang.phone') }}</th>
                            <th scope="col">{{ __('lang.address') }}</th>
                            <th scope="col" style="width: 120px;">{{ __('lang.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctor->nurses as $nurse)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="{{ $nurse->image_url }}" class="img-50 rounded-circle" alt="not found">
                                    {{ $nurse->name }}
                                </td>
                                <td>{{ $nurse->phone }}</td>
                                <td>{{ $nurse->address ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.nurses.show', $nurse->id) }}" class="btn btn-sm btn-info">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <a href="{{ route('admin.nurses.edit', $nurse->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>

                                    <form action="{{ route('admin.nurses.destroy', $nurse->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger sw-alert"
                                            onclick="return confirm('{{ __('lang.are_you_sure') }}')">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
