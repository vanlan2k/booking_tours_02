<?php

namespace App\Http\Controllers\web;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\web\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('web.pages.register');
    }

    public function create(RegisterRequest $request)
    {
        $input = $request->all();
        try {
            $input['password'] = bcrypt($request->password);
            $input['role_id'] = UserRole::Customer;
            User::create($input);
            return redirect()->route('loginUser')->with(['success' => __('register.regis_succsess')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('register.regis_fail')]);
        }
    }
}
