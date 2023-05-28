<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function createCity(Request $request){
        $request->validate([
            "ar_name" => "required|unique:citys",
            "en_name" => "required|unique:citys",
            
        ]);

        $city = new City();

        $city->ar_name = $request->ar_name;
        $city->en_name = $request->en_name;

        $city->save();

        return response()->json([
            "status" => 1,
            "message" => "City added successfully"
        ]);
    }

    public function listCity(){
        $citys = City::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Citys: ",
            "data" => $citys
        ],200);
    }

    public function getSingleCity($id){
        if(City::where("id", $id)->exists()){
           
            $city_details = City::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "City found ",
                "data" => $city_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "City not found"
            ],404);
        }
    }

    public function updateCity(Request $request, $id){
        if(City::where("id", $id)->exists()){
           
            $city = City::find($id);
            
            $city->ar_name = !empty($request->ar_name)? $request->ar_name : $city->ar_name;
            $city->en_name = !empty($request->en_name)? $request->en_name : $city->en_name;
            
            $city->save();

            return response()->json([
                "status" => 1,
                "message" => "City updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "City not found"
            ],404);
        }
    }

    public function deleteCity($id){
        if(City::where("id", $id)->exists()){
           
            $city = City::find($id);

            $city->delete();

            return response()->json([
                "status" => 1,
                "message" => "City deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "City not found"
            ],404);
        }
    
    }
}
