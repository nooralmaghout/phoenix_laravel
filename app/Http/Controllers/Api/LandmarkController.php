<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Landmark;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Image1;
use Carbon\Carbon;


class LandmarkController extends Controller
{
    public function createLandmark(Request $request){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
        $request->validate([
            "ar_name" => "required|unique:landmarks",
            "en_name" => "required|unique:landmarks",
            "city_id" => "required",
            "days_off_id" => "required",
            "ar_description" => "required",
            "en_description" => "required",
            "open_time" => "required",
            "close_time" => "required",
            "type_id" => "required",
            "category_id" => "required",
            "ar_location" => "required",
            "en_location" => "required",
            "map_location" => "required",
            "images.*"=> "required|image|mimes:png,jpg,jpeg"
                    ]);

        try {
            DB::beginTransaction();
            $landmark = new Landmark();

            $landmark->ar_name = $request->ar_name;
            $landmark->en_name = $request->en_name; 
            $landmark->days_off_id = $request->days_off_id;
            $landmark->ar_description = $request->ar_description;
            $landmark->en_description = $request->en_description;
            $landmark->open_time = $request->open_time;
            $landmark->close_time = $request->close_time;
            $landmark->type_id = $request->type_id;
            $landmark->category_id = $request->category_id;
            $landmark->ar_location = $request->ar_location;
            $landmark->en_location = $request->en_location;
            $landmark->map_location = $request->map_location;
            $landmark->city_id = $request->city_id;


            $open = Carbon::parse($request->open_time)->toTimeString();
            $close = Carbon::parse($request->close_time)->toTimeString();

            if($open>$close)
            {
                return response()->json([
                    "status" => 0,
                    "message" => "open>close"
                ]);
            }
            $landmark->save();

            $images = $request->images;

            foreach ($images as $item){
                echo "k";
                $image = new Image1();                      
                $imageName = (String)time().$item->getClientOriginalName(); 
                $item->move(public_path('groups'), $imageName);
                $image->url = $imageName;
                $image->landmark_id = $landmark->id;
                $image->save();
            }

            DB::commit();
            return response()->json([
                "status" => 1,
                "message" => "Landmark added successfully"
            ]); 
        } catch (\Throwable $th) {
            DB::rollBack();
             throw $th;
            return response()->json([
            "status" => 1,
            "message" => $th 
            ]);
        }
        
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not an Admin!"
            ]); 
        }
    }

    public function listLandmark(){
        $landmarks = Landmark::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Landmarks: ",
            "data" => $landmarks
        ],200);
    }

    public function getSingleLandmark($id){
        if(Landmark::where("id", $id)->exists()){
           
            $landmark_details = Landmark::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Landmark found ",
                "data" => $landmark_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmark not found"
            ],404);
        }
    }

    public function updateLandmark(Request $request, $id){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
        if(Landmark::where("id", $id)->exists()){
           
            $landmark = Landmark::find($id);
            
            $landmark->ar_name = !empty($request->ar_name)? $request->ar_name : $landmark->ar_name;
            $landmark->en_name = !empty($request->en_name)? $request->en_name : $landmark->en_name;
            $landmark->city_id = !empty($request->city_id)? $request->city_id : $landmark->city_id;
            $landmark->days_off_id = !empty($request->days_off_id)? $request->days_off_id : $landmark->days_off_id;
            $landmark->en_description = !empty($request->en_description)? $request->en_description : $landmark->en_description;
            $landmark->ar_description = !empty($request->ar_description)? $request->ar_description : $landmark->ar_description;
            $landmark->open_time = !empty($request->open_time)? $request->open_time : $landmark->open_time;
            $landmark->close_time = !empty($request->close_time)? $request->close_time : $landmark->close_time;
            $landmark->type_id = !empty($request->type_id)? $request->type_id : $landmark->type_id;
            $landmark->category_id = !empty($request->category_id)? $request->category_id : $landmark->category_id;
            $landmark->en_location = !empty($request->en_location)? $request->en_location : $landmark->en_location;
            $landmark->ar_location = !empty($request->ar_location)? $request->ar_location : $landmark->ar_location;
            $landmark->map_location = !empty($request->map_location)? $request->map_location : $landmark->map_location;

            $landmark->save();

            return response()->json([
                "status" => 1,
                "message" => "Landmark updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmark not found"
            ],404);
        }
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not an Admin!"
            ]); 
        }
    }

    public function deleteLandmark($id){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
        if(Landmark::where("id", $id)->exists()){
           
            try {
                //code...
                DB::beginTransaction();
                $landmark = Landmark::find($id);
 //echo $event;
                $images = Image1::where("landmark_id", $id)->get();
                foreach($images as $image){
                    //echo $image->id;
                    $img = Image1::find($image->id);
                    $img->delete();
                    //echo "image deleted";
                }
               
             $landmark->delete();
             //echo "event deleted";
             DB::commit();
             return response()->json([
                 "status" => 1,
                 "message" => "Landmark deleted successfully "
                         ],200);
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return response()->json([
                 "status" => 0,
                 "message" => $th
                         ],200);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmark not found"
            ],404);
        }
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not an Admin!"
            ]); 
        }
    }

    public function searchByName(Request $request){
        $request->validate([
            "name" => "required",
           
        ]);
        if(Landmark::where("ar_name", "like", "%".$request->name."%")->orWhere("en_name", "like", "%".$request->name."%")->exists()){
           
            $landmark_details = Landmark::where("ar_name", "like", "%".$request->name."%")->orWhere("en_name", "like", "%".$request->name."%")->get();
            return response()->json([
                "status" => 1,
                "message" => "Landmark found ",
                "data" => $landmark_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmark not found"
            ],404);
        }
    }

    public function searchByCity(Request $request){
        $request->validate([
            "city" => "required",
           
        ]);
        if( Landmark::withWhereHas('city', fn  ($query) => 
        $query->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")
           )->exists()){
           
            $landmark_details = Landmark::withWhereHas('city', fn  ($query) => 
            $query->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")
               )->get();
            return response()->json([
                "status" => 1,
                "message" => "Landmark found ",
                "data" => $landmark_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmark not found"
            ],404);
        }
    }
}
