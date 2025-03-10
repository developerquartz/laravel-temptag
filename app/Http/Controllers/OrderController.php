<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\UsersImport;
use App\Exports\OrdersExport;


// use App\Models\User;
// use App\Models\Role_User;
// use App\Models\UserAdditionAddress;

// use Illuminate\Support\Facades\Validator;

use Auth; 
use JWTAuth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            // $orders = Order::orderBy('id','desc')->get();
            // return array_reverse($subscriptionforms);

            $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.name', 'users.email')
            ->orderBy('orders.id', 'desc')
            ->get()->toArray();

            $data['orders']=$orders;
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
            $order = new Order();
            // $order->user_id = ($request->user_id)?$request->user_id: '0' ;
            $order->user_id = $request->user_id;
            $order->order_total = $request->cart_total;
            $order->transaction_id = $request->transaction_id;
            $order->order_status = "Processing";
            $order->transaction_status = "Complete";
            
            
            $order->save();

            if($order){
                $cartItems=json_decode($request->cart_products);
                $cart_products=array();$i=0;
                foreach($cartItems as $item)
                {
                    $cart_products['user_id']=$request->user_id;
                    $cart_products['order_id']=$order->id;
                    $cart_products['product_id']=$item->id;
                    $cart_products['product_price']=$item->price;
                    $cart_products['product_quantity']=$item->quantity;
                    $cart_products['product_price_total']=$item->getPriceSum;
                    $cart_products['created_at'] = now(); //now is a helper function in laravel  
                    $cart_products['updated_at'] = now();

                    // $orderitem = new OrderItem();
                    OrderItem::insert($cart_products); // Eloquent approach
                    // DB::table('order_items')->insert($cart_products); // Query Builder approach
                }
                

                $success = true;
                $message = 'Order added successfully';
            }
            else{
                $success = false;
                $message = 'Something went wrong please try again';    
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
        // return response()->json($request->cart_products);
    }

    /*public function edit($id)
    {
        try {
            $category=Order::where('id',$id)->first();
            $data['category']=$category;
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
        try {
            $category_check=Category::where('category_name',$request->category_name)->where('id', '!=' ,$id)->first();
            if($category_check===null){
                $category = Order::where('id',$id) -> first();
                $category->category_name = $request->category_name;
                $category->category_slug = str_replace(' ', '-', strtolower($category->category_name));
                $category->is_active = $request->is_active;    
                $category->update();

                $success = true;
                $message = 'Category updated successfully';
            }
            else{
                $success = false;
                $message = 'Category name is already exist';
            }
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
    }*/

    public function delete($id)
    {
        /*try{
            $subscriptionform = Order::find($id);
            $subscriptionform->delete();

            $success = true;
            $message = 'The subscription form successfully deleted';
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
        return response()->json($response);*/
    }


    public function orderdetail($id)
    {
        try {
            // $orderitems=OrderItem::where('order_id',$id)->get();
            $orderitems = DB::table('order_items')
            ->join('users', 'users.id', '=', 'order_items.user_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'users.name', 'users.email', 'orders.*')
            ->where('order_items.order_id',$id)
            ->orderBy('orders.id', 'desc')
            ->get()->toArray();
            $data['orderitems']=$orderitems;
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

    public function OrderfileExport() 
    {
        // return Excel::download(new UsersExport, 'users-collection.xlsx');
        return Excel::download(new OrdersExport, 'orders-collection.csv');
        // Excel::download(new OrdersExport, 'orders-collection.csv');
    }


    public function OrderTotalPaymentReceived(Request $request)
    {
        try{
            $data=array();
            // 1
            $orders = DB::table('orders')
                    ->where('orders.transaction_status', '=', 'Complete')
                    ->sum('orders.order_total');

            $data['orders']=$orders;

            // 2
            $new_orders = DB::table('orders')
                    ->where('orders.order_status', '=', 'Processing')
                    ->get();

            $data['new_orders']=count($new_orders);

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

    
    public function myorders(Request $request)
    {
        try{
            $user = auth()->user();
            $userdata = array_merge($user->toArray(), ['roles' => $user->roles()->get()->toArray()]);
            // return response()->json($userdata['id'], 200);
            $data=array();
            // $orders = Order::orderBy('id','desc')->get();
            // return array_reverse($subscriptionforms);

            $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('orders.*', 'users.name', 'users.email','products.product_name','products.product_price','products.product_quantity')
            ->where('orders.user_id','=',$userdata['id'])
            ->orderBy('orders.id', 'desc')
            ->get()->toArray();

            $data['orders']=$orders;
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
}
