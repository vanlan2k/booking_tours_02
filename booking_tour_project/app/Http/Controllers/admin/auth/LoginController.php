<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        /*Check thông tin*/
        if (Auth::attempt($credentials)) {
            /*lưu thông tin đăng nhập*/
            $request->session()->regenerate();
            return redirect()->intended('admin/')->with(['success' => 'Login success']);
        }
        return redirect()->back()->with(['error' => "Unable to login, please check your login information"]);
    }
    public function logout() {
        //logout
        Auth::logout();
        session()->flush();
        return redirect()->route('auth.login');
    }
}
