<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Newsletter;
use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\Sub_category;
use App\Models\Review;
use App\Models\Orders;
use App\Models\Invoice;
use App\Models\Products;
use App\Models\Category;
use App\Models\Collection;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

use App\Traits\MyTrait;
class AdminDashController extends Controller
{
    use MyTrait;
    public function __construct()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
    }

    public function dashboard()
    {
        $users = User::get();
        return view('admin.dashboard')->with('title', 'Admin Dashboard')->with('user_menu', true)->with(compact('users'));
    }

    /*------------------INQUIRY Management--------------------------------*/ 
    public function inquiries_listing()
    {
        $inquiries = Inquiry::get();
        return view('admin.inquiries.list')->with('title', 'Inquiries')->with('inquiry_menu', true)->with(compact('inquiries'));
    }

    public function inquiries_listing_view($id)
    {
        $inquiry = Inquiry::where('id', $id)->first();
        if ($inquiry) {
            $is_read = Inquiry::where('id', $id)->update([
                'is_read' => 1
            ]);
        }

        return view('admin.inquiries.view')->with('title', 'View Inquiry')->with('inquiry_menu', true)->with(compact('inquiry'));
    }
    
    public function inquiries_listing_delete($id)
    {
        $inquiry = Inquiry::where('id', $id)->delete();
        return back()->with('notify_success', 'Inquiry Deleted!');
    }
    /*------------------INQUIRY Management--------------------------------*/ 

    /*------------------User Management--------------------------------*/ 
    public function users_listing()
    {
        $users = User::with("get_roles_users")->get();
        return view('admin.users-management.list')->with('title', 'User Management')->with('user_mgmmenu', true)->with(compact('users'));
    }

    public function add_users()
    {
        $users = User::get();
        return view('admin.users-management.add')->with('title', 'Add New User')->with('user_mgmmenu', true)->with(compact('users'));
    }

    public function create_users(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'password' => 'required|max:255',
            'password_confirmation' => 'required|same:password|max:255',
            'email' => 'required|unique:users|max:255',
            'is_active' => 'required',

        ]);
    }

    public function edit_user($id)
    {
        $user = User::where('id', $id)->first();
        $data = compact('user');
        return view('admin.users-management.edit')->with('title', 'Edit User')->with('user_mgmmenu', true)->with($data);
    }
    
    public function delete_user($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect()->route('admin.users_listing')->with('notify_success', 'User Deleted Successfuly!!');
    }
    
    public function user_password_change($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            $data = compact('user');
            return view('admin.users-management.change-password')->with('title', 'Change Password')->with($data);
        }
    }
    
    public function user_password_change_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $user = User::where("id", $request->user_id)->update([
            'password' => bcrypt($request['password']),
            'password_sample' => $request['password'],
        ]);
        return redirect()->route('admin.users_listing')->with('notify_success', 'Password Changed Successfuly!!');
    }

    public function update_user(Request $request)
    {
        $user = User::where('id', $request->id)->update([
            'full_name' => $request['full_name'],
            'registration_id' => $request['registration_id'],
            'major_subject' => $request['major_subject'],
            'speciality' => $request['speciality'],
            'batch' => $request['batch'],
            'year' => $request['year'],
            'password' => bcrypt($request['password']),
            'password_sample' => $request['password'],
        ]);

        if (request()->hasFile('profile_img')) {
            $avatar = request()->file('profile_img')->store('Uploads/User/Profile' . $request->id . rand() . rand(10, 100), 'public');
            $image = User::where('id', $request->id)->update(
                [
                    'profile_img' => asset($avatar),
                ]
            );
        }
        return redirect()->route('admin.users_listing')->with('notify_success', 'User Updated Successfuly!!');
    }

    public function suspend_user($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->is_active == 0) {
            $user->is_active = 1;
            $user->save();
            return redirect()->route('admin.users_listing')->with('notify_success', 'User Activated Successfuly!!');
        } else {
            $user->is_active = 0;
            $user->save();
            return redirect()->route('admin.users_listing')->with('notify_success', 'User Suspended Successfuly!!');
        }
    }
    /*------------------User Management--------------------------------*/ 

    /*------------------Testimonial Management--------------------------------*/ 
    public function testimonial_listing()
    {
        $testimonial = Testimonial::where("table_name", "main-testimonial")->get();
        return view('admin.testimonial-management.list')->with('title', 'Testimonial Management')->with('testimonial_menu', true)->with(compact('testimonial'));
    }

    public function add_testimonial()
    {
        return view('admin.testimonial-management.add')->with('title', 'Add Testimonial')->with('testimonial_menu', true);
    }

    public function create_testimonial(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'thumbnails' => 'required',
        ]);

        $testimonial = Testimonial::create([
            'name' => $request['name'],
            'table_name' => "main-testimonial",
            'is_featured' => isset($request['is_featured']) && $request['is_featured'] == 'on' ? '1' : '0',
            'description' => $request['description'],
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/testimonial/thumbnails/' . $testimonial->id . rand() . rand(10, 100), 'public');
            $image = Testimonial::where('id', $testimonial->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Created Successfuly!!');
    }

    public function edit_testimonial($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        return view('admin.testimonial-management.edit')->with('title', 'Edit Testimonial')->with('testimonial_menu', true)->with(compact('testimonial'));
    }

    public function savetestimonial(Request $request)
    {
        $existing_test = Testimonial::where('id', $request->id)->where("is_active", 1)->first();
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'thumbnails' => $existing_test->img_path == null ? 'required' : '',
        ]);

        $testimonial = Testimonial::where('id', $request->id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'is_featured' => isset($request['is_featured']) && $request['is_featured'] == 'on' ? '1' : '0',
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/description/thumbnails/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Testimonial::where('id', $request->id)->update(
                [
                    'img_path' => $thumbnail,
                ]
            );
        }

        return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Updated Successfuly!!');
    }

    public function suspend_testimonial($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        if ($testimonial->is_active == 0) {
            $testimonial->is_active = 1;
            $testimonial->save();
            return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Activated Successfuly!!');
        } else {
            $testimonial->is_active = 0;
            $testimonial->save();
            return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Suspended Successfuly!!');
        }
    }

    public function delete_testimonial($id)
    {
        $testimonial = Testimonial::where('id', $id)->delete();
        return redirect()->route('admin.testimonial_listing')->with('notify_success', 'Testimonial Deleted Successfuly!!');
    }
    /*------------------Testimonial Management--------------------------------*/ 
    
    /*------------------Reviews Management--------------------------------*/ 
    public function reviews_listing()
    {
        $reviews = Review::with('get_products')->get();
        return view('admin.reviews-management.list')->with('title', 'Reviews Management')->with(compact('reviews'));
    }
    
    public function edit_review($id)
    {
        $review = Review::where('id',$id)->with('get_user')->first();
        return view('admin.reviews-management.edit')->with('title', 'View Reviews')->with(compact('review'));
    }

    public function suspend_review($id)
    {
        $review = Review::where('id', $id)->first();
        if ($review->is_active == 0) {
            $review->is_active = 1;
            $review->save();
            return redirect()->route('admin.reviews_listing')->with('notify_success', 'Review Activated Successfuly!!');
        } else {
            $review->is_active = 0;
            $review->save();
            return redirect()->route('admin.reviews_listing')->with('notify_success', 'Review Suspended Successfuly!!');
        }
    }

    public function delete_review($id)
    {
        $review = Review::where('id', $id)->delete();
        return redirect()->route('admin.reviews_listing')->with('notify_success', 'Review Deleted Successfuly!!');
    }
    
    public function newsletter_listing()
    {
        $newsletter = Newsletter::get();
        return view('admin.newsletter.list')->with('title', 'Newsletter Listing')->with('newslettermenu', true)->with(compact('newsletter'));
    }

    public function newsletter_listing_delete($id)
    {
        $inquiry = Newsletter::where('id', $id)->delete();
        return back()->with('notify_success', 'Newsletter Deleted!');
    }
    /*------------------Reviews Management--------------------------------*/ 

    /*------------------Collection Management--------------------------------*/ 
    public function collection_listing()
    {
        $collection = Collection::get();
        return view('admin.collection-management.list')->with('title', 'Collection Management')->with(compact('collection'));
    }

    public function add_Collection()
    {
        return view('admin.collection-management.add')->with('title', 'Collection News');
    }

    public function savecollection(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $collection = Collection::where('id', $request->id)->first();

        $collection->is_featured = $request['is_featured'] == 'on' ? '1' : '0';

        if(str_replace(' ', '-', strtolower($request['title'])) != $collection->slug){
            $collection->title = $request['title'];
            $collection->slug = str_replace(' ', '-', strtolower($request['title']));
        }

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/Collection/thumbnails/' . rand(10, 100), 'public');
            $collection->img_path = $thumbnail;
        }
        $collection->save();

        return redirect()->route('admin.collection_listing')->with('notify_success', 'Collection Updated Successfuly!!');
    }

    public function create_collection(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $collection = Collection::where('slug', str_replace(' ', '-', strtolower($request['title'])))->first();

        if(!$collection){
            $collection = Collection::create([
                'title' => $request['title'],
                'slug' => str_replace(' ', '-', strtolower($request['title'])),
                'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
            ]);
        }

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/Collection/thumbnails/' . rand(10, 100), 'public');
            $image = Collection::where('id', $collection->id)->update(
                [
                    'img_path' => $thumbnail,
                    'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
                ]
            );
        }
        return redirect()->route('admin.collection_listing')->with('notify_success', 'Collection Created Successfuly!!');
    }

    public function edit_Collection($id)
    {
        $collection = Collection::where('slug', $id)->first();
        return view('admin.collection-management.edit')->with('title', 'Edit Collection')->with(compact('collection'));
    }

    public function suspend_collection($id)
    {
        $collection = Collection::where('slug', $id)->first();
        
        if ($collection->is_active == 0) {
            $collection->is_active = 1;
            $collection->save();
            return redirect()->route('admin.collection_listing')->with('notify_success', 'Collection Activated Successfuly!!');
        } else {
            $collection->is_active = 0;
            $collection->save();
            return redirect()->route('admin.collection_listing')->with('notify_success', 'Collection Suspended Successfuly!!');
        }
    }

    public function delete_collection($id)
    {
        $collection = Collection::where('slug', $id)->delete();
        return redirect()->route('admin.collection_listing')->with('notify_success', 'Collection Deleted Successfuly!!');
    }
    /*------------------collection Management--------------------------------*/ 

    /*------------------Category Management--------------------------------*/ 
    public function category_listing()
    {
        $categories = Category::with('get_collection')->get();
        return view('admin.category-management.list')->with('title', 'Category Management')->with(compact('categories'));
    }

    public function add_category()
    {
        $collection = Collection::where('is_active', 1)->get();
        return view('admin.category-management.add')->with('title', 'Category News')->with(compact('collection'));
    }

    public function savecategory(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'collection_id' => 'required',
        ]);

        $category = Category::where('id', $request->id)->update([
            'title' => $request['title'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
            'collection_id' => $request['collection_id'],
        ]);

        return redirect()->route('admin.category_listing')->with('notify_success', 'Category Updated Successfuly!!');
    }

    public function create_category(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique:category',
            'collection_id' => 'required',
        ]);

        $category = Category::create([
            'title' => $request['title'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
            'collection_id' => $request['collection_id'],
        ]);
        
        return redirect()->route('admin.category_listing')->with('notify_success', 'Category Created Successfuly!!');
    }

    public function edit_category($id)
    {
        $category = Category::where('slug', $id)->first();
        $collection = Collection::where('is_active', 1)->get();
        return view('admin.category-management.edit')->with('title', 'Edit category')->with(compact('category', 'collection'));
    }

    public function suspend_category($id)
    {
        $category = category::where('slug', $id)->first();
        
        if ($category->is_active == 0) {
            $category->is_active = 1;
            $category->save();
            return redirect()->route('admin.category_listing')->with('notify_success', 'Category Activated Successfuly!!');
        } else {
            $category->is_active = 0;
            $category->save();
            return redirect()->route('admin.category_listing')->with('notify_success', 'Category Suspended Successfuly!!');
        }
    }

    public function delete_category($id)
    {
        $category = Category::where('slug', $id)->delete();
        return redirect()->route('admin.category_listing')->with('notify_success', 'Category Deleted Successfuly!!');
    }
    /*------------------Category Management--------------------------------*/ 

    /*------------------Sub Category Management--------------------------------*/ 
    public function subcategory_listing()
    {
        $subcategory = Sub_category::with('get_categories')->get();
        return view('admin.subcategory-management.list')->with('title', 'Sub Category Management')->with('subcategory_menu', true)->with(compact('subcategory'));
    }

    public function add_subcategory()
    {
        $maincategory = Category::where('is_active', 1)->get();
        return view('admin.subcategory-management.add')->with('title', 'Sub Category')->with('subcategory_menu', true)->with(compact('maincategory'));
    }

    public function create_subcategory(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'category_id' => 'required',
                'slug' => 'unique:sub_category'
            ],
            [
                'category_id.required' => 'The category field is required.'
            ]
        );

        $subcategory = Sub_category::create([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/Sub_category/thumbnails/' . rand(10, 100), 'public');
            $image = Sub_category::where('id', $subcategory->id)->update(
                [
                    'img_path' => asset($thumbnail),
                ]
            );
        }
        return redirect()->route('admin.subcategory_listing')->with('notify_success', 'SubCategory Created Successfuly!!');
    }

    public function edit_subcategory($id)
    {
        $subcategory = Sub_Category::where('slug', $id)->with('category')->first();
        $maincategory = Category::where('is_active', 1)->with('get_subcatgory')->get();
        return view('admin.subcategory-management.edit')->with('title', 'Edit sub category')->with('subcategory_menu', true)->with(compact('subcategory', 'maincategory'));
    }
    
    public function savesubcategory(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'category_id' => 'required',
            ]
        );

        $subcategory = Sub_category::where('id', $request->id)->update([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
        ]);

        if (request()->hasFile('thumbnails')) {
            $thumbnail = request()->file('thumbnails')->store('Uploads/Sub_category/thumbnails/' . rand(10, 100), 'public');
            $image = Sub_category::where('id', $request->id)->update(
                [
                    'img_path' => asset($thumbnail),
                ]
            );
        }

        return redirect()->route('admin.subcategory_listing')->with('notify_success', 'Sub Category Updated Successfuly!!');
    }

    public function suspend_subcategory($id)
    {
        $subcategory = Sub_category::where('slug', $id)->first();
        if ($subcategory->is_active == 0) {
            $subcategory->is_active = 1;
            $subcategory->save();
            return redirect()->route('admin.subcategory_listing')->with('notify_success', ' Sub Category Activated Successfuly!!');
        } else {
            $subcategory->is_active = 0;
            $subcategory->save();
            return redirect()->route('admin.subcategory_listing')->with('notify_success', 'Sub Category Suspended Successfuly!!');
        }
    }

    public function delete_subcategory($id)
    {
        $subcategory = Sub_category::where('slug', $id)->delete();
        return redirect()->route('admin.subcategory_listing')->with('notify_success', 'Sub Category Deleted Successfuly!!');
    }

    public function getsubcategory(Request $request)
    {
        $subcategory = Sub_category::where('is_active', 1)->where('category_id', $request->category_id)->select('id', 'title')->get()->toArray();
        if (!empty($subcategory)) {
            return response()->json(['status' => 1, 'data' => $subcategory]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
    /*------------------Sub Category Management--------------------------------*/ 

    /*------------------Order Management--------------------------------*/ 
    public function orders_listing()
    {
        $orders = Orders::get();
        return view('admin.orders-management.list')->with('title', 'Orders Management')->with(compact('orders'));
    }

    public function view_order($id)
    {
        $order = Orders::where('id', $id)->with('orderHasDetail')->first();

        if ($order->orderHasDetail) {
            $order_detail = unserialize($order->orderHasDetail->details);
        } else {
            $order_detail = [];
        }
        $cart_data = Session::get('cart');
        $products = Products::where('is_active', 1)->get();
        $data = compact('order', 'order_detail', 'products', 'cart_data');
        return view('admin.orders-management.detail')->with('title', 'View Order')->with($data);
    }

    public function delete_order($id)
    {
        $order = Orders::where('id', $id)->delete();
        return redirect()->route('admin.orders_listing')->with('notify_success', 'Order Deleted Successfuly!!');
    }

    public function order_status_update($id)
    {
        $status = $_GET['status'];
        $order = Orders::where('id', $id)->first();
        $order->is_active = $status;
        $order->save();
        return redirect()->route('admin.orders_listing')->with('notify_success', 'Order Status Updated Successfuly!!');
    }
    /*------------------Order Management--------------------------------*/ 

    /*------------------Invoice Management--------------------------------*/ 
    public function invoice_listing()
    {
        $invoices = Invoice::where("is_active", 1)->get();
        $data = compact('invoices');
        return view('admin.invoice-generator.list')->with('title', 'Invoices')->with($data);
    }

    public function add_invoice()
    {
        $products = Products::where("is_active", 1)->get();
        $data = compact('products');
        return view('admin.invoice-generator.add')->with('title', 'Generate Invoice')->with($data);
    }

    public function save_invoice(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|unique:invoices',
            'date' => 'required|date',
            'full_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'vin' => 'required|string|max:255',
            'year' => 'required|numeric',
            'model' => 'required|string|max:255',
            'mileage' => 'required|numeric',
            'color' => 'required|string|max:255',
            'unit' => 'required|numeric',
            'product_name.*' => 'required|string|max:255',
            'quantity.*' => 'required|numeric',
            'price.*' => 'required|numeric',
            'total_amount.*' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'amount_due' => 'required|numeric',
            '1_month' => 'required|numeric',
            '2_month' => 'required|numeric',
            '3_month' => 'required|numeric',
            '4_month' => 'required|numeric',
        ]);

        $config = $this->getConfig();
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();

        $productDetails = [];
        $productCount = count($request->input('product_name'));

        for ($i = 0; $i < $productCount; $i++) {
            $productDetails[] = [
                'product_name' => $request->input('product_name')[$i],
                'quantity' => $request->input('quantity')[$i],
                'price' => $request->input('price')[$i],
                'tax' => $request->input('tax')[$i],
                'total_amount' => $request->input('total_amount')[$i],
            ];
        }

        $invoiceData = $request->except('_token', 'product_name', 'quantity', 'price', 'tax', 'total_amount');
        $invoiceData['product_details'] = serialize($productDetails);
        $invoice = Invoice::create($invoiceData);

        Mail::send('email/order-invoice', ['invoiceData' => $invoiceData, "config" => $config, "logo" => $logo], function ($message) use ($invoiceData) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($invoiceData['email']);
            $message->subject('Order Incoive');
        });

        return redirect()->route('admin.invoice_listing')->with('notify_success', 'Invoice Created Successfully!!');
    }

    public function delete_invoice($id)
    {
        $invoice = Invoice::where('id', $id)->delete();
        return redirect()->route('admin.invoice_listing')->with('notify_success', 'Invoice Deleted Successfuly!!');
    }
    /*------------------Invoice Management--------------------------------*/ 
   
    public function check_slug(Request $request)
    {
        $slug = Str::slug($request->title, '-');
        return response()->json(['slug' => $slug]);
    }
}
