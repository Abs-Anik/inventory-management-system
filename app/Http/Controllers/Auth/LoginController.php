<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            // dd(auth()->user()->is_admin);
            if (auth()->user()->is_admin === 1) {
                if($request->remember_me === null){
                    setcookie('login_email', $request->email,100);
                    setcookie('login_password', $request->password,100);
                }else{
                    setcookie('login_email', $request->email, time()+60*60*24*100);
                    setcookie('login_password', $request->password, time()+60*60*24*100);
                }
                $notification = array(
                    'Message' => 'Welcome Back :) ',
                    'alert-type' => 'info'
                );
                return redirect()->route('home')->with($notification);
            }else{
                $notification = array(
                    'Message' => 'Sorry! You are profile in not active. Wait for admin approve',
                    'alert-type' => 'warning'
                );
                return redirect()->route('login')->with($notification);
            }
        }else{
            $notification = array(
                'Message' => 'Sorry! Your Email And Password Are Wrong.',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
            // return Redirect::to('login')->with($notification);
        }

    }
}
