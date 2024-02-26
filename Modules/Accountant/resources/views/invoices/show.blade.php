
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('lang.show') }}</h1>
            <button type="button" class="btn-close {{ isRtl() ? ' ms-0' : '' }}" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row" style="font-size: 14px" id="invoice-details" data-id="{{ $invoice->id }}">



            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">{{ __('lang.print') }}</button>
        </div>
    </div>
</div>

