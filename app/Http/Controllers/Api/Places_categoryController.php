<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Places_category;


class Places_categoryController extends Controller
{
    //
    public function createPlaces_category(Request $request){
        $request->validate([
            "ar_name" => "required|unique:places_categories",
            "en_name" => "required|unique:places_categories",
            
        ]);

        $places_category = new Places_category();

        $places_category->ar_name = $request->ar_name;
        $places_category->en_name = $request->en_name;

        $places_category->save();

        return response()->json([
            "status" => 1,
            "message" => "Places_category added successfully"
        ]);
    }

    public function listPlaces_category(){
        $places_categorys = Places_category::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Places_categorys: ",
            "data" => $places_categorys
        ],200);
    }

    public function getSinglePlaces_category($id){
        if(Places_category::where("id", $id)->exists()){
           
            $places_category_details = Places_category::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Places_category found ",
                "data" => $places_category_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Places_category not found"
            ],404);
        }
    }

    public function updatePlaces_category(Request $request, $id){
        if(Places_category::where("id", $id)->exists()){
           
            $places_category = Places_category::find($id);
            
            $places_category->ar_name = !empty($request->ar_name)? $request->ar_name : $places_category->ar_name;
            $places_category->en_name = !empty($request->en_name)? $request->en_name : $places_category->en_name;
            
            $places_category->save();

            return response()->json([
                "status" => 1,
                "message" => "Places_category updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Places_category not found"
            ],404);
        }
    }

    public function deletePlaces_category($id){
        if(Places_category::where("id", $id)->exists()){
           
            $places_category = Places_category::find($id);

            $places_category->delete();

            return response()->json([
                "status" => 1,
                "message" => "Places_category deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Places_category not found"
            ],404);
        }
    
    }
}
