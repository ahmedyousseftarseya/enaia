<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function notFound() {
        if(view()->exists(request()->path())) {
            return view(request()->path());
        }
        return view('admin.errors.404');
    }
 
}
