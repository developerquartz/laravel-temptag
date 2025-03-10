<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\BlogCategory;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $blogs = DB::table('blogs')
            ->join('blog_categories', 'blog_categories.id','blogs.blog_category_id')
            ->select('blogs.*', 'blog_categories.blog_category_name', 'blog_categories.blog_category_slug')
            ->orderBy('blogs.id', 'desc')
            ->get()->toArray();


            // $blogs = Blog::all()->toArray();
            // return array_reverse($blogs);
            $data['blogs']=$blogs;
            
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
            

            $blog = new Blog();

            if($request->file()) {
                if($request->file('blog_title_background_image')){
                    $request->validate([
                       'blog_title_background_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    $file_name = time().'_'.$request->blog_title_background_image->getClientOriginalName();
                    $file_path = $request->file('blog_title_background_image')->storeAs('uploads/blogs', $file_name, 'public');

                    $blog->blog_title_background_image = time().'_'.$request->blog_title_background_image->getClientOriginalName();
                    // $blog->blog_title_background_image = '/storage/' . $file_path;
                }
                else{
                    $blog->blog_title_background_image ='';
                }
                
                if($request->file('blog_feature_image')){
                    $request->validate([
                       'blog_feature_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    $file_name = time().'_'.$request->blog_feature_image->getClientOriginalName();
                    $file_path = $request->file('blog_feature_image')->storeAs('uploads/blogs', $file_name, 'public');

                    $blog->blog_feature_image = time().'_'.$request->blog_feature_image->getClientOriginalName();
                    // $blog->blog_feature_image = '/storage/' . $file_path;
                }
                else{
                    $blog->blog_feature_image ='';
                }
                                
                $blog->blog_category_id = $request->blog_category_id;
                $blog->blog_name = $request->blog_name;
                $blog->blog_slug = str_replace(' ', '-', strtolower($blog->blog_name));
                $blog->blog_title = $request->blog_title;
                $blog->blog_content = $request->blog_content;
                $blog->is_active = $request->is_active;
                $blog->blog_meta_keywords = $request->blog_meta_keywords;
                $blog->blog_meta_desc = $request->blog_meta_desc;
                $blog->save();

                if($blog){
                    $success = true;
                    $message = 'Blog added successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
            else{
                $blog->blog_category_id = $request->blog_category_id;
                $blog->blog_name = $request->blog_name;
                $blog->blog_slug = str_replace(' ', '-', strtolower($blog->blog_name));
                $blog->blog_title = $request->blog_title;
                $blog->blog_content = $request->blog_content;
                $blog->is_active = $request->is_active;
                $blog->blog_meta_keywords = $request->blog_meta_keywords;
                $blog->blog_meta_desc = $request->blog_meta_desc;
                $blog->save();

                if($blog){
                    $success = true;
                    $message = 'Blog added successfully';
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

    public function edit($id)
    {
        try {
            $blog=Blog::where('id',$id)->first();
            $data['blog']=$blog;
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
            
            $blog = Blog::where('id',$id)->first();

            if($request->file()) {
                if($request->file('blog_title_background_image')){
                    $validator = Validator::make($request->all(), [
                        'blog_title_background_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->blog_title_background_image->getClientOriginalName();
                        $file_path = $request->file('blog_title_background_image')->storeAs('uploads/blogs', $file_name, 'public');

                        $blog->blog_title_background_image = time().'_'.$request->blog_title_background_image->getClientOriginalName();
                        // $blog->blog_title_background_image = '/storage/' . $file_path;
                    }
                }
                else{
                    $blog->blog_title_background_image =$request->blog_title_background_image_old;
                }
                
                if($request->file('blog_feature_image')){
                    $validator = Validator::make($request->all(), [
                        'blog_feature_image' => 'required|mimes:jpg,jpeg,png'
                    ]);

                    if ($validator->fails()) {
                        $response = [
                            'success' => false,
                            'message' => 'The Image should be (mimes:jpg,jpeg,png).',
                        ];
                        return response()->json($response);
                    } else {
                        $file_name = time().'_'.$request->blog_feature_image->getClientOriginalName();
                        $file_path = $request->file('blog_feature_image')->storeAs('uploads/blogs', $file_name, 'public');

                        $blog->blog_feature_image = time().'_'.$request->blog_feature_image->getClientOriginalName();
                        // $blog->blog_feature_image = '/storage/' . $file_path;
                    }
                }
                else{
                    $blog->blog_feature_image =$request->blog_feature_image_old;
                }

                $blog->blog_name = $request->blog_name;
                $blog->blog_slug = str_replace(' ', '-', strtolower($blog->blog_name));
                $blog->blog_title = $request->blog_title;
                $blog->blog_content = $request->blog_content;
                $blog->is_active = $request->is_active;
                $blog->blog_meta_keywords = $request->blog_meta_keywords;
                $blog->blog_meta_desc = $request->blog_meta_desc;
                $blog->update();

                if($blog){
                    $success = true;
                    $message = 'Blog updated successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
            else{
                $blog->blog_name = $request->blog_name;
                $blog->blog_slug = str_replace(' ', '-', strtolower($blog->blog_name));
                $blog->blog_title = $request->blog_title;
                $blog->blog_feature_image = $request->blog_feature_image_old;
                $blog->blog_title_background_image = $request->blog_title_background_image_old;
                $blog->blog_content = $request->blog_content;
                $blog->is_active = $request->is_active;
                $blog->blog_meta_keywords = $request->blog_meta_keywords;
                $blog->blog_meta_desc = $request->blog_meta_desc;
                $blog->update();

                if($blog){
                    $success = true;
                    $message = 'Blog updated successfully';
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
            $blog = Blog::find($id);
            $blog->delete();

            $success = true;
            $message = 'The blog successfully deleted';
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

    public function recent_blogs($id,Request $request)
    {
        try{
            $data=array();
            $blogs = DB::table('blogs')
            ->join('blog_categories', 'blog_categories.id','blogs.blog_category_id')
            ->select('blogs.*', 'blog_categories.blog_category_name', 'blog_categories.blog_category_slug')
            ->where('blogs.id','!=',$id)
            ->orderBy('blogs.id', 'desc')
            ->get()->toArray();


            // $blogs = Blog::all()->toArray();
            // return array_reverse($blogs);
            $data['blogs']=$blogs;
            
            $success = true;
            $message = "Records founded.";
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message." ".$id,
            'data' => $data,
        ];
        return response()->json($response);
    }
}
