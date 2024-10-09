<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;

use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Products;
use App\Models\categories;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Newsletter;
use Session;
use Auth;
use Mail;
use App\Rules\PasswordMatch;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
    }

    public function orders()
    {
        $orders = Orders::with('orderHasDetail')->latest()->get();
        return view('admin.orders-management.list')->with('title', 'Orders')->with('order_menu', true)->with(compact('orders'));
    }

    public function order_detail($id)
    {
        $orders = Orders::where('id', $id)->with('orderHasDetail')->first();
        $order_detail = unserialize($orders->orderHasDetail->details);
        return view('admin.orders-management.detail')->with('title', 'Order Detail')->with('order_menu', true)->with(compact('order_detail', 'orders'));
    }

    public function order_delete($id)
    {
        $orders = Orders::where('id', $id)->with('orderHasDetail')->delete();
        return back()->with('notify_success', 'Order Deleted');
    }

   
}
