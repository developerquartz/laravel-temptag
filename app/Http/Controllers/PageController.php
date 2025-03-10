<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $pages = DB::table('pages')
            ->orderBy('pages.id', 'desc')
            ->get()->toArray();


            // $pages = Page::all()->toArray();
            // return array_reverse($pages);
            $data['pages']=$pages;
            
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
            

            $page = new Page();

            if($request->file()) {
                if($request->file('page_title_background_image')){
                    $request->validate([
                       'page_title_background_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    $file_name = time().'_'.$request->page_title_background_image->getClientOriginalName();
                    $file_path = $request->file('page_title_background_image')->storeAs('uploads/pages', $file_name, 'public');

                    $page->page_title_background_image = time().'_'.$request->page_title_background_image->getClientOriginalName();
                    // $page->page_title_background_image = '/storage/' . $file_path;
                }
                else{
                    $page->page_title_background_image ='';
                }
                
                if($request->file('page_feature_image')){
                    $request->validate([
                       'page_feature_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    $file_name = time().'_'.$request->page_feature_image->getClientOriginalName();
                    $file_path = $request->file('page_feature_image')->storeAs('uploads/pages', $file_name, 'public');

                    $page->page_feature_image = time().'_'.$request->page_feature_image->getClientOriginalName();
                    // $page->page_feature_image = '/storage/' . $file_path;
                }
                else{
                    $page->page_feature_image ='';
                }
                                
                $page->page_name = $request->page_name;
                $page->page_slug = str_replace(' ', '-', strtolower($page->page_name));
                $page->page_title = $request->page_title;
                $page->page_content = $request->page_content;
                $page->is_active = $request->is_active;
                $page->page_meta_keywords = $request->page_meta_keywords;
                $page->page_meta_desc = $request->page_meta_desc;
                $page->save();

                if($page){
                    $success = true;
                    $message = 'Page added successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
            else{
                $page->page_name = $request->page_name;
                $page->page_slug = str_replace(' ', '-', strtolower($page->page_name));
                $page->page_title = $request->page_title;
                $page->page_content = $request->page_content;
                $page->is_active = $request->is_active;
                $page->page_meta_keywords = $request->page_meta_keywords;
                $page->page_meta_desc = $request->page_meta_desc;
                $page->save();

                if($page){
                    $success = true;
                    $message = 'Page added successfully';
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
            $page=Page::where('id',$id)->first();
            $data['page']=$page;
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
            
            $page = Page::where('id',$id)->first();

            if($request->file()) {
                if($request->file('page_title_background_image')){
                    $validator = Validator::make($request->all(), [
                        'page_title_background_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->page_title_background_image->getClientOriginalName();
                        $file_path = $request->file('page_title_background_image')->storeAs('uploads/pages', $file_name, 'public');

                        $page->page_title_background_image = time().'_'.$request->page_title_background_image->getClientOriginalName();
                        // $page->page_title_background_image = '/storage/' . $file_path;
                    }
                }
                else{
                    $page->page_title_background_image =$request->page_title_background_image_old;
                }
                
                if($request->file('page_feature_image')){
                    $validator = Validator::make($request->all(), [
                        'page_feature_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->page_feature_image->getClientOriginalName();
                        $file_path = $request->file('page_feature_image')->storeAs('uploads/pages', $file_name, 'public');

                        $page->page_feature_image = time().'_'.$request->page_feature_image->getClientOriginalName();
                        // $page->page_feature_image = '/storage/' . $file_path;
                    }
                }
                else{
                    $page->page_feature_image =$request->page_feature_image_old;
                }

                // Addtional images
                $additional_images=array('features_section_image'=>'','how_it_work_section_image1'=>'','how_it_work_section_image2'=>'','how_it_work_section_image3'=>'',);
                if($request->file('features_section_image')){
                    // $request->validate([
                    //    'features_section_image' => 'required|mimes:jpg,jpeg,png'
                    // ]);

                    $validator = Validator::make($request->all(), [
                        'features_section_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->features_section_image->getClientOriginalName();
                        $file_path = $request->file('features_section_image')->storeAs('uploads/pages', $file_name, 'public');

                        $additional_images['features_section_image'] = time().'_'.$request->features_section_image->getClientOriginalName();
                    }
                }
                else{
                    $additional_images['features_section_image'] =$request->features_section_image_old;
                }
                
                // 
                if($request->file('how_it_work_section_image1')){
                    $validator = Validator::make($request->all(), [
                        'how_it_work_section_image1' => 'required|mimes:jpg,jpeg,png,svg'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png,svg).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->how_it_work_section_image1->getClientOriginalName();
                        $file_path = $request->file('how_it_work_section_image1')->storeAs('uploads/pages', $file_name, 'public');

                        $additional_images['how_it_work_section_image1'] = time().'_'.$request->how_it_work_section_image1->getClientOriginalName();
                    }
                }
                else{
                    $additional_images['how_it_work_section_image1'] =$request->how_it_work_section_image1_old;
                }
                // 
                if($request->file('how_it_work_section_image2')){
                    $validator = Validator::make($request->all(), [
                        'how_it_work_section_image2' => 'required|mimes:jpg,jpeg,png,svg'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png,svg).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->how_it_work_section_image2->getClientOriginalName();
                        $file_path = $request->file('how_it_work_section_image2')->storeAs('uploads/pages', $file_name, 'public');

                        $additional_images['how_it_work_section_image2'] = time().'_'.$request->how_it_work_section_image2->getClientOriginalName();
                    }
                }
                else{
                    $additional_images['how_it_work_section_image2'] =$request->how_it_work_section_image2_old;
                }
                $page->additional_images=json_encode($additional_images);
                // 
                if($request->file('how_it_work_section_image3')){
                    $validator = Validator::make($request->all(), [
                        'how_it_work_section_image3' => 'required|mimes:jpg,jpeg,png,svg'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png,svg).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->how_it_work_section_image3->getClientOriginalName();
                        $file_path = $request->file('how_it_work_section_image3')->storeAs('uploads/pages', $file_name, 'public');

                        $additional_images['how_it_work_section_image3'] = time().'_'.$request->how_it_work_section_image3->getClientOriginalName();
                    }
                }
                else{
                    $additional_images['how_it_work_section_image3'] =$request->how_it_work_section_image3_old;
                }
                $page->additional_images=json_encode($additional_images);


                
                $page->page_name = $request->page_name;
                $page->page_slug = str_replace(' ', '-', strtolower($page->page_name));
                $page->page_title = $request->page_title;
                $page->page_content = $request->page_content;
                $page->is_active = $request->is_active;
                $page->page_meta_keywords = $request->page_meta_keywords;
                $page->page_meta_desc = $request->page_meta_desc;
                $page->update();

                if($page){
                    $success = true;
                    $message = 'Page updated successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
            else{
                $page->page_name = $request->page_name;
                $page->page_slug = str_replace(' ', '-', strtolower($page->page_name));
                $page->page_title = $request->page_title;
                $page->page_feature_image = $request->page_feature_image_old;
                $page->page_content = $request->page_content;
                $page->is_active = $request->is_active;
                $page->page_meta_keywords = $request->page_meta_keywords;
                $page->page_meta_desc = $request->page_meta_desc;
                $page->update();

                if($page){
                    $success = true;
                    $message = 'Page updated successfully';
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

    public function delete($id)
    {
        try{
            $page = Page::find($id);
            $page->delete();

            $success = true;
            $message = 'The page successfully deleted';
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
