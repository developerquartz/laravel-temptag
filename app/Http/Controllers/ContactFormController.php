<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $contactforms = ContactForm::orderBy('id','desc')->get();
            // return array_reverse($contactforms);
            $data['contactforms']=$contactforms;
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
            $contactform = new ContactForm();
            $contactform->first_name = $request->first_name;
            $contactform->last_name = $request->last_name;
            $contactform->email = $request->email;
            $contactform->phone = $request->phone;
            $contactform->message = $request->message;
            $contactform->user_id = ($request->user_id)?$request->user_id: '0' ;
            
            $contactform->save();

            if($contactform){
                $success = true;
                $message = 'Contact Form added successfully';

                $details=array();
                $details = [
                    'title' => 'Conatct Us Customer Detail',
                    'heading' => 'Conatct Us Customer Detail',
                    'message_detail' => '<p>New Contact Information came on your website.</p>',
                    'name' => $request->first_name." ".$request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                ];
               
                // \Mail::to($request->email)->send(new \App\Mail\MyContactMail($details));
                \Mail::to('sham.suffescom@gmail.com')->send(new \App\Mail\MyContactMail($details));
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
            $contactform = ContactForm::find($id);
            $contactform->delete();

            $success = true;
            $message = 'The Contact form successfully deleted';
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
