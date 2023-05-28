<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tourist;


class TouristController extends Controller
{
    
    public function register(Request $request){
        // validation
        $request->validate([
            "name" => "required",//length&string
            "email" => "required|email|unique:tourists",//valid email
            "password" => "required|confirmed|unique:tourists",//length
            "date_of_birth" => "required",
            "nationality_id" => "required",
            "city_id" => "required"

        ]);

        // create data
        $tourist = new Tourist();

        $tourist->name = $request->name;
        $tourist->email = $request->email;
        $tourist->password = $request->password;
        $tourist->date_of_birth = $request->date_of_birth;
        $tourist->nationality_id = $request->nationality_id;
        $tourist->city_id = $request->city_id;

        $tourist->save();

        //Tourist::create([])

        // send response
        return response()->json([
            "status" => 1,
            "message" => "Tourist created successfuly" 
        ]);
    }

    public function login(Request $request){
        // validation
        $request->validate([
            "email" => "required|email",//valid email
            "password" => "required",//length
        ]);
        //check

        $tourist = Tourist::where("email", "=" , $request->email)->first();
        if(isset($tourist->id)){
            if($request->password == $tourist->password){

                //create token
                $token = $tourist->createToken("auth_token")->plainTextToken;
                //send response
                return response()->json([
                    "status" => 1,
                    "message" => "Tourist logged in successfully",
                    "access_token"=> $token
                    ]);
            }else{
            return response()->json([
                "status" => 0,
                "message" => "password is not correct"
            ],404);
        }
        
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Tourist not found"
            ],404);
        }
        
    }

    public function profile(){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        return response()->json([
    
            "status"=>1,
            "message"=>"Tourist profile information ",
            "data" => auth()->user()
          ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([

            "status"=>1,
            "message"=>"Tourist logged out successfully"

        ]);
  
    }

    public function updateTourist(Request $request){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        
           
            $tourist = Tourist::find($user_id);

            $tourist->name = !empty($request->name)? $request->name : $tourist->name;
            $tourist->email = !empty($request->email)? $request->email : $tourist->email;
            $tourist->password = !empty($request->password)? $request->password : $tourist->password;
            $tourist->date_of_birth = !empty($request->date_of_birth)? $request->date_of_birth : $tourist->date_of_birth;
            $tourist->nationality_id = !empty($request->nationality_id)? $request->nationality_id : $tourist->nationality_id;
            $tourist->city_id = !empty($request->city_id)? $request->city_id : $tourist->city_id;

            $tourist->save();

            return response()->json([
                "status" => 1,
                "message" => "Tourist updated successfully "
            ],200);

        }else{
            return response()->json([
                "status" => 0,
                "message" => "Tourist not found!"
            ],404);
        }
    }

    public function deleteTourist(){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
            if(Tourist::where("id", $user_id)->exists()){
            
                $tourist = Tourist::find($user_id);

                $tourist->delete();

                return response()->json([
                    "status" => 1,
                    "message" => "Tourist deleted successfully "
                ],200);
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "Tourist not found"
                ],404);
            }
        }
    }
}
