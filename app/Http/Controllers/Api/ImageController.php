<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image1;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use JD\Cloudder\Facades\Cloudder;

class ImageController extends Controller
{
    //
  //   public function store(Request $request)
  //   {
  //       //
  //       $request->validate([
  //           'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
  //       ]);
  //     if($file = $request->hasFile('image')) {
             
  //           $file = $request->file('image') ;
  //           $fileName = $file->getClientOriginalName() ;
  //           $destinationPath = public_path().'/images' ;
  //           $file->move($destinationPath,$fileName);
  //           return redirect('/uploadfile');
  //   }
  // }

      public function listImages($id, $name){
          $images = Image1::where([$name => $id] )->get();

          return response()->json([
              "status" => 1,
              "message" => "Listing Images: ",
              "data" => $images
          ],200);
      }
  
      public function getSingleImage($id){
          if(Image1::where("id", $id)->exists()){
             
              $image_details = Image1::where("id", $id)->first();
              return response()->json([
                  "status" => 1,
                  "message" => "Image found ",
                  "data" => $image_details
              ],200);
          }else{
              return response()->json([
                  "status" => 0,
                  "message" => "Image not found"
              ],404);
          }
      }
  
      public function deleteImage($id){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
          if(Image1::where("id", $id)->exists()){
              $image = Image1::find($id);
              $image->delete();
                return response()->json([
                  "status" => 1,
                  "message" => "Image deleted successfully "
              ],200);
           
          }else{
              return response()->json([
                  "status" => 0,
                  "message" => "Image not found"
              ],404);
          }
        }else{
          return response()->json([
            "status" => 0,
            "message" => "admin not found"
        ],404);
        }
      
      }

    

      public function deleteImage1($id){
        if(Image1::where("id", $id)->exists()){
          $images=Image1::find($id)->get();
foreach($images as $image){
  $image_path = public_path("groups")."\\".$image->url;
  echo  $image_path;
  if (file_exists($image_path)) {
    echo " true";
    //Image1::delete($image_path);
    unlink(public_path("groups")."\\",$image_path);
          return response()->json([
            "status" => 1,
            "message" => "Image found"
        ],404);
}
          
}         

         
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Image not found"
            ],404);
        }
    }


    public function uploadImages(Request $request)
    {
        $this->validate($request,[
            'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            'event_id' => 'required'

        ]);
     
        
        $image = $request->file('image_name');
     
        $name = $request->file('image_name')->getClientOriginalName();
     
     
        $image_name = $request->file('image_name')->getRealPath();;
     
        Cloudder::upload($image_name, null);
     
        //list($width, $height) = getimagesize($image_name);
     
        //$image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
     
        //save to uploads directory
        $image->move(public_path("uploads"), $name);//public_path('groups')
     
        //Save images
        $this->saveImages($request, $image_url);
     
        return response()->json([
            "status" => 1,
            "message" => 'Image Uploaded Successfully']);
     
    }


    public function saveImages(Request $request, $image_url)
   {
       $image = new Image1();
       $image->image_name = $request->file('image_name')->getClientOriginalName();
       $image->image_url = $image_url;
       $image->event_id = $request->event_id;

       $image->save();
   }


   public function upload2(Request $request){

    $this->validate($request,[
                'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
                'event_id' => 'required'

            ]);

            

            $image = new Image1();
            $path = $request->file('image_name')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $image->image_url = $base64;
            $image->image_name = $request->file('image_name')->getClientOriginalName();
            //$image->image_url =  $request->file('image_name');
            $image->event_id = $request->event_id;
     
            $image->save();
            return response()->json([
                "status" => 1,
                "message" => 'Image Uploaded Successfully']);
   }
  }
  

