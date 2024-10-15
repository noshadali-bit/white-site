<?php

namespace App\Http\Controllers;


use App\Models\Imagetable;

use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Stripe;
class CartController extends Controller
{
    public function __construct()
    {
        $logo = Imagetable::where('table_name', "logo")->latest()->first();
        $collections = Collection::where('is_featured', 1)
            ->with([
                'collection_categories' => function($query) {
                    $query->with('get_subcatgory');
                }
            ])
            ->get();

        View()->share('logo', $logo);
        View()->share('collections', $collections);
        View()->share('config', $this->getConfig());
    }

    public function order_submit()
    {
        $order_upd = Orders::where('id', $_GET['order_id'])->update([
            'is_active' => 0,
            'pay_status' => '1',
            'order_response' => $_GET['order_number'],
            'token_id' => $_GET['token_id'],
        ]);
        $cart_data = Session::get('cart');
        $order = Orders::where('id', $_GET['order_id'])->with('orderHasDetail')->first();
        $amount = $order->total_amount;
                
        $order_id = $cart_data['order_id'];
        unset($cart_data['order_id']);
        $detail = OrderDetail::create([
            'order_id' => $order_id,
            'details' => serialize($cart_data),
        ]);
        
        Session::forget('cart');
        
        $data = [
            'order' => $order,
            'order_detail' => $cart_data,
        ];
        
        
         Mail::send('email/order-invoice', ['data' => $data], function ($message) use ($order) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($order->email);
            $message->subject('Order Invoice - Alain Fernandez');
        });
        return redirect()->route('home')->with('notify_success', 'Payment Charged Successfully!');
    }

    public function paystatus(Request $request)
    {
        $status_codes = array("Default" => 0, "Completed" => 1, "Pending" => 2, "Denied" => 3, "Failed" => 4, "Reversed" => 5);
        $payment_status = $request['payment_status'];

        $updateParam = $status_codes[$payment_status];

        $order_upd = Orders::where('id', $request['custom'])->update([
            'pay_status' => $updateParam,
            'order_response' => serialize($request->all()),
            'card_payment' => 'PAYPAL'
        ]);
    }

    public function placeorder(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
        ]);

        $order = Orders::create([
            "user_id" => Auth::id(),
            "fname" => $request->fname,
            "lname" => $request->lname,
            "email" => $request->email,
            "address" => $request->address,
            "apartment" => $request->apartment,
            "country" => $request->country,
            "city" => $request->city,
            "state" => $request->state,
            "zip" => $request->zip,
            "phone" => $request->phone,
            "total_amount" => $request->total_amount,
        ]);

        $cart_data = Session::get('cart');
        $cart_data['order_id'] = $order->id;
        $cart_data['order_id'] = $order->id;
        Session::put('cart', $cart_data);
        $data = compact('cart_data');
        return redirect()->route('stripe.post')->with("notify_success", "Success!")->with($data);
    }

    public function stripePost(Request $request)
    {
        $cart_data = Session::get('cart');
        $order = Orders::where('id', $cart_data['order_id'])->first();
        $amount = $order->total_amount;
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $stripe = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'transfer_group' => "ORDER_95",
            ]);
            $secret = $stripe->client_secret;

            return view('placeorder')->with('notify_success', 'Payment Charged Successfully!')->with(compact('secret', 'amount', 'order'));

        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('notify_error', "a " . $e->getError()->message);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return back()->with('notify_error', "b " . $e->getError()->message);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return back()->with('notify_error', "c " . $e->getError()->message);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            dd($e);
            return back()->with('notify_error', "d " . $e->getError()->message);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return back()->with('notify_error', "e " . $e->getError()->message);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return back()->with('notify_error', "f " . $e->getError()->message);
        } catch (Exception $e) {
            return back()->with('notify_error', "g " . $e->getError()->message);
        }

    }

    public function checkout($ref = null)
    {
        $sub_total = 0; // Initialize $sub_total
        $total = 0; // Initialize $total

        if (Auth::check()) {
            if (isset($_GET) && !empty($_GET)) {
                Session::forget('shipping');
            }

            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart_data = Session::get('cart');

                // Calculate $sub_total and $total based on cart_data
                foreach ($cart_data as $key => $value) {
                    if ($key != 'order_id') {
                        $sub_total += $value['sub_total'];
                        $total += $value['sub_total']; // Assuming $total is based on the same logic as $sub_total
                    }
                }

                return view('checkout')->with('title', 'Checkout')->with(compact('cart_data', 'ref', 'sliders', 'sub_total', 'total'));
            } else {
                return redirect()->route('cart')->with('notify_error', 'Your Cart Is Empty!');
            }
        } else {
            return redirect()->route('login')->with('notify_error', 'You need to login first!');
        }
    }

    public function checkout_landing()
    {
        return redirect()->route('home')->with('notify_success', 'Payment success!');
    }

    public function subscription_create(Request $request)
    {
        $order_upd = Orders::where('id', $request['order'])->update([
            'is_active' => 1,
            'pay_status' => 1,
        ]);

        $order_data = Orders::where('id', $request['order'])->first();
        $package = Package::where('id', $order_data->pkg_id)->first();

        Mail::send('email/subscription', ['order_data' => $order_data, 'package' => $package], function ($message) use ($order_data) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($order_data->email);
            $message->subject('Thank You!');
        });

        return redirect()->route('home')->with('notify_success', 'Payment Charged Successfully!');
    }

    public function save_cart(Request $request)
    {
        Session::forget('cart');
        // if (Session::has('cart') && !empty(Session::get('cart'))) {
        //     $rowid = null;
        //     $flag = 0;
        //     $cart_data = Session::get('cart');
        //     foreach ($cart_data as $key => $value) {
        //         if ($key == 'order_id') {
        //             continue;
        //         }
        //         $product_id = $request->product_id;
        //         $cartId = $product_id;
        //         if ((intval($value['product_id']) == intval($request['product_id'])) && $value['cart_id'] == $cartId) {
        //             $flag = 1;
        //             $rowid = $value['cart_id'];
        //             $cart_data[$rowid]['quantity'] += $request['qty'];
        //             $cart_data[$rowid]['sub_total'] = $cart_data[$rowid]['price'] * $cart_data[$rowid]['quantity'];

        //             Session::forget($rowid);
        //             Session::put('cart', $cart_data);

        //             return redirect()->route('cart')->with('notify_success', 'Product Added To Cart Successfully!');
        //         }
        //     }
        // }

        $product_id = $request->product_id;
        $qty = $request->qty;

        $cart = array();
        $cartId = $product_id;
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }

        if ($qty == 0) {
            $qty = 1;
        }

        if (intval($qty) > 0) {
            if (!empty($cartId) && !empty($cart)) {
                unset($cart[$cartId]);
            }
            $product = Products::where('id', $product_id)->first();
            $cart[$cartId]['price'] = intval($request->price);
            $cart[$cartId]['cart_id'] = $cartId;
            $cart[$cartId]['quantity'] = $qty;
            $cart[$cartId]['sub_total'] = floatval(intval($request->price) * $qty);
            $cart[$cartId]['product_id'] = $product_id;
            Session::put('cart', $cart);
            return redirect()->route('cart')->with('notify_success', 'Item Added to cart Successfully');
        } else {
            return back()->with('notify_error', 'Something Went Wrong, Please Try Again!');
        }
    }

    public function updatecart(Request $request)
    {
        $rowid = $request->rowid;
        $qty = $request->qty;
        $cart_data = Session::get('cart');
        $cart_data[$rowid]['quantity'] = $qty;

        $cart_data[$rowid]['sub_total'] = $request['price'] * $qty;
        Session::forget($rowid);
        Session::put('cart', $cart_data);
        return response()->json(['status', 1]);
    }

    public function removecart($cart_id, Request $request)
    {
        $rowid = $cart_id;
        $cart_data = Session::get('cart');
        unset($cart_data[$rowid]);
        Session::forget('cart');
        Session::put('cart', $cart_data);
        return redirect()->back()->with('notify_success', 'Item removed!');
    }
}
