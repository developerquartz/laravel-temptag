<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash; 
use App\Models\User;
use App\Models\Role_User;
use App\Models\UserAdditionAddress;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Auth; 
use JWTAuth;

class UserController extends Controller
{
    public function index(User $user)
    {
        // $users = User::all()->toArray();
        // return array_reverse($users);

        $users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('role_user.role_id','=',1)
            ->select('users.*', 'role_user.user_id', 'role_user.role_id')
            ->orderBy('users.id', 'desc')
            ->get()->toArray();
        return $users;
    }

    //
    public function register(Request $request)
    { 
        /*$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 

        $user->roles()->attach(1); 
        
        return response()->json(['message' => 'Registration Successfull.'], 201);*/
        $validator_message="";

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                // 'password' => 'required',
                // 'password' => 'required|confirmed|min:6',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                // echo "No";
                $success = false;
                $message = "validator errors";
                $validator_message = $validator->messages()->get('*');
                // return Redirect::back()->withErrors($validator);
                // print_r($validator);
                return response()->json(['success' => $success,'message' => $message,'validator_message' => $validator->errors()], 401);
            }
            else{

                // $user_check=User::where('email',$request->email)->first();
                $user_check=User::where('email',$request->email)->orWhere('njvmc_id',$request->njvmc_id)->first();
                if($user_check===null){
                    // echo "User Not Exist";
                    $user = new User();
                    
                    if($request->file()) {
                        if($request->file('user_image')){
                            $validator = Validator::make($request->all(), [
                                'user_image' => 'required|mimes:jpg,jpeg,png|max:2048'
                            ]);

                            if ($validator->fails()) {
                                $response = [
                                    'success' => false,
                                    'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                                ];
                                return response()->json($response);
                            } else {
                                $file_name = time().'_'.$request->user_image->getClientOriginalName();
                                $file_path = $request->file('user_image')->storeAs('uploads/users', $file_name, 'public');

                                $user->user_image = $file_name;
                            }
                        }
                        else{
                            $user->user_image ='';
                        }
                    }

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->plain_password = $request->password;

                    $user->last_name = $request->last_name;
                    $user->phone_number = $request->phone_number;
                    $user->dealership_name = $request->dealership_name;
                    $user->njvmc_id = $request->njvmc_id;
                    $user->njvmc_expiration_date = $request->njvmc_expiration_date;
                    $user->street_address_1 = $request->street_address_1;
                    $user->street_address_2 = $request->street_address_2;
                    $user->zip = $request->zip;
                    $user->city = $request->city;
                    $user->state = $request->state;
                    $user->country = $request->country;
                    
                    $user->is_active = ($request->is_active)?$request->is_active:'N';
                    $user->save();
                    // print_r($user->id);
                    $last_inserted_user_id=$user->id;

                    // Add role in role_user table
                    $user->roles()->attach(1);

                    $useradditionaddress = new UserAdditionAddress();
                    $useradditionaddress->user_id = $last_inserted_user_id;
                    $useradditionaddress->first_name = $request->ship_first_name;
                    $useradditionaddress->last_name = $request->ship_last_name;
                    $useradditionaddress->phone_number = $request->ship_phone_number;
                    $useradditionaddress->dealership_name = $request->ship_dealership_name;
                    $useradditionaddress->street_address_1 = $request->ship_street_address_1;
                    $useradditionaddress->street_address_2 = $request->ship_street_address_2;
                    $useradditionaddress->zip = $request->ship_zip;
                    $useradditionaddress->city = $request->ship_city;
                    $useradditionaddress->state = $request->ship_state;
                    $useradditionaddress->country = $request->ship_country;
                    $useradditionaddress->phone_number = $request->ship_phone_number;
                    $useradditionaddress->email = $request->ship_email;
                    $useradditionaddress->residential_address = $request->ship_residential_address;
                    $useradditionaddress->save();

                    $success = true;
                    $message = 'User register successfully';

                    $ADMIN_EMAIL=$_ENV['ADMIN_EMAIL'];
                    $details=array();
                    $details = [
                        'title' => 'New User register on your website temptag as a customer',
                        'heading' => 'New User register on your website temptag as a customer',
                        'username' => $request->email,
                        'password' => $request->password,
                        'message' => '<p>Note: Please check the detail and active the account.</p>',
                    ];
                   
                    \Mail::to($ADMIN_EMAIL)->send(new \App\Mail\MyMails($details));
                   
                    // dd("Email is Sent.");
                }
                else{
                    // echo "User Exist";
                    $success = false;
                    $message = 'User with same email Or NJMVC id is already exist';
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
            'validator_message' => $validator_message,
        ];
        return response()->json($response);
        // return response()->json($request);
    }

    public function login(Request $request)
    {  
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'is_active' => 'Y'
        ]);

        if (Auth::attempt($credentials)) { 
            $status = 200; 
            $user = Auth::user();
            if($user->is_active=='Y'){
                $response = [ 
                        'user' => array_merge($user->toArray(), 
                                    ['roles' => $user->roles()->get()->toArray()]), 
                        'token' => JWTAuth::fromUser($user), 
                ];
            }
            else{
                $status = 422;
                $response = ['error' => 'User account is in-active.'];
            }
        }  else { 
            $status = 422;
            $response = ['error' => 'The email or password is incorrect.'];
        }

        return response()->json($response, $status);
    }

    public function getUser()
    {
        $user = auth()->user();
        $data = array_merge($user->toArray(), ['roles' => $user->roles()->get()->toArray()]);
        return response()->json($data, 200);
    }

    /*public function check()
    {
        return ! is_null($this->user());
    }*/

    /**
     * Register
     */
    public function add(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                // echo "No";
                $success = false;
                $message = $validator;
                // print_r($validator);
            }
            else{

                $user_check=User::where('email',$request->email)->first();
                if($user_check===null){
                    // echo "User Not Exist";
                    $user = new User();

                    if($request->file()) {
                        if($request->file('user_image')){
                            $validator = Validator::make($request->all(), [
                                'user_image' => 'required|mimes:jpg,jpeg,png|max:2048'
                            ]);

                            if ($validator->fails()) {
                                $response = [
                                    'success' => false,
                                    'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                                ];
                                return response()->json($response);
                            } else {
                                $file_name = time().'_'.$request->user_image->getClientOriginalName();
                                $file_path = $request->file('user_image')->storeAs('uploads/users', $file_name, 'public');

                                $user->user_image = $file_name;
                            }
                        }
                        else{
                            $user->user_image ='';
                        }
                    }

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->plain_password = $request->password;

                    $user->last_name = $request->last_name;
                    $user->phone_number = $request->phone_number;
                    $user->dealership_name = $request->dealership_name;
                    $user->njvmc_id = $request->njvmc_id;
                    $user->fax = $request->fax;
                    $user->njvmc_expiration_date = $request->njvmc_expiration_date;
                    $user->street_address_1 = $request->street_address_1;
                    $user->street_address_2 = $request->street_address_2;
                    $user->zip = $request->zip;
                    $user->city = $request->city;
                    $user->state = $request->state;
                    $user->country = $request->country;
                    
                    $user->is_active = ($request->is_active)?$request->is_active:'N';
                    $user->save();
                    // print_r($user->id);

                    // Add role in role_user table
                    $user->roles()->attach(1);

                    $success = true;
                    $message = 'User register successfully';

                    $details=array();
                    $details = [
                        'title' => 'The Admin added you as a customer on temptag',
                        'heading' => 'The Admin added you as a customer on temptag',
                        'username' => $request->email,
                        'password' => $request->password,
                        'message' => '<p>The Admin added you as a customer on attempt.Please login and start your purchasing.</p>',
                    ];
                   
                    \Mail::to($request->email)->send(new \App\Mail\MyMails($details));
                   
                    // dd("Email is Sent.");
                }
                else{
                    // echo "User Exist";
                    $success = false;
                    $message = 'User with same email id is already exist';
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

    // edit blog
    public function edit($id)
    {
        $user=User::where('id',$id)->first()->toArray();
        // $permission = Permission::where('user_id',$id)->first()->toArray();
        // print_r($permission);
        $data['user']=$user;
        // return response()->json($data);
        return $data;
    }

    // update User
    public function update($id,Request $request)
    {
        
        try {

            $user_check=User::where('email',$request->email)->where('id', '!=' ,$id)->first();
            if($user_check===null){
                $user = User::where('id',$id) -> first();
                if($request->file()) {
                    if($request->file('user_image')){
                        $validator = Validator::make($request->all(), [
                            'user_image' => 'required|mimes:jpg,jpeg,png|max:2048'
                        ]);

                        if ($validator->fails()) {
                            $response = [
                                'success' => false,
                                'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                            ];
                            return response()->json($response);
                        } else {
                            $file_name = time().'_'.$request->user_image->getClientOriginalName();
                            $file_path = $request->file('user_image')->storeAs('uploads/users', $file_name, 'public');

                            $user->user_image = $file_name;
                        }
                    }
                    else{
                        $user->user_image =$request->user_image_old;
                    }


                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->plain_password = $request->password;

                    $user->last_name = $request->last_name;
                    $user->phone_number = $request->phone_number;
                    $user->dealership_name = ($request->dealership_name)?$request->dealership_name:'';
                    $user->njvmc_id = ($request->njvmc_id)?$request->njvmc_id:'';
                    $user->fax = ($request->fax)?$request->fax:'';
                    $user->njvmc_expiration_date = ($request->njvmc_expiration_date)?$request->njvmc_expiration_date:'';
                    $user->street_address_1 = ($request->street_address_1)?$request->street_address_1:'';
                    $user->street_address_2 = ($request->street_address_2)?$request->street_address_2:'';
                    $user->zip = ($request->zip)?$request->zip:'';
                    $user->city = ($request->city)?$request->city:'';
                    $user->state = ($request->state)?$request->state:'';
                    $user->country = ($request->country)?$request->country:'';
                    
                    $user->is_active = ($request->is_active)?$request->is_active:'N';
                    $user->update();

                    if($user){
                        $success = true;
                        $message = 'User updated successfully';

                        if($user->is_active=='Y'){
                            $details=array();
                            $details = [
                                'title' => 'The Admin active your account on temptag',
                                'heading' => 'The Admin active your account on temptag',
                                'username' => $request->email,
                                'password' => $request->password,
                                'message' => '<p>Please <a href="'.url("/login").'" target="_blank">login</a> and start your purchasing.</p>',
                            ];
                           
                            \Mail::to($request->email)->send(new \App\Mail\MyMails($details));
                        }
                    }
                    else{
                        $success = false;
                        $message = 'Something went wrong please try again';    
                    }
                }
                else{
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->plain_password = $request->password;

                    $user->last_name = $request->last_name;
                    $user->phone_number = $request->phone_number;
                    $user->dealership_name = ($request->dealership_name)?$request->dealership_name:'';
                    $user->njvmc_id = ($request->njvmc_id)?$request->njvmc_id:'';
                    $user->fax = ($request->fax)?$request->fax:'';
                    $user->njvmc_expiration_date = ($request->njvmc_expiration_date)?$request->njvmc_expiration_date:'';
                    $user->street_address_1 = ($request->street_address_1)?$request->street_address_1:'';
                    $user->street_address_2 = ($request->street_address_2)?$request->street_address_2:'';
                    $user->zip = ($request->zip)?$request->zip:'';
                    $user->city = ($request->city)?$request->city:'';
                    $user->state = ($request->state)?$request->state:'';
                    $user->country = ($request->country)?$request->country:'';
                    
                    $user->is_active = ($request->is_active)?$request->is_active:'N';
                    $user->update();

                    if($user){
                        $success = true;
                        $message = 'User updated successfully';
                        if($user->is_active=='Y'){
                            $details=array();
                            $details = [
                                'title' => 'The Admin active your account on temptag',
                                'heading' => 'The Admin active your account on temptag',
                                'username' => $request->email,
                                'password' => $request->password,
                                'message' => '<p>Please <a href="'.url("/login").'" target="_blank">login</a> and start your purchasing.</p>',
                            ];
                           
                            \Mail::to($request->email)->send(new \App\Mail\MyMails($details));
                        }
                    }
                    else{
                        $success = false;
                        $message = 'Something went wrong please try again';    
                    }
                }
            }
            else{
                $success = false;
                $message = 'User with same email is already exist';
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
        // return response()->json($request);
    }

    // delete blog
    public function delete($id)
    {
        try{
            
            // $user = Link::where('created_by',$id);
            // $user->delete();
            
            // $user = Permission::where('user_id',$id);
            // $user->delete();

            $user = User::find($id);
            $user->delete();

            $success = true;
            $message = 'The user successfully deleted';
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


    // update Admin Profile
    public function updateadminprofile($id,Request $request)
    {
        
        try {

            $user_check=User::where('email',$request->email)->where('id', '!=' ,$id)->first();
            if($user_check===null){

                $user_check_password=User::where('plain_password',$request->old_password)->first();
                if($user_check_password!=null){
                    // 'Old password does matched
                    $user = User::where('id',$id) -> first();
                    if($request->file()) {
                        if($request->file('user_image')){
                            $validator = Validator::make($request->all(), [
                                'user_image' => 'required|mimes:jpg,jpeg,png|max:2048'
                            ]);

                            if ($validator->fails()) {
                                $response = [
                                    'success' => false,
                                    'message' => 'The Image should be (mimes:jpg,jpeg,png|max:2048).',
                                ];
                                return response()->json($response);
                            } else {
                                $file_name = time().'_'.$request->user_image->getClientOriginalName();
                                $file_path = $request->file('user_image')->storeAs('uploads/users', $file_name, 'public');

                                $user->user_image = $file_name;
                            }
                        }
                        else{
                            $user->user_image =$request->user_image_old;
                        }


                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->password = Hash::make($request->password);
                        $user->plain_password = $request->password;

                        $user->last_name = $request->last_name;
                        $user->phone_number = $request->phone_number;
                        $user->dealership_name = ($request->dealership_name)?$request->dealership_name:'';
                        $user->njvmc_id = ($request->njvmc_id)?$request->njvmc_id:'';
                        $user->njvmc_expiration_date = ($request->njvmc_expiration_date)?$request->njvmc_expiration_date:'';
                        $user->street_address_1 = ($request->street_address_1)?$request->street_address_1:'';
                        $user->street_address_2 = ($request->street_address_2)?$request->street_address_2:'';
                        $user->zip = ($request->zip)?$request->zip:'';
                        $user->city = ($request->city)?$request->city:'';
                        $user->state = ($request->state)?$request->state:'';
                        $user->country = ($request->country)?$request->country:'';
                        
                        $user->is_active = ($request->is_active)?$request->is_active:'N';
                        $user->update();

                        if($user){
                            $success = true;
                            $message = 'User updated successfully';
                        }
                        else{
                            $success = false;
                            $message = 'Something went wrong please try again';    
                        }
                    }
                    else{
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->password = Hash::make($request->password);
                        $user->plain_password = $request->password;

                        $user->last_name = $request->last_name;
                        $user->phone_number = $request->phone_number;
                        $user->dealership_name = ($request->dealership_name)?$request->dealership_name:'';
                        $user->njvmc_id = ($request->njvmc_id)?$request->njvmc_id:'';
                        $user->njvmc_expiration_date = ($request->njvmc_expiration_date)?$request->njvmc_expiration_date:'';
                        $user->street_address_1 = ($request->street_address_1)?$request->street_address_1:'';
                        $user->street_address_2 = ($request->street_address_2)?$request->street_address_2:'';
                        $user->zip = ($request->zip)?$request->zip:'';
                        $user->city = ($request->city)?$request->city:'';
                        $user->state = ($request->state)?$request->state:'';
                        $user->country = ($request->country)?$request->country:'';
                        
                        $user->is_active = ($request->is_active)?$request->is_active:'N';
                        $user->update();

                        if($user){
                            $success = true;
                            $message = 'User updated successfully';
                        }
                        else{
                            $success = false;
                            $message = 'Something went wrong please try again';    
                        }
                    }
                }
                else{
                    $success = false;
                    $message = 'Old password does not Matched.';
                }
                
            }
            else{
                $success = false;
                $message = 'User with same email is already exist';
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
        // return response()->json($response);
        return response()->json($response);
    }

    // update User Billing and Defalut Address
    public function updateBillingDefalutAddress($id,Request $request)
    {
        
        try {

            $user = User::where('id',$id) -> first();
            
            $user->billing_address = $request->billing_address;
            $user->delivery_address = $request->delivery_address;
            $user->update();

            if($user){
                $success = true;
                $message = 'User Billing and Defalut Address updated successfully';
                $user = $user;
            }
            else{
                $success = false;
                $message = 'Something went wrong please try again';
                $user = $user;    
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
            'user' => $user,
            // 'request' => $request,
        ];
        return response()->json($response);
        // return response()->json($request);
    }

    public function count_users(User $user)
    {
        // $users = User::all()->toArray();
        // return array_reverse($users);

        $users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('role_user.role_id','=',1)
            ->select('users.*', 'role_user.user_id', 'role_user.role_id')
            ->orderBy('users.id', 'desc')
            ->get()->toArray();
        $userCount = count($users);
        // return $userCount;

        $users_is_active = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('role_user.role_id','=',1)
            ->where('users.is_active','=','N')
            ->select('users.*', 'role_user.user_id', 'role_user.role_id')
            ->orderBy('users.id', 'desc')
            ->get()->toArray();
        $users_is_activeCount = count($users_is_active);

        $data=array();
        $data['userCount']=$userCount;
        $data['users_is_activeCount']=$users_is_activeCount;

        return response()->json($data);
    }
}
