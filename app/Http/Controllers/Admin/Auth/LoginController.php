<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    public function showLoginForm(){
        return view('admin.auth.login');
    }


    public function doLogin(Request $request){
        $credentials = array('email' => $request->input('email'), 'password' => $request->input('password'));
        if(Auth::guard('admin')->attempt($credentials, $request->input('remember'))){
            return redirect()->intended('backend/dashboard');
        }else{
            return back()->with(['error' => 'Invalid Credentials']);
        }
    }
}
