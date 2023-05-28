<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan_type;


class Plan_typeController extends Controller
{
    public function createPlan_type(Request $request){
        $request->validate([
            "ar_name" => "required|unique:plan_types",
            "en_name" => "required|unique:plan_types",
            
        ]);

        $plan_type = new Plan_type();

        $plan_type->ar_name = $request->ar_name;
        $plan_type->en_name = $request->en_name;

        $plan_type->save();

        return response()->json([
            "status" => 1,
            "message" => "Plan_type added successfully"
        ]);
    }

    public function listPlan_type(){
        $plan_types = Plan_type::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Plan_types: ",
            "data" => $plan_types
        ],200);
    }

    public function getSinglePlan_type($id){
        if(Plan_type::where("id", $id)->exists()){
           
            $plan_type_details = Plan_type::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Plan_type found ",
                "data" => $plan_type_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Plan_type not found"
            ],404);
        }
    }

    public function updatePlan_type(Request $request, $id){
        if(Plan_type::where("id", $id)->exists()){
           
            $plan_type = Plan_type::find($id);
            
            $plan_type->ar_name = !empty($request->ar_name)? $request->ar_name : $plan_type->ar_name;
            $plan_type->en_name = !empty($request->en_name)? $request->en_name : $plan_type->en_name;
            
            $plan_type->save();

            return response()->json([
                "status" => 1,
                "message" => "Plan_type updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Plan_type not found"
            ],404);
        }
    }

    public function deletePlan_type($id){
        if(Plan_type::where("id", $id)->exists()){
           
            $plan_type = Plan_type::find($id);

            $plan_type->delete();

            return response()->json([
                "status" => 1,
                "message" => "Plan_type deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Plan_type not found"
            ],404);
        }
    
    }
}
