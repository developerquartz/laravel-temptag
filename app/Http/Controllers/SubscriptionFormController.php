<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubscriptionForm;

class SubscriptionFormController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $subscriptionforms = SubscriptionForm::orderBy('id','desc')->get();
            // return array_reverse($subscriptionforms);
            $data['subscriptionforms']=$subscriptionforms;
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
            $subscriptionform = new SubscriptionForm();
            $subscriptionform->email = $request->email;
            $subscriptionform->user_id = ($request->user_id)?$request->user_id: '0' ;
            
            $subscriptionform->save();

            if($subscriptionform){
                $success = true;
                $message = 'Subscription form added successfully';

                $details=array();
                $details = [
                    'title' => 'Successfully Subscribed',
                    'heading' => 'Successfully Subscribed',
                    'message' => '<p>Thank you for subscribing to our newsletter. The newsletter will be sent by Temptag to your email address.</p>
                        <p>To ensure that the newsletter also reaches you and does not end up in the spam filter, please enter the sender address&nbsp;<a href="mailto:info@temptag.abc.com">info@temptag.abc.com</a>&nbsp;in your email program’s address book.</p>',
                    'email' => $request->email,
                ];
               
                \Mail::to($request->email)->send(new \App\Mail\MySubscribeMail($details));

                // $details=array();
                $admin_details = [
                    'title' => 'Successfully Subscribed To Admin',
                    'heading' => 'Successfully Subscribed To Admin',
                    'message' => '<p>New Subscriber came on your website.</p>',
                    'email' => $request->email,
                ];
                \Mail::to('sham.suffescom@gmail.com')->send(new \App\Mail\MySubscribeMailToAdmin($admin_details));
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
    }

    /*public function edit($id)
    {
        try {
            $category=Category::where('id',$id)->first();
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
                $category = Category::where('id',$id) -> first();
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
        try{
            $subscriptionform = SubscriptionForm::find($id);
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
        return response()->json($response);
    }
}
