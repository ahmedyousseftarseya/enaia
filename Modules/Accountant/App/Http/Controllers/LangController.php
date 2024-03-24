<?php

namespace Modules\Accountant\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
