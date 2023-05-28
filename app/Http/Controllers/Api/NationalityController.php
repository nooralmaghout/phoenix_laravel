<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nationality;


class NationalityController extends Controller
{
    //
    public function createNationality(Request $request){
        $request->validate([
            "ar_name" => "required|unique:nationalitys",
            "en_name" => "required|unique:nationalitys",
            
        ]);

        $nationality = new Nationality();

        $nationality->ar_name = $request->ar_name;
        $nationality->en_name = $request->en_name;

        $nationality->save();

        return response()->json([
            "status" => 1,
            "message" => "Nationality added successfully"
        ]);
    }

    public function listNationality(){
        $nationalitys = Nationality::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Nationalitys: ",
            "data" => $nationalitys
        ],200);
    }

    public function getSingleNationality($id){
        if(Nationality::where("id", $id)->exists()){
           
            $nationality_details = Nationality::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Nationality found ",
                "data" => $nationality_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Nationality not found"
            ],404);
        }
    }

    public function updateNationality(Request $request, $id){
        if(Nationality::where("id", $id)->exists()){
           
            $nationality = Nationality::find($id);
            
            $nationality->ar_name = !empty($request->ar_name)? $request->ar_name : $nationality->ar_name;
            $nationality->en_name = !empty($request->en_name)? $request->en_name : $nationality->en_name;
            
            $nationality->save();

            return response()->json([
                "status" => 1,
                "message" => "Nationality updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Nationality not found"
            ],404);
        }
    }

    public function deleteNationality($id){
        if(Nationality::where("id", $id)->exists()){
           
            $nationality = Nationality::find($id);

            $nationality->delete();

            return response()->json([
                "status" => 1,
                "message" => "Nationality deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Nationality not found"
            ],404);
        }
    
    }
}
