<div class="row">
    <div class="col-12">
        <div class="table-responsive signal-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        @if (isset($headers))
                            {!! $headers !!}
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if (isset($data))
                        {!! $data !!}
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
