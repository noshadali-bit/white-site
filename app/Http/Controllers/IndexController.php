<?php

namespace App\Http\Controllers;

use App\Models\Imagetable;
use App\Models\Testimonial;
use App\Models\Products;
use App\Models\Review;
use App\Models\User;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Sub_category;
use App\Models\Product_images;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $logo = Imagetable::where('table_name', "logo")->latest()->first();
        $collections = Collection::where('is_featured', 1)->where('is_active', 1)
            ->with([
                'collection_categories' => function($query) {
                    $query->with('get_subcatgory');
                }
            ])
            ->get();

        $demo = "127.0.0.1";
        $connect = '/';

        if((strpos(url('/'), $demo) !== false)){
            $connect = '';
        }
        if((strpos(url('/'), "localhost") !== false)){
            $connect = '';
        }
        
        View()->share('logo', $logo);
        View()->share('collections', $collections);
        View()->share('config', $this->getConfig());
        View()->share('connect', $connect);
    }

    // -----------All View Pages-------------
    public function home()
    {
        $welcome_slider = Imagetable::where('table_name', "welcome-slider")->first();
        $collections = Collection::where('is_active', 1)->with([
            'collection_categories' => function($query) {
                $query->with('get_products');
            }
        ])->get();
        $feature_products  = Products::where('is_active', 1)->where('is_featured', 1)->with('get_categories')->get();
        $in_deal_products  = Products::where('is_active', 1)->where('is_featured', 1)->where('in_deal', 1)->with('get_categories')->get();
        return view('index')->with('title', 'Home')->with(compact('welcome_slider', 'collections', 'feature_products', 'in_deal_products'));
    }
    
    public function cart()
    {
        if (Session::has('cart') && !empty(Session::get('cart'))) {
            return view('cart')->with('title', 'Cart');
        }else{
            return redirect()->back()->with('notify_error', 'Cart is Empty');
        }
    }
    
    public function categories()
    {
        $categories = Category::where('is_active', 1)->with('get_collection')->paginate(30);
        $data = compact('categories');
        return view('categories')->with('title', 'Categories')->with($data);
    }

    public function contact()
    {
        return view('contact')->with('title', 'Contact');
    }

    public function login()
    {
        return view('login')->with('title', 'Login');
    }

    public function sign_up()
    {
        return view('sign-up')->with('title', 'Sign Up');
    }

    public function sub_category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $sub_category = Sub_category::where('category_id', $category->id)->paginate(30);
            $data = compact('sub_category');
            return view('sub_categories')->with('title', 'Sub Category')->with($data);
        } else {
            return redirect()->back()->with('notify_error', 'No Sub-Category');
        }
    }

    public function product()
    {
        $products = Products::where('is_active', 1)->with('get_categories');
        $all_collections = Collection::where('is_active', 1)->get();
        $all_categories = Category::where('is_active', 1)->get();
        $all_sub_categories = Sub_category::where('is_active', 1)->get();

        if (request()->has('category')) {
            $categorySlug = request('category');
            $selectedCategory = Category::where('slug', $categorySlug)->first();

            if ($selectedCategory) {
                $products->where('category_id', $selectedCategory->id);
                $all_sub_categories = Sub_category::where('is_active', 1)->where('category_id', $selectedCategory->id)->get();
            }
        }

        if (request()->has('order_by')) {
            $orderBy = request('order_by');

            if ($orderBy == "sort-by-latest") {
                $products->latest();
            } elseif ($orderBy == "price-low-to-high") {
                $products->orderBy('price', 'asc');
            } elseif ($orderBy == "price-high-to-low") {
                $products->orderBy('price', 'desc');
            }
        }
        
        $products = $products->paginate(1000);

        $data = compact('products', 'all_collections', 'all_categories', 'all_sub_categories');
        return view('product')->with('title', 'Product')->with($data);
    }

    public function select_collection(Request $request)
    {
        if($request->type == 'collection'){
            $categories = Category::where('collection_id', $request->id)->with('get_subcatgory')->with('get_products')->get();
            return response()->json(['status' => 1,'categories' => $categories]);
        }elseif($request->type == "category"){

        }elseif($request->type == "sub_category"){

        }
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where("is_active", 1)->get();
        $data = compact('testimonials');
        return view('testimonials')->with('title', 'Testimonials')->with($data);
    }

    public function product_detail($slug)
    {
        $product = Products::where('slug', $slug)->first();
        if($product){
            $related_products = Products::where('category_id', $product->category_id)->get();
            $product_other_imgs = Product_images::where('product_id', $product->id)->get();
            $reviews = Review::where("is_active", 1)->where("product_id", $product->id)->get();
            $data = compact('product', 'product_other_imgs', 'reviews', 'related_products');
            return view('product-detail')->with('title', 'Product Details')->with($data);
        }else{
            return redirect()->route('product')->with('notify_error', 'Product Not Found');
        }
    }

    public function add_review(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'product_id' => 'required',
                'full_name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required',
                'rating' => 'required',
            ]);
            $review = Review::create([
                'user_id' =>  Auth::id(),
                'product_id' =>  $request['product_id'],
                'full_name' =>  $request['full_name'],
                'email' =>  $request['email'],
                'message' =>  $request['message'],
                'rating' =>  $request['rating'],

            ]);
            return back()->with('notify_success', 'Review Pending For Admin Approval!');
        } else {
            return back()->with('notify_error', 'Please Login To Post Reviews!!');
        }
    }

    public function check_slug(Request $request)
    {
        $base_slug = Str::slug($request->title, '-');
        $slug = $base_slug;
        $count = 1;

        while (User::where('slug', $slug)->exists()) {
            $slug = $base_slug . '-' . $count;
            $count++;
        }

        return response()->json(['slug' => $slug]);
    }

    public function checkout($ref = null)
    {
        $sub_total = 0; 
        $total = 0; 

        // if (Auth::check()) {
            if (isset($_GET) && !empty($_GET)) {
                Session::forget('shipping');
            }

            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart_data = Session::get('cart');

                foreach ($cart_data as $key => $value) {
                    if ($key != 'order_id') {
                        $sub_total += $value['sub_total'];
                        $total += $value['sub_total']; 
                    }
                }
                return view('checkout')->with('title', 'Checkout')->with(compact('cart_data', 'ref', 'sub_total', 'total'));
            } else {
                return redirect()->route('cart')->with('notify_error', 'Your Cart Is Empty!');
            }
        // } else {
        //     return redirect()->route('login')->with('notify_error', 'You need to login first!');
        // }
    }
    // -----------All View Pages-------------

}
