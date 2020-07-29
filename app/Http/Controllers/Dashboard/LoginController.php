<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
Use Alert;
use Auth;
class LoginController extends Controller
{
    public function getLogin()
    {
        return view('dashboard.Auth.login');
    }//end of get login


    public function login(LoginRequest $request)
    {

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {

            toast(__('site.hello'),'success');
            return redirect()->route('admin.dashboard');
        }


        else {
            toast(__('site.error'),'error');
            return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
        }
    }//end of login

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }//end of logout
}
