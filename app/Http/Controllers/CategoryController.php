<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            $categories = Category::orderBy('id','desc')->get();
            // return array_reverse($categories);
            $data['categories']=$categories;
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
            $category_check=Category::where('category_name',$request->category_name)->first();
            if($category_check===null){
                $category = new Category();
                $category->category_name = $request->category_name;
                $category->category_slug = str_replace(' ', '-', strtolower($category->category_name));
                $category->is_active = $request->is_active;
                $category->save();

                if($category){
                    $success = true;
                    $message = 'Category added successfully';
                }
                else{
                    $success = false;
                    $message = 'Something went wrong please try again';    
                }
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
        ];
        return response()->json($response);
    }

    public function edit($id)
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
    }

    public function delete($id)
    {
        try{
            $category = Category::find($id);
            $category->delete();

            $success = true;
            $message = 'The category successfully deleted';
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
