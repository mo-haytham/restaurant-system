<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $admins = Admin::where('status', 1)->get();
        return view('dashboard.settings.accounts.index', compact('admins'));
    }

    public function new()
    {
        return view('dashboard.settings.accounts.new');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'password' => 'required|string',
            'image' => 'nullable|image',
        ]);

        try {
            if (isset($request->image)) {
                $image = $this->saveImage($request->image, 'uploads/accounts');
            } else {
                $image = null;
            }

            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'image_url' => $image,
            ]);

            $back_message = ['custom_success' => 'Admin account added successfully'];
            return redirect()->route('dashboard.management.accounts')->with($back_message);
        } catch (\Throwable $th) {
            $back_message = ['custom_error' => $th->getMessage()];
            return redirect()->back()->with($back_message);
        }
    }

    public function edit($admin_id)
    {
        $admin = Admin::find($admin_id);
        return view('dashboard.settings.accounts.edit', compact('admin'));
    }

    public function update(Request $request, $admin_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'password' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        try {

            $admin = Admin::find($admin_id);

            if (isset($request->image)) {
                $this->deleteImage($admin->image_url);
                $image = $this->saveImage($request->image, 'uploads/accounts');
            } else {
                $image = $admin->image_url;
            }

            if (isset($request->password)) {
                $password = Hash::make($request->password);
            } else {
                $password = $admin->password;
            }

            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $password,
                'image_url' => $image,
            ]);

            $back_message = ['custom_success' => 'Admin updated successfully'];
            return redirect()->route('dashboard.management.accounts')->with($back_message);
        } catch (\Throwable $th) {
            $back_message = ['custom_error' => $th->getMessage()];
            return redirect()->back()->with($back_message);
        }
    }

    public function delete(Request $request)
    {
        $admin = Admin::find($request->admin_id);
        $admin->status = 0;
        $admin->save();
        $back_message = ['custom_success' => 'Admin account deleted'];
        return redirect()->route('dashboard.management.accounts')->with($back_message);
    }
}
