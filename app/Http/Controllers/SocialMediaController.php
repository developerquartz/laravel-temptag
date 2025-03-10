<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data=array();
            // $social_medias = SocialMedia::orderBy('id','asc')->get();
            $social_medias=SocialMedia::where('id',1)->first();
            // return array_reverse($social_medias);
            $data['social_medias']=$social_medias;
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

    public function edit($id)
    {
        try {
            $social_medias=SocialMedia::where('id',$id)->first();
            $data['social_medias']=$social_medias;
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
            $social_media = SocialMedia::where('id',1) -> first();
            $social_media->contact_info_address = $request->contact_info_address;    
            $social_media->contact_info_email = $request->contact_info_email;    
            $social_media->contact_info_phone = $request->contact_info_phone;    
            $social_media->social_media_facebook_link = $request->social_media_facebook_link;    
            $social_media->social_media_linkedin_link = $request->social_media_linkedin_link;    
            $social_media->social_media_instagram_link = $request->social_media_instagram_link;    
            $social_media->copyright = $request->copyright;    
            $social_media->update();

            $success = true;
            $message = 'Basic Info updated successfully';
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
