<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use \App\Http\Requests\web\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/')->with(['success' => __('message.login_success')]);
        }
        return redirect()->route('loginAdmin')->withErrors([
            'message' => __('message.login_fail')
        ]);
    }
    public function logout() {
        Auth::logout();
        session()->flush();
        return redirect()->route('auth.login');
    }
}
