<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\PromoCode;
use App\Models\Promocode;

class PromoCodeController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            // $promocodes = \Promocodes::all();
            // $data['promocodes']=$promocodes;
            $promocodes = Promocode::all();
            $data['promocodes']=$promocodes;
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
            $data=json_decode($request->additional_information);
            // $promocodes=\Promocodes::output($amount = 5);
            $promocodes=\Promocodes::create($amount = $request->amount, $reward = $request->reward, $data, $expires_in = $request->expires_in, $quantity = $request->quantity, $is_disposable = false);
            $success = true;
            $message = 'success';

        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $promocodes='dsadasd';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'promocodes' => $promocodes,
        ];
        return response()->json($response);
        // return response()->json($request);
    }

    public function edit($id)
    {
        $data=array();
        try {
            $promocode=Promocode::where('id',$id)->first();
            $data['promocode']=$promocode;
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

    public function delete($id,$code)
    {
        try{
            $promocode = Promocode::find($id);
            $promocode->delete();

            // $promocode = \Promocodes::disable($code);

            $success = true;
            $message = 'The promocode successfully deleted';
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

    public function apply(Request $request)
    {
        $data=array();
        try {
            $a=0;
            $promocode=Promocode::where('code',$request->coupon_code)->first();
            $data['promocode']=$promocode;
            if($promocode){
                $promocode_type=json_decode($promocode->data);$value='';
                if($promocode_type->promocode_type=='persentage'){
                    $value = '-'.$promocode->reward.'%';
                }
                else{
                    $value = '-'.$promocode->reward;
                }

                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => 'Coupon Applied',
                    'type' => 'discount',
                    'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                    'value' => $value,
                    'attributes' => array( // attributes field is optional
                        'description' => 'Value added tax',
                        'more_data' => 'more data here'
                    )
                ));
                \Cart::session($request->user_id)->condition($condition);
                // \Cart::condition($condition);

                $promocode_type=json_decode($promocode->data);
                $data['promocode_type']=$promocode_type->promocode_type;
                $data['reward']=$promocode->reward;
                $data['coupon_code']=$request->coupon_code;
                $data['condition']=$condition;
                

                $success = true;
                $message = 'Coupon code applied successfully.';
            }
            else{
                $success = false;
                $message = 'Coupon code does matched.';
            }
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


    public function get_applied_coupon(Request $request)
    {

    }
}
