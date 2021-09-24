<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class LoginController extends Controller
{
    public function index(){
        return view('web.auth.login');
    }
    public function login(Request $request){
        $credentials = $this->validate(request(), [
           'email' => 'required|email:rfc,dns',
           'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with(['success' => __('message.login_success')]);
        }
        return redirect()->route('loginUser')->withErrors([
            'message' => __('message.login_fail')
        ]);
    }
    public function logout() {
        //logout
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }
}
