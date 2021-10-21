<?php

namespace App\Http\Controllers\web\auth;

use App\Enums\UserRole;
use App\Events\formSubmit;
use App\Http\Controllers\Controller;
use App\Http\Requests\web\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('web.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email = request()->email;
        $password = request()->password;
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with(['success' => __('message.login_success')]);
        }
        return redirect()->route('loginUser')->withErrors([
            'message' => __('message.login_fail')
        ]);
    }

    public function logout()
    {
        //logout
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        auth()->login($user);
        return redirect()->intended('/')->with(['success' => __('message.login_success')]);
    }

    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = new User();
            $user->name = $getInfo->name;
            $user->email = $getInfo->email;
            $user->avata = $getInfo->avatar;
            $user->provider = $provider;
            $user->provider_id = $getInfo->id;
            $user->role_id = UserRole::Customer;
            $user->save();
        }
        return $user;
    }
}
