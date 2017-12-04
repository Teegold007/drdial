<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function __construct()
    {
        $this->middleware('guest:doctor,patient')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

   public function showLoginForm(){
      return view('auth.login');
   }

   public function login(Request $request){
       $this->validate($request,[
           'email' => 'required|email',
           'password' => 'required',
           'guard' => ['required', Rule::in(['doctor','patient'])]
       ]);
       $credentials = array('email' => $request->input('email'), 'password' => $request->input('password'));
       if(Auth::guard($request->input('guard'))->attempt($credentials, $request->input('remember'))){
           return redirect()->intended('home');
       }else{
           return redirect(route('login'))->with('error','Invalid Credentials');
       }

   }

}
