<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Days_off;


class Days_offController extends Controller
{
    public function createDays_off(Request $request){
        $request->validate([
            "ar_name" => "required|unique:days_offs",
            "en_name" => "required|unique:days_offs",
            
        ]);

        $days_off = new Days_off();

        $days_off->ar_name = $request->ar_name;
        $days_off->en_name = $request->en_name;

        $days_off->save();

        return response()->json([
            "status" => 1,
            "message" => "Days_off added successfully"
        ]);
    }

    public function listDays_off(){
        $days_offs = days_off::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Days_offs: ",
            "data" => $days_offs
        ],200);
    }

    public function getSingleDays_off($id){
        if(Days_off::where("id", $id)->exists()){
           
            $days_off_details = Days_off::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Days_off found ",
                "data" => $days_off_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Days_off not found"
            ],404);
        }
    }

    public function updateDays_off(Request $request, $id){
        if(Days_off::where("id", $id)->exists()){
           
            $days_off = Days_off::find($id);
            
            $days_off->ar_name = !empty($request->ar_name)? $request->ar_name : $days_off->ar_name;
            $days_off->en_name = !empty($request->en_name)? $request->en_name : $days_off->en_name;
            
            $days_off->save();

            return response()->json([
                "status" => 1,
                "message" => "Days_off updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Days_off not found"
            ],404);
        }
    }

    public function deleteDays_off($id){
        if(Days_off::where("id", $id)->exists()){
           
            $days_off = Days_off::find($id);

            $days_off->delete();

            return response()->json([
                "status" => 1,
                "message" => "Days_off deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Days_off not found"
            ],404);
        }
    
    }
}
