<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $login = $request->only('email', 'password');

        if (Auth::attempt($login)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with(['type_message' => 'warning', 'flash_message' => 'Your Email or Password not correct!']);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
