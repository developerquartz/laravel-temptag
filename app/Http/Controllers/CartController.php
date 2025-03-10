<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList(Request $request)
    {
        $user_id = $request->user_id;
        if($user_id>0){
            $cartItems = \Cart::session($user_id)->getContent();
            $cartConditions = \Cart::session($user_id)->getConditions();


            // count carts contents
            $cartItems_count=$cartItems->count();

            $cart_products=array();$i=0;
            foreach($cartItems as $item)
            {
                $cart_products[$i]['id']=$item->id; // the Id of the item
                $cart_products[$i]['name']=$item->name; // the name
                $cart_products[$i]['price']=$item->price; // the single price without conditions applied
                $cart_products[$i]['getPriceSum']=$item->getPriceSum(); // the subtotal without conditions applied
                $cart_products[$i]['getPriceWithConditions']=$item->getPriceWithConditions(); // the single price with conditions applied
                $cart_products[$i]['getPriceSumWithConditions']=$item->getPriceSumWithConditions(); // the subtotal with conditions applied
                $cart_products[$i]['quantity']=$item->quantity; // the quantity
                $cart_products[$i]['attributes']=$item->attributes; // the attributes

                // Note that attribute returns ItemAttributeCollection object that extends the native laravel collection
                // so you can do things like below:

                if( $item->attributes->has('size') )
                {
                    // item has attribute size
                }
                else
                {
                    // item has no attribute size
                }
                $i++;
            }


            $data['cartItems']=$cartItems;
            $data['cart_products']=$cart_products;
            $data['cartItems_count']=$cartItems_count;
            $data['cartConditions']=$cartConditions;
            // $data['cartItems']=compact('cartItems');
            // dd($cartItems);
            // return view('cart', compact('cartItems'));
            $response = [
                'success' => true,
                'message' => 'Get all cart list',
                'data' => $data,
            ];    
        }
        else{
            $response = [
                'success' => false,
                'message' => 'Please Login before check you Cart Items.',
            ];    
        }
        
        return response()->json($response);
    }


    public function addToCart(Request $request)
    {
        $user_id = $request->user_id;
        if($user_id>0){
            \Cart::session($user_id)->add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                /*'attributes' => array(
                    'image' => $request->image,
                )*/
            ]);
            
            // session()->flash('success', 'Product is Added to Cart Successfully !');
            // return redirect()->route('cart.list');

            $response = [
                'success' => true,
                'message' => 'Product is Added to Cart Successfully !',
                // 'data' => $data,
            ];
        }
        else{
            $response = [
                'success' => false,
                'message' => 'Please Login before adding product to cart.',
            ];    
        }
        return response()->json($response);
    }

    public function updateCart(Request $request)
    {
        $user_id = $request->user_id;
        if($user_id>0){
            \Cart::session($user_id)->update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );

            // session()->flash('success', 'Item Cart is Updated Successfully !');
            // return redirect()->route('cart.list');

            $response = [
                'success' => true,
                'message' => 'Item Cart is Updated Successfully !',
                // 'data' => $data,
            ];
        }
        else{
            $response = [
                'success' => false,
                'message' => 'User id missing.',
            ];    
        }
        return response()->json($response);
    }

    public function removeCart(Request $request)
    {
        $user_id = $request->user_id;
        if($user_id>0){
            \Cart::session($user_id)->remove($request->id);
            \Cart::session($user_id)->clearCartConditions();
            // session()->flash('success', 'Item Cart Remove Successfully !');
            // return redirect()->route('cart.list');

            $response = [
                'success' => true,
                'message' => 'Item Cart Remove Successfully !',
                // 'data' => $data,
            ];
        }
        else{
            $response = [
                'success' => false,
                'message' => 'User id missing.',
            ];    
        }
        return response()->json($response);
    }

    public function clearAllCart(Request $request)
    {
        $user_id = $request->user_id;
        if($user_id>0){
            \Cart::session($user_id)->clear();
            \Cart::session($user_id)->clearCartConditions();
            // session()->flash('success', 'All Item Cart Clear Successfully !');
            // return redirect()->route('cart.list');

            $response = [
                'success' => true,
                'message' => 'All Item Cart Clear Successfully !',
                // 'data' => $data,
            ];
        }
        else{
            $response = [
                'success' => false,
                'message' => 'User id missing.',
            ];    
        }
        return response()->json($response);
    }

    public function getSubTotal(Request $request){
        $user_id = $request->user_id;
        if($user_id>0){
            $getSubTotal = \Cart::session($user_id)->getSubTotal();

            $response = [
                'success' => true,
                'message' => 'getSubTotal !',
                'data' => $getSubTotal,
            ];
        }
        else{
            $response = [
                'success' => false,
                'message' => 'User id missing.',
            ];    
        }
        return response()->json($response);
    }

    public function getTotal(Request $request){
        $user_id = $request->user_id;
        if($user_id>0){
            $getTotal = \Cart::session($user_id)->getTotal();

            $response = [
                'success' => true,
                'message' => 'getTotal !',
                'data' => $getTotal,
            ];
        }
        else{
            $response = [
                'success' => false,
                'message' => 'User id missing.',
            ];    
        }
        return response()->json($response);
    }

}
