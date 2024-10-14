<?php

namespace App\Http\Controllers\Admin;

use App\Models\Imagetable;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
    }
    public function get_login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('notify_success', 'You are already logged in as Admin');
        }
        return view('admin.login')->with('title', 'Admin Login');
    }

    public function performLogin(Request $request, MessageBag $message_bag)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('notify_success', 'You are already logged in as Admin');
        }
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('notify_success', 'You are already logged in as Admin');
        } else {
            return redirect()->back()->withInput($request->input())->with('notify_error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('notify_success', 'Logged Out!');
    }
}
