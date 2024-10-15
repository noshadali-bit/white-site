<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Password_resets;
use App\Models\Collection;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class UserController extends Controller
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

    public function login_submit(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return redirect()->route('home')->with('notify_success', 'Logged In!');
        } else {
            return back()->with('notify_error', 'Invalid Credentials');
        }
    }

    public function signup_submit(Request $request)
    {
        $validator = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => bcrypt($request['password']),
        ]);
        Auth::login($user);
        return redirect()->route('home')->with('notify_success', 'Signup successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('notify_success', 'Logged Out!');
    }

    public function contact_us_submit(Request $request)
    {
        $validator = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $inquiry = Inquiry::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'message' => $request['message'],
            'phone' => $request['phone'],
            'subject' => $request['subject']
        ]);

        return redirect()->route('home')->with('notify_success', 'Inquiry Submitted!');
    }

    public function newsletter_submit(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email|max:255|',
        ]);

        $newsletter = Newsletter::create([
            'email' => $request['email'],
        ]);

        return redirect()->route('home')->with('notify_success', 'Request Submitted!');
    }

    public function forget_password()
    {
        return view('forgot-password')->with('title', 'Forgot Password');
    }
    
    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email/reset-password', ['token' => $token, 'request' => $request], function ($message) use ($request) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('forgot-password-message')->with('notify_success', 'We have e-mailed your password reset link!');
    }

    public function forgot_password_message()
    {
        return view('forgot-password-message')->with('title', 'Forgot Password');
    }

    public function forget_password_token($token)
    {
        $reset_email =  password_resets::where('token', $token)->first();
        if ($reset_email != null) {

            return view('forgot-password-form', ['token' => $token, 'email' => $reset_email])->with(compact('reset_email'))->with('title', 'Reset Password');
        } else {
            return redirect()->route('home')->with('notify_error', 'Inavlid Token');
        }
    }

    public function forget_password_reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->latest()->first();

        if (!$updatePassword) {
            return back()->withInput()->with('notify_error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect()->route('login')->with('notify_success', 'Your password has been changed!');
    }
}
