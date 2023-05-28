<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Tourist;


class PlanController extends Controller
{
    public function createPlan(Request $request){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        $request->validate([
            "name" => "required|unique:plans",
            "city_id" => "required",
            "breakfast_id" => "required",
            "lunch_id" => "required",
            "dinner_id" => "required",
            "landmark_id" => "required",
            "event_id" => "required",
            "type_id" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "stars" => "required",

        ]);
        $tourist_id = auth()->user()->id;
        $plan = new Plan();

        $favorite->tourist_id = $tourist_id;
        $plan->name = $request->name;
        $plan->city_id = $request->city_id;
        $plan->breakfast_id = $request->breakfast_id;
        $plan->lunch_id = $request->lunch_id;
        $plan->dinner_id = $request->dinner_id;
        $plan->landmark_id = $request->landmark_id;
        $plan->event_id = $request->event_id;
        $plan->type_id = $request->type_id;
        $plan->start_time = $request->start_time;
        $plan->end_time = $request->end_time;
        $plan->start_date = $request->start_date;
        $plan->end_date = $request->end_date;
        $plan->stars = $request->stars;

        $plan->save();

        return response()->json([
            "status" => 1,
            "message" => "Plan added successfully"
        ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function listPlan(){
        $tourist_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $tourist_id,
        ] )->exists()){
        //$tourist_id = auth()->user()->id;

        $plans = Plan::where("tourist_id", $tourist_id)->get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Plans: ",
            "data" => $plans
        ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function getSinglePlan($id){
        $tourist_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $tourist_id,
        ] )->exists()){

        if(Plan::where([
            "id"=> $id,
            "tourist_id" => $tourist_id
            ])->exists()){
           
            $plan_details = Plan::where([
                "id"=> $id,
                "tourist_id" => $tourist_id
                ]
            )->first();
            return response()->json([
                "status" => 1,
                "message" => "Plan found ",
                "data" => $plan_details
            ],200);
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "Plan not found"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function updatePlan(Request $request, $id){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        if(Plan::where([
            "id"=> $id,
            "tourist_id" => $user_id
            ])->exists()){
           
            $plan = Plan::find($id);

            $plan->name = !empty($request->name)? $request->name : $plan->name;
            $plan->city_id = !empty($request->city_id)? $request->city_id : $plan->city_id;
            $plan->breakfast_id = !empty($request->breakfast_id)? $request->breakfast_id : $plan->breakfast_id;
            $plan->lunch_id = !empty($request->lunch_id)? $request->lunch_id : $plan->lunch_id;
            $plan->dinner_id = !empty($request->dinner_id)? $request->dinner_id : $plan->dinner_id;
            $plan->event_id = !empty($request->event_id)? $request->event_id : $plan->event_id;
            $plan->landmark_id = !empty($request->landmark_id)? $request->landmark_id : $plan->landmark_id;
            $plan->type_id = !empty($request->type_id)? $request->type_id : $plan->type_id;
            $plan->start_time = !empty($request->start_time)? $request->start_time : $plan->start_time;
            $plan->end_time = !empty($request->end_time)? $request->end_time : $plan->end_time;
            $plan->start_date = !empty($request->start_date)? $request->start_date : $plan->start_date;
            $plan->end_date = !empty($request->end_date)? $request->end_date : $plan->end_date;
            $plan->stars = !empty($request->stars)? $request->stars : $plan->stars;

            $plan->save();

            return response()->json([
                "status" => 1,
                "message" => "Plan updated successfully "
            ],200);
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "Plan not found"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function deletePlan($id){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        if(Plan::where([
            "id"=> $id,
            "tourist_id" => $user_id
        ])->exists()){
           
            $plan = Plan::find($id);

            $plan->delete();

            return response()->json([
                "status" => 1,
                "message" => "Plan deleted successfully "
            ],200);
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "Plan not found"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function searchByName(Request $request){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        $request->validate([
            "name" => "required",
           
        ]);
        if(Plan::where("name", "like", "%".$request->name."%"
        )->where("tourist_id",$user_id)
        ->exists()){
           
            $plan_details = Plan::where("name", "like", "%".$request->name."%")
            ->where("tourist_id",$user_id)
            ->get();
            return response()->json([
                "status" => 1,
                "message" => "Plan found ",
                "data" => $plan_details
            ],200);
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "Plan not found"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function searchByCity(Request $request){//with
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        $request->validate([
            "city" => "required",
           
        ]);
        if( Plan::where('tourist_id', '=',  $user_id)->withWhereHas('city', fn  ($query) => 
        $query->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")
           )->exists()){
           
            $plan_details = Plan::where('tourist_id', '=',  $user_id)->withWhereHas('city', fn  ($query) => 
            $query->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")
               )->get();
            return response()->json([
                "status" => 1,
                "message" => "Plan found ",
                "data" => $plan_details
            ],200);
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "Plan not found"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }
}
