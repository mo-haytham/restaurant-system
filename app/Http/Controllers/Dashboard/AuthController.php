<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function get_login()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $remember_me = $request->remember_me == 'on' ? true : false;

        try {
            $admin = Admin::where('email', $request->email)->first();
            if ($admin) {
                if ($admin->status == 1) {
                    if (Auth::guard('admin')->attempt([
                        'email' => $request->email,
                        'password' => $request->password,
                    ], $remember_me)) {
                        return redirect()->route('dashboard.index');
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
        auth('admin')->logout();
        return redirect()->route('dashboard.get.login');
    }
}
