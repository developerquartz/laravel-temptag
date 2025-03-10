<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserAdditionAddress;

class UserAdditionAddressController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $subscriptionforms = UserAdditionAddress::orderBy('id','desc')->get();
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
            $useradditionaddress = new UserAdditionAddress();
            
            $useradditionaddress->user_id = $request->diff_ship_user_id ;
            $useradditionaddress->first_name = $request->diff_ship_first_name;
            $useradditionaddress->last_name = $request->diff_ship_last_name;
            $useradditionaddress->phone_number = $request->diff_ship_phone_number;
            $useradditionaddress->dealership_name = $request->diff_ship_dealership_name;
            $useradditionaddress->street_address_1 = $request->diff_ship_street_address_1;
            $useradditionaddress->street_address_2 = $request->diff_ship_street_address_2;
            $useradditionaddress->zip = $request->diff_ship_zip;
            $useradditionaddress->city = $request->diff_ship_city;
            $useradditionaddress->state = $request->diff_ship_state;
            $useradditionaddress->country = $request->diff_ship_country;
            $useradditionaddress->save();

            if($useradditionaddress){
                $success = true;
                $message = 'User addition address added successfully';
                $useradditionaddress = $useradditionaddress;
            }
            else{
                $success = false;
                $message = 'Something went wrong please try again'; 
                $useradditionaddress = "Error";   
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $useradditionaddress = "Error";
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'useradditionaddress' => $useradditionaddress,
        ];
        return response()->json($response);
    }

    /*public function edit($id)
    {
        try {
            $category=UserAdditionAddress::where('id',$id)->first();
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
            $category_check=UserAdditionAddress::where('category_name',$request->category_name)->where('id', '!=' ,$id)->first();
            if($category_check===null){
                $category = UserAdditionAddress::where('id',$id) -> first();
                $category->category_name = $request->category_name;
                $category->category_slug = str_replace(' ', '-', strtolower($category->category_name));
                $category->is_active = $request->is_active;    
                $category->update();

                $success = true;
                $message = 'UserAdditionAddress updated successfully';
            }
            else{
                $success = false;
                $message = 'UserAdditionAddress name is already exist';
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
            $subscriptionform = UserAdditionAddress::find($id);
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
