<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Enum;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('dashboard.auth.signin');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(in_array(auth()->user()->role,[Enum::SUPER_ADMIN,Enum::ADMIN]) ){
                return redirect()->route('dashboard.index')->with([
                    'success' => 'Login Successfully'
                ]);
            }elseif(in_array(auth()->user()->role,[Enum::CUSTOMER]) ){
                return redirect()->route('site.brands.index')->with([
                    'success' => 'Login Successfully'
                ]);
            }

        }
        return redirect()->route('login')->with([
            'error' => 'make sure that the email or password '
        ]);
    }
    public function logout(){
        Session::flush();
        $role = \auth()->user()->role;
        auth('web')->logout();

        if($role == Enum::CUSTOMER){
            return redirect()->route('site.brands.index')->with([
                'success' => 'Signed out Successfully'
            ]);
        }
        return redirect()->route('login')->with([
            'success' => 'Signed out Successfully'
        ]);

    }
}
