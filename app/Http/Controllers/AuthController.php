<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    /**
     * Register
     *
     * @param  RegisterRequest $request
     * @return mixed json_data
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);

        $data['name'] = $user->name;
        $data['token'] = $user->createToken('vc')->accessToken;

        return Helper::api_response(200, 'Registered Successfully', $data);
    }

    /**
     * Login
     *
     * @param  LoginRequest $request
     * @return mixed json_data
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user(); 
            $data['name'] =  $user->name;
            $data['token'] =  $user->createToken('vc')->accessToken;

            return Helper::api_response(200, 'Logined Successfully', $data);
        } else {
            return Helper::api_response(401, 'Unauthenticated Error');
        } 
    }
}
