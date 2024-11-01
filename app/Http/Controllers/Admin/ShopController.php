<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Imagetable;
use App\Models\Category;
use App\Models\Products;
use App\Models\Sub_category;
use App\Models\Product_images;


class ShopController extends Controller
{
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
        return view('admin.products-management.add')->with('title', 'Add Product')->with(compact('categories'));
    }

    public function create_products(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'short_desc' => 'required',
            'img_path' => 'required|mimes:jpeg,jpg,png,gif,webp',
        ]);

        $product = Products::create([
            'title' =>  $request['title'],
            'price' =>  $request['price'],
            'old_price' =>  $request['old_price'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
            'category_id' =>  $request['category'],
            'sub_category_id' =>  $request['sub_category'],
            'short_desc' =>  $request['short_desc'],

            'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
            'in_deal' => $request['in_deal'] == 'on' ? '1' : '0',
        ]);

        if (request()->hasFile('img_path')) {
            $main_image = request()->file('img_path')->store('Uploads/products/Images/' . $product->id . rand() . rand(10, 100), 'public');
            $image = Products::where('id', $product->id)->update(
                [
                    'img_path' => $main_image,
                ]
            );
        }

        if (request()->hasFile('product_images')) {
            $paths = $request->file('product_images');
            foreach ($paths as $index  => $path) {
                $file_name =  $request->file('product_images')[$index];
                $image =   $request->file('product_images')[$index]->store('Uploads/Product/other-images/' . rand() . rand(10, 1000), 'public');
                $image_path = Product_images::create(
                    [
                        'product_id' => $product->id,
                        'img_path' => asset($image),

                    ]
                );
            }
        }

        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Added Successfuly!!');
    }

    public function edit_products($id)
    {
        $product = Products::with(['get_categories', 'get_sub_categories'])->where('slug', $id)->first();
        $categories = Category::where('is_active', 1)->get();
        $subcategories = Sub_category::where('is_active', 1)->get();
        $other_images = Product_images::where('product_id', $product->id)->get();
        $data = compact('categories', 'product', 'subcategories', 'other_images');
        return view('admin.products-management.edit')->with('title', 'Edit Product')->with($data);
    }

    public function saveproducts(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'short_desc' => 'required',
        ]);

        $product = Products::where('id', $request->id)->update([
            'title' =>  $request['title'],
            'price' =>  $request['price'],
            'old_price' =>  $request['old_price'],
            'slug' => str_replace(' ', '-', strtolower($request['title'])),
            'category_id' =>  $request['category'],
            'sub_category_id' =>  $request['sub_category'],
            'short_desc' =>  $request['short_desc'],

            'is_featured' => $request['is_featured'] == 'on' ? '1' : '0',
            'in_deal' => $request['in_deal'] == 'on' ? '1' : '0',
        ]);

        if (request()->hasFile('img_path')) {
            $main_image = request()->file('img_path')->store('Uploads/products/Images/' . $request->id . rand() . rand(10, 100), 'public');
            $image = Products::where('id', $request->id)->update(
                [
                    'img_path' => asset($main_image),
                ]
            );
        }

        if (request()->hasFile('product_images')) {
            $paths = $request->file('product_images');
            foreach ($paths as $index  => $path) {
                $file_name =  $request->file('product_images')[$index];
                $image =   $request->file('product_images')[$index]->store('Uploads/Product/other-images/' . rand() . rand(10, 1000), 'public');
                $image_path = Product_images::create(
                    [
                        'product_id' => $request->id,
                        'img_path' => asset($image),

                    ]
                );
            }
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

    public function delete_other_img($id)
    {
        $delete_img = Product_images::where('slug', $id)->delete();
        return back()->with('notify_success', 'Image Deleted!');
    }

    public function delete_products($id)
    {
        $products = Products::where('slug', $id)->delete();
        return redirect()->route('admin.products_listing')->with('notify_success', 'Product Deleted Successfuly!!');
    }
    /******************Product Listing**********************/

}
