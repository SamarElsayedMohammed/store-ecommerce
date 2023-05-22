<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.auth.login');
    }

    public function login(AdminLoginRequest $request)
    {

        $remember = $request->remember_me ? true : false;

        $user = auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember);

        if ($user) {
            return redirect()->route('admin.home');
        }
        return back()->withInput($request->only('email', 'remember_me'))->with('danger', 'wrong credintial');

    }
    public function logout()
    {

        $guard = $this->getGuard();
        $guard->logout();
    }
    public function getGuard()
    {
        return auth()->guard('admin');
    }
}