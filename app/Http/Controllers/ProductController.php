<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.category_name', 'categories.category_slug')
            ->orderBy('products.id', 'desc')
            ->get()->toArray();


            // $products = Product::all()->toArray();
            // return array_reverse($products);
            $data['products']=$products;
            
            $success = true;
            $message = "Records founded.";
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response);
    }
    
    public function add(Request $request)
    {
        try{
            $request->validate([
               // 'product_feature_image' => 'required|mimes:jpg,jpeg,png|max:2048'
               'product_feature_image' => 'required|mimes:jpg,jpeg,png'
            ]);

            $product = new Product();

            if($request->file()) {
                $file_name = time().'_'.$request->product_feature_image->getClientOriginalName();
                $file_path = $request->file('product_feature_image')->storeAs('uploads/products', $file_name, 'public');

                $product->product_feature_image = time().'_'.$request->product_feature_image->getClientOriginalName();
                // $product->product_feature_image = '/storage/' . $file_path;

                if($request->file('product_feature_image')){
                    $validator = Validator::make($request->all(), [
                        'product_feature_image' => 'required|mimes:jpg,jpeg,png|max:2048'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->product_feature_image->getClientOriginalName();
                        $file_path = $request->file('product_feature_image')->storeAs('uploads/products', $file_name, 'public');

                        $product->product_feature_image = time().'_'.$request->product_feature_image->getClientOriginalName();
                    }
                }
                else{
                    $product->product_feature_image ='';
                }


                // Addtional images
                $additional_images=array('additional_image1'=>'','additional_image2'=>'');
                if($request->file('additional_image1')){
                    $validator = Validator::make($request->all(), [
                        'additional_image1' => 'required|mimes:jpg,jpeg,png|max:2048'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->additional_image1->getClientOriginalName();
                        $file_path = $request->file('additional_image1')->storeAs('uploads/products', $file_name, 'public');

                        $additional_images['additional_image1'] = time().'_'.$request->additional_image1->getClientOriginalName();
                    }
                }
                else{
                    $additional_images['additional_image1'] ='';
                }

                $product->additional_images=json_encode($additional_images);
                
                $product->category_id = $request->category_id;
                $product->product_name = $request->product_name;
                // $product->product_quantity = $request->product_quantity;
                // $product->product_price = $request->product_price;
                // $product->product_quantity_for_sale = $request->product_quantity_for_sale;
                $product->product_price_json = $request->product_price_json;
                $product->product_available = $request->product_available;
                $product->product_detail = $request->product_detail;
                $product->product_description = $request->product_description;
                $product->product_specification = $request->product_specification;
                $product->product_features = $request->product_features;
                $product->on_home_page = $request->on_home_page;
                $product->is_active = $request->is_active;
                $product->save();

                if($product){
                    $success = true;
                    $message = 'Product added successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);

    }

    public function edit($id)
    {
        try {
            $product=Product::where('id',$id)->first();
            $data['product']=$product;
            $success = true;
            $message = 'Record founded.';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response);
    }

    public function update($id,Request $request)
    {
        try{
            
            $product = Product::where('id',$id) -> first();

            if($request->file()) {
                if($request->file('product_feature_image')){
                    $validator = Validator::make($request->all(), [
                        // 'product_feature_image' => 'required|mimes:jpg,jpeg,png|max:2048'
                        'product_feature_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->product_feature_image->getClientOriginalName();
                        $file_path = $request->file('product_feature_image')->storeAs('uploads/products', $file_name, 'public');

                        $product->product_feature_image = time().'_'.$request->product_feature_image->getClientOriginalName();
                    }
                }
                else{
                    $product->product_feature_image =$request->product_feature_image_old;
                }
                
                // Addtional images
                $additional_images=array('additional_image1'=>'','additional_image2'=>'');
                if($request->file('additional_image1')){
                    $validator = Validator::make($request->all(), [
                        // 'additional_image1' => 'required|mimes:jpg,jpeg,png|max:2048'
                        'additional_image1' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->additional_image1->getClientOriginalName();
                        $file_path = $request->file('additional_image1')->storeAs('uploads/products', $file_name, 'public');

                        $additional_images['additional_image1'] = time().'_'.$request->additional_image1->getClientOriginalName();
                    }
                }
                else{
                    $additional_images['additional_image1'] =$request->additional_image1_old;
                }

                /*if($request->file('additional_image2')){
                    $validator = Validator::make($request->all(), [
                        'additional_image2' => 'required|mimes:jpg,jpeg,png|max:2048'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->additional_image2->getClientOriginalName();
                        $file_path = $request->file('additional_image2')->storeAs('uploads/products', $file_name, 'public');

                        $additional_images['additional_image2'] = time().'_'.$request->additional_image2->getClientOriginalName();
                    }
                }
                else{
                    $additional_images['additional_image2'] =$request->additional_image2_old;
                }*/
                $product->additional_images=json_encode($additional_images);

                
                $product->category_id = $request->category_id;
                $product->product_name = $request->product_name;
                // $product->product_quantity = $request->product_quantity;
                // $product->product_price = $request->product_price;
                // $product->product_quantity_for_sale = $request->product_quantity_for_sale;
                $product->product_price_json = $request->product_price_json;
                $product->product_available = $request->product_available;
                $product->product_detail = $request->product_detail;
                $product->product_description = $request->product_description;
                $product->product_specification = $request->product_specification;
                $product->product_features = $request->product_features;
                $product->on_home_page = $request->on_home_page;
                $product->is_active = $request->is_active;
                $product->update();

                if($product){
                    $success = true;
                    $message = 'Product updated successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
            else{
                $product->category_id = $request->category_id;
                $product->product_name = $request->product_name;
                // $product->product_quantity = $request->product_quantity;
                // $product->product_price = $request->product_price;
                // $product->product_quantity_for_sale = $request->product_quantity_for_sale;
                $product->product_price_json = $request->product_price_json;
                $product->product_available = $request->product_available;
                $product->product_detail = $request->product_detail;
                $product->product_description = $request->product_description;
                $product->product_specification = $request->product_specification;
                $product->product_features = $request->product_features;
                $product->product_feature_image = $request->product_feature_image_old;
                $product->on_home_page = $request->on_home_page;
                $product->is_active = $request->is_active;
                $product->update();

                if($product){
                    $success = true;
                    $message = 'Product updated successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
        // return response()->json($request);
    }

    public function delete($id)
    {
        try{
            $product = Product::find($id);
            $product->delete();

            $success = true;
            $message = 'The product successfully deleted';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            // 'request' => $request,
        ];
        return response()->json($response);
    }

    // Get all products for home page
    public function get_products_on_home_page(Request $request)
    {
        try{
            $data=array();
            $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.category_name', 'categories.category_slug')
            ->orderBy('products.id', 'desc')
            ->where('products.on_home_page', 'Y')
            ->get()->toArray();


            // $products = Product::all()->toArray();
            // return array_reverse($products);
            $data['products']=$products;
            
            $success = true;
            $message = "Records founded.";
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response);
    }

    public function count_products(Request $request)
    {
            $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.category_name', 'categories.category_slug')
            ->orderBy('products.id', 'desc')
            ->get()->toArray();

            $productCount = count($products);
            return $productCount;
    }
}
