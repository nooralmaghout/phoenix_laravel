<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Tourist;



class SearchController extends Controller
{
    public function createSearch(Request $request){

        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        $request->validate([
            "search" => "required",
           
        ]);

        $search = new Search();

        $search->search = $request->search;

        $search->save();

        return response()->json([
            "status" => 1,
            "message" => "Search added successfully"
        ]);
    
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not registered Tourist!"
            ]); 
        }
}

    public function listSearch(){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        $searchs = Search::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Searchs: ",
            "data" => $searchs
        ],200);
        }
        else{
            return response()->json([
                "status" => 1,
                "message" => "You are not registered Tourist!"
            ]); 
        }
}

    public function getSingleSearch($id){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        if(Search::where("id", $id)->exists()){
           
            $search_details = Search::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Search found ",
                "data" => $search_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Search not found"
            ],404);
        }
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not registered Tourist!"
            ]); 
        }
}

    public function updateSearch(Request $request, $id){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        if(Search::where("id", $id)->exists()){
           
            $search = Search::find($id);

            $search->search = !empty($request->search)? $request->search : $search->search;

            $search->save();

            return response()->json([
                "status" => 1,
                "message" => "Search updated successfully "
            ],200);
            }else{
                return response()->json([
                    "status" => 0,
                    "message" => "Search not found"
                ],404);
            }
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not registered Tourist!"
            ]); 
            }
}

    public function deleteSearch($id){
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        if(Search::where("id", $id)->exists()){
           
            $search = Search::find($id);

            $search->delete();

            return response()->json([
                "status" => 1,
                "message" => "Search deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "search history is not fount!"
            ],404);
        }
        }else{
            return response()->json([
                "status" => 1,
                "message" => "You are not registered Tourist!"
            ]); 
        }
}

}
