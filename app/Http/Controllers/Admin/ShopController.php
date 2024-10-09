<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Rules\PasswordMatch;

use App\Models\Imagetable;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Admin;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Products;
use App\Models\Review;
use App\Models\Sub_category;
use Session;
use Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ShopController extends Controller
{
    use MyTrait;
    public function __construct()
    {
        $logo = Imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        View()->share('config', $this->getConfig());
    }

    public function get_sub_cat(Request $request)
    {
        $sub_cat  = Sub_category::where('is_active', 1)->where('category_id', $request->cat_id)->get();
        $param = array();
        if (sizeof($sub_cat) > 0) {
            $param = ['status' => 1, 'data' => $sub_cat];
            return response()->json($param);
        } else {
            $param = ['status' => 0];
            return response()->json($param);
        }
    }

    /******************Product Listing**********************/
    public function products_listing()
    {
        $products = Products::with(['get_categories', 'get_sub_categories'])->orderByDesc('is_featured')->get();
        return view('admin.products-management.list')->with('title', 'Products Management')->with(compact('products'));
    }
    public function view_products($id)
    {
        $product = Products::with(['get_categories', 'get_sub_categories'])->where('slug', $id)->first();
        $data = compact('product');
        return view('admin.products-management.view')->with('title', 'View Product')
            ->with($data);
    }

    public function add_products()
    {
        $categories = Category::where('is_active', 1)->get();
        $subcategories = Sub_category::where('is_active', 1)->get();
        return view('admin.products-management.add')->with('title', 'Add Product')->with(compact('categories', 'subcategories'));
    }

    public function create_products(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'short_desc' => 'required',
            'img_path' => 'required|mimes:jpeg,jpg,png,gif,webp',
        ]);

        $slug = $this->slug_maker($request->input('title'), Products::class);
        $product = Products::create([
            'title' =>  $request['title'],
            'price' =>  $request['price'],
            'slug' => $slug,
            'category_id' =>  $request['category_id'],
            'type' =>  $request['type'],

            'manufacturer' =>  $request['manufacturer'],
            'calibergauge' =>  $request['calibergauge'],
            'model' =>  $request['model'],
            'manufacturer_model' =>  $request['manufacturer_model'],
            'upc' =>  $request['upc'],

            // 'detail' => serialize($request['detail']),

            'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
            'in_deal' => $request['in_deal'] == 'on' ? '1' : '0',
            'short_desc' =>  $request['short_desc'],
        ]);

        if (request()->hasFile('img_path')) {
            $main_image = request()->file('img_path')->store('Uploads/products/Images/' . $product->id . rand() . rand(10, 100), 'public');
            $image = Products::where('id', $product->id)->update(
                [
                    'img_path' => asset($main_image),
                ]
            );
        }

        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Added Successfuly!!');
    }

    public function edit_products($id)
    {
        $product = Products::with(['get_categories', 'get_sub_categories'])->where('slug', $id)->first();
        $categories = Category::where('is_active', 1)->get();
        $subcategories = Sub_category::where('is_active', 1)->get();
        $data = compact('categories', 'product', 'subcategories');
        return view('admin.products-management.edit')->with('title', 'Edit Product')->with($data);
    }

    public function saveproducts(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'type' => 'required',
        ]);
        $slug = $this->slug_maker($request->input('title'), Products::class);

        $product = Products::where('id', $request->id)->update([
            'title' =>  $request['title'],
            'price' =>  $request['price'],
            'slug' => $slug,
            'category_id' =>  $request['category_id'],
            'type' =>  $request['type'],

            'manufacturer' =>  $request['manufacturer'],
            'calibergauge' =>  $request['calibergauge'],
            'model' =>  $request['model'],
            'manufacturer_model' =>  $request['manufacturer_model'],
            'upc' =>  $request['upc'],

            'detail' => serialize($request['detail']),

            'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
            'in_deal' => $request['in_deal'] == 'on' ? '1' : '0',
            'short_desc' =>  $request['short_desc'],
        ]);

        if (request()->hasFile('img_path')) {
            $main_image = request()->file('img_path')->store('Uploads/products/Images/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Products::where('id', $request->id)->update(
                [
                    'img_path' => asset($main_image),
                ]
            );
        }
        
        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Added Successfuly!!');
    }

    public function suspend_products($id)
    {
        $products = Products::where('slug', $id)->first();
        if ($products->is_active == 0) {
            $products->is_active = 1;
            $products->save();
            return redirect()->route('admin.products_listing')->with('notify_success', 'Product Activated Successfuly!!');
        } else {
            $products->is_active = 0;
            $products->save();
            return redirect()->route('admin.products_listing')->with('notify_success', 'Product Suspended Successfuly!!');
        }
    }

    public function delete_products($id)
    {
        $products = Products::where('slug', $id)->delete();
        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Deleted Successfuly!!');
    }
    /******************Product Listing**********************/

}
