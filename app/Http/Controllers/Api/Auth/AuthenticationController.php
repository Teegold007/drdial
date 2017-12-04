<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Patient;
use Config;
use JWTAuth;
use Illuminate\Validation\Rule;

class AuthenticationController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api-patient,api-doctor', ['except' => ['login','signUp']]);
    }

    /**
     * Get a JWT token via given credentials.
     *c
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request,[
           'email' => 'required',
           'password' =>'required',
           'guard' => ['required', Rule::in(['doctor','patient'])]
        ]);
        $guard = $request->guard;
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard($guard)->attempt($credentials)) {
            return $this->respondWithToken($token,$guard);
        }
        return response()->json(['error' => 'Invalid Credentials'], 401);
    }

    public function signUp(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'role' => ['required', Rule::in(['Doctor','Patient'])],
            'password' => 'required|min:6|confirmed',
            'field' => 'required_if:role,Doctor'
        ]);
        $input = $request->except(['_token','role','password_confirmation']);
        if($request->input('role') == "Doctor")
        {
            $this->validate($request,[
                'email' => 'required|email|unique:doctors',
            ]);
            $doctor = Doctor::create($input);
            $doctor->assignRole($request->role);
        }else{
            $this->validate($request,[
                'email' => 'required|email|unique:patients',
            ]);
            $patient = Patient::create($input);
            $patient->assignRole($request->role);
        }
        return response()->json([
            'success' => 'User Created Successfully'
        ],200);
    }
    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {

        return response()->json([
            'user' => Auth::user(),
            'role' => Auth::user()->roles()->pluck('name')->first()
        ],200);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out'],200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh($guard)
    {
        return $this->respondWithToken($this->guard($guard)->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token,$guard)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'guard' => $guard,
            'expires_in' => $this->guard($guard)->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard($guard)
    {
        return Auth::guard('api-'.$guard);
    }
}
