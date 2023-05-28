<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Tourist;


class AdminController extends Controller
{

    public function register(Request $request){
        // validation
        $request->validate([
            "name" => "required",//length&string
            "email" => "required|email|unique:admins",//valid email
            "password" => "required|confirmed|unique:admins"//length
        ]);

        // create data
        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;

        $admin->save();

        //Admin::create([])

        // send response
        return response()->json([
            "status" => 1,
            "message" => "Admin created successfuly" 
        ]);
    }

    public function login(Request $request){
        // validation
        $request->validate([
            "email" => "required|email",//valid email
            "password" => "required",//length
        ]);
        //check

        $admin = Admin::where("email", "=" , $request->email)->first();
        if(isset($admin->id)){
            if($request->password == $admin->password){

                //create token
                $token = $admin->createToken("auth_token")->plainTextToken;
                //send response
                return response()->json([
                    "status" => 1,
                    "message" => "Admin logged in successfully",
                    "access_token"=> $token
                    ]);
            }else{
            return response()->json([
                "status" => 0,
                "message" => "Password is not correct"
            ],404);
        }
        
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Admin not found"
            ],404);
        }
        
    }

    public function profile(){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
        return response()->json([
    
            "status"=>1,
            "message"=>"Admin profile information ",
            "data" => auth()->user()
          ]);
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not an Admin!"
            ]); 
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([

            "status"=>1,
            "message"=>"Admin logged out successfully"

        ]);
    }

    public function updateAdmin(Request $request){
        $admin_id = auth()->user()->id;
        if(Admin::where("id", $admin_id)->exists()){
            
           
            $admin = Admin::find($admin_id);

            $admin->name = !empty($request->name)? $request->name : $admin->name;
            $admin->email = !empty($request->email)? $request->email : $admin->email;
            $admin->password = !empty($request->password)? $request->password : $admin->password;

            $admin->save();

            return response()->json([
                "status" => 1,
                "message" => "Admin updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Admin not found"
            ],404);
        }
    }

    public function numberOfUsers(){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
        $number =  new Tourist();
        
        return response()->json([
            "status" => 1,
            "message" => "number of users" ,
            "data" => $number->count()
        ]);
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not an Admin!"
            ]); 
        }

    }

    public function numberOfOutTourists(){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
        $number =  new Tourist();
        $all =  $number->count();
        $out = $number->where("nationality_id" ,"!=", "1")->count();
        $tourist = ($out/$all)*100;

        return response()->json([
            "status" => 1,
            "message" => "number of outer tourists" ,
            "data" => number_format((float)$tourist, 0, '.', '')
        ]);
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not an Admin!"
            ]); 
        }
    }

    public function numberOfInTourists(){
        $user_id = auth()->user()->id;
    
        if(Admin::where([
            "id" => $user_id,
        ] )->exists()){
        $number =  new Tourist();
        $all =  $number->count();
        $local = $number->where(["nationality_id" => "1"])->count();
        $tourist = ($local/$all)*100;

        return response()->json([
            "status" => 1,
            "message" => "number of local tourists " ,
            "data" => number_format((float)$tourist, 0, '.', '')
        ]);
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not an Admin!"
            ]); 
        }

    }
}
