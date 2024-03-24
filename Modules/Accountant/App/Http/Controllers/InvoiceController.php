<?php

namespace Modules\Accountant\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    protected $model;

    public function __construct(Invoice $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('accountant::invoices.index', [
            'resources' => $resources,
        ]);
    }

    public function show(Invoice $invoice)
    {
        return view('accountant::invoices.show', [
            'invoice' => $invoice,
        ]);
    }
}