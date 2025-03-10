<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $blogcategories = BlogCategory::orderBy('id','desc')->get();
            // return array_reverse($categories);
            $data['blogcategories']=$blogcategories;
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
            $blog_category_check=BlogCategory::where('blog_category_name',$request->blog_category_name)->first();
            if($blog_category_check===null){
                $blog_category = new BlogCategory();
                $blog_category->blog_category_name = $request->blog_category_name;
                $blog_category->blog_category_slug = str_replace(' ', '-', strtolower($blog_category->blog_category_name));
                $blog_category->is_active = $request->is_active;
                $blog_category->save();

                if($blog_category){
                    $success = true;
                    $message = 'Blog Category added successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
            }
            else{
                $success = false;
                $message = 'Blog Category name is already exist';
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
            $blog_category=BlogCategory::where('id',$id)->first();
            $data['blog_category']=$blog_category;
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
            $blog_category_check=BlogCategory::where('blog_category_name',$request->blog_category_name)->where('id', '!=' ,$id)->first();
            if($blog_category_check===null){
                $blog_category = BlogCategory::where('id',$id) -> first();
                $blog_category->blog_category_name = $request->blog_category_name;
                $blog_category->blog_category_slug = str_replace(' ', '-', strtolower($blog_category->blog_category_name));
                $blog_category->is_active = $request->is_active;    
                $blog_category->update();

                $success = true;
                $message = 'Blog Category updated successfully';
            }
            else{
                $success = false;
                $message = 'Blog Category name is already exist';
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
    }

    public function delete($id)
    {
        try{
            $blog_category = BlogCategory::find($id);
            $blog_category->delete();

            $success = true;
            $message = 'The Blog Category successfully deleted';
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
