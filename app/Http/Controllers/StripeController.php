<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
    	// print_r($request->stripeToken);
    	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

		// $customer = \Stripe\Customer::create(array(
		//     'name' => 'test',
		//     'description' => 'test description',
		//     'email' => 'test2@test.com',
		//     'source' => $request->stripeToken,
		//     "address" => ["city" => 'muktsar', "country" => 'India', "line1" => 'abc', "line2" => "", "postal_code" => 152026, "state" => 'Punjab']
		// ));
    	
		// \Stripe\Customer::createSource(
		//     $customer->id,
		//     ['source' => $request->stripeToken]
		// );
        
        $res=Stripe\Charge::create ([
        	// 'customer' => $customer->id,
            // "amount" => 100 * 100,
            "amount" => $request->cart_total * 100,
            "currency" => "usd",
            // "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => 'New Order on the TempTagNJ',
        ]);
   
        // Session::flash('success', 'Payment successful!');
           
        // return back();
        // response
        if($res->status=='succeeded'){
        	$response = [
	            'success' => true,
	            'message' => 'Payment successful!',
	            'data' => $res,
	        ];	
        }
        else{
        	$response = [
	            'success' => false,
	            'message' => 'Payment Failed!',
	            'data' => $res,
	        ];
        }
        
        return response()->json($response);
        // return response()->json($request);
    }
}
