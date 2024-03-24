<div class="row justify-content-center my-auto mt-4">
    <div class="col-md-12">

        <div class="card">
            @if (isset($title) || isset($tool))
                <div class="card-header d-flex justify-content-between {{ isset($class) ? $class : '' }} p-2 ">
                    <h5> {!! isset($action) ? $action : '' !!} {{ $title ?? '' }} </h5>
                    <div class="float-start">
                        @if (isset($tool))
                            {!! $tool !!}
                        @endif
                    </div>
                </div>
            @endif
            @if (isset($content) || isset($id))
                <div class="card-body p-4" id="{{ isset($id) ? $id : '' }}">
                    {!! isset($content) ? $content : '' !!}
                </div>
            @endif
        </div>

    </div>

</div>
