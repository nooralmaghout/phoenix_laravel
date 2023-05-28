<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Landmarks_type;


class Landmarks_typeController extends Controller
{
    public function createLandmarks_type(Request $request){
        $request->validate([
            "ar_name" => "required|unique:landmarks_types",
            "en_name" => "required|unique:landmarks_types",
            
        ]);

        $landmarks_type = new Landmarks_type();

        $landmarks_type->ar_name = $request->ar_name;
        $landmarks_type->en_name = $request->en_name;

        $landmarks_type->save();

        return response()->json([
            "status" => 1,
            "message" => "Landmarks_type added successfully"
        ]);
    }

    public function listLandmarks_type(){
        $landmarks_types = Landmarks_type::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Landmarks_types: ",
            "data" => $landmarks_types
        ],200);
    }

    public function getSingleLandmarks_type($id){
        if(Landmarks_type::where("id", $id)->exists()){
           
            $landmarks_type_details = Landmarks_type::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Landmarks_type found ",
                "data" => $landmarks_type_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmarks_type not found"
            ],404);
        }
    }

    public function updateLandmarks_type(Request $request, $id){
        if(Landmarks_type::where("id", $id)->exists()){
           
            $landmarks_type = Landmarks_type::find($id);
            
            $landmarks_type->ar_name = !empty($request->ar_name)? $request->ar_name : $landmarks_type->ar_name;
            $landmarks_type->en_name = !empty($request->en_name)? $request->en_name : $landmarks_type->en_name;
            
            $landmarks_type->save();

            return response()->json([
                "status" => 1,
                "message" => "Landmarks_type updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmarks_type not found"
            ],404);
        }
    }

    public function deleteLandmarks_type($id){
        if(Landmarks_type::where("id", $id)->exists()){
           
            $landmarks_type = Landmarks_type::find($id);

            $landmarks_type->delete();

            return response()->json([
                "status" => 1,
                "message" => "Landmarks_type deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Landmarks_type not found"
            ],404);
        }
    
    }
}
