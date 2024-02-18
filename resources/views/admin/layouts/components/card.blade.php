<div class="row mt-4">

    <div class="col-12">
        <div class="card">
            @if (isset($title) || isset($tool))
                <div class="card-header d-flex justify-content-between {{ isset($class) ? $class : '' }} p-3">
                    <h5>  {{ $title ?? '' }} <span class="{{ isRtl() ? 'ms-3' : 'me-3' }}"></span>{!! isset($action) ? $action : '' !!} </h5>
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
