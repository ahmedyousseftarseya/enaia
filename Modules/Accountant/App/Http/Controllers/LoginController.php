<?php

namespace Modules\Accountant\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | redirecting them to your home screen. The controller uses a trait
    | This controller handles authenticating users for the application and
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 1; // Default is 1

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'accountant';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:accountant')->except('logout');
    }

    public function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 5; 
    }

    // login with username
    public function username(){
        return 'username';
    }

    // change guard for admin
    protected function guard()
    {
        return Auth::guard('accountant');
    }

    // change redirect after logout
    public function logout()
    {
        Auth::guard('accountant')->logout();
        return redirect()->route('accountant.login');
    }

    public function showLoginForm()
    {
        return view('accountant::auth.login');
    }

}














