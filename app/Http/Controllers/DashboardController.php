<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Imagetable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
    }

    public function dashboard()
    {
        $user = User::where('id', Auth::id())->first();
        return view('userdash.dashboard.index')->with('title', 'My Dashboard')->with(compact('user'))
            ->with('dashMenu', true);
    }

    public function myProfile()
    {
        $user = User::where('id', Auth::id())->first();
        return view('userdash.dashboard.myprofile')->with('title', 'My Profile')->with(compact('user'))
            ->with('myProfileMenu', true);
    }

    public function editprofile()
    {
        $user = User::where('id', Auth::id())->first();
        return view('userdash.dashboard.edit-profile')->with('title', 'Edit Profile')->with(compact('user'))
            ->with('myProfileMenu', true);
    }

    public function saveprofile(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);
        $user = User::where('id', Auth::id())->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country
        ]);

        if (request()->hasFile('avatar')) {
            $avatar = request()->file('avatar')->store('Uploads/User/avatar' . $request->id . rand() . rand(10, 100), 'public');
            $image = User::where('id', $request->id)->update(
                [
                    'profile_img' => $avatar,

                ]
            );
        }
        return redirect()->route('dashboard.editProfile')->with('notify_success', 'Profile Updated!');
    }

    public function myorders()
    {
        $orders = Orders::where('user_id', Auth::id())->with('orderHasDetail')->get();
        return view('userdash.dashboard.mybooking')->with('title', 'My Orders')->with(compact('orders'))
            ->with('mybookingMenu', true);
    }

    public function vieworders($decrypt)
    {
        $decrypted = Crypt::decryptString($decrypt);
        $order = Orders::where('id', $decrypted)->where('user_id', Auth::id())->with('orderHasDetail')->first();
        $products = Products::where('is_active', 1)->get();

        if ($order->orderHasDetail) {
            $order_detail = unserialize($order->orderHasDetail->details);
        } else {
            $order_detail = [];
        }

        if ($order) {
            return view('userdash.dashboard.viewbooking')->with('title', 'View Order')->with(compact('order', 'package','products','order_detail'));
        } else {
            return back()->with('notify_error', 'No Details Found!');
        }
    }

    public function deleteorders($decrypt)
    {
        $decrypted = Crypt::decryptString($decrypt);
        $orders = Orders::where('id', $decrypted)->where('user_id', Auth::id())->with('orderHasDetail')->delete();
        return back()->with('notify_success', 'Order Deleted!');
    }

    public function passwordchange()
    {
        $user = User::where('id', Auth::id())->first();
        return view('userdash.dashboard.password-change')->with('title', 'Change Password')->with(compact('user'))->with('passChangeMenu', true);
    }

    public function updatepassword(Request $request)
    {
        $validator = $request->validate([
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = User::where('id', Auth::id())->first();
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect()->route('dashboard.passwordChange')->with('notify_success', 'Password Updated!');
    }

}
