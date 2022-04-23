<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function get_login()
    {
        return view('website.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $remember_me = $request->remember_me == 'on' ? true : false;

        try {
            $admin = User::where('email', $request->email)->first();
            if ($admin) {
                if ($admin->status == 1) {
                    if (Auth::guard('web')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                    ], $remember_me)) {
                        return redirect()->route('website.index');
                    } else {
                        $msg = ['custom_error' => 'Password is incorrect, check your password and try again.'];
                        return redirect()->back()->with($msg)->withInput();
                    }
                } else {
                    $msg = ['custom_error' => 'This account is closed, contact HR or support.'];
                    return redirect()->back()->with($msg)->withInput();
                }
            } else {
                $msg = ['custom_error' => 'This email does not exist, check your email and try again.'];
                return redirect()->back()->with($msg)->withInput();
            }
        } catch (\Throwable $th) {
            $msg = ['custom_error' => 'Internal error occured, try again later.'];
            return redirect()->back()->with($msg)->withInput();
        }
    }

    public function account()
    {
        //
    }

    public function update_password(Request $request)
    {
        //
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('website.get.login');
    }
}
