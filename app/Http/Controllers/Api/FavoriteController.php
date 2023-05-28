<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Tourist;
use App\Models\Place;
use Illuminate\Support\Facades\DB;


class FavoriteController extends Controller
{
    public function createFavorite($place_id){
        $tourist_id = auth()->user()->id;
        if(Tourist::where([
            "id" => $tourist_id,
        ] )->exists()){
        
        // $tourist_id = auth()->user()->id;
        $favorite = new Favorite();

         $favorite->tourist_id = $tourist_id;
         $favorite->place_id = $place_id;
        
        $favorite->save();

        return response()->json([
            "status" => 1,
            "message" => "Favorite added successfully"
        ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function listFavorite(){
        $tourist_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $tourist_id,
        ] )->exists()){
        //$tourist_id = auth()->user()->id;

        $favorites = Favorite::where("tourist_id", $tourist_id)->get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Favorites: ",
            "data" => $favorites
        ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function getSingleFavorite($id){
        $tourist_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $tourist_id,
        ] )->exists()){
        //$tourist_id = auth()->user()->id;

        if(Favorite::where([
            "id"=> $id,
            "tourist_id" => $tourist_id
            ])->exists()){
           
            $favorite_details = Favorite::where([
                "id"=> $id,
                "tourist_id" => $tourist_id
                ])->first();
            return response()->json([
                "status" => 1,
                "message" => "Favorite found ",
                "data" => $favorite_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Favorite not found"
            ],404);
        }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function deleteFavorite($id){
        $tourist_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $tourist_id,
        ] )->exists()){
        //$tourist_id = auth()->user()->id;

        if(Favorite::where([
            "id"=> $id,
            "tourist_id" => $tourist_id
            ])->exists()){
           
            $favorite = Favorite::where([
                "id"=> $id,
                "tourist_id" => $tourist_id
                ])->first();

            $favorite->delete();

            return response()->json([
                "status" => 1,
                "message" => "Favorite deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Favorite not found"
            ],404);
        }
        }else{
            return response()->json([
                "status" => 0,
                "message" => "You are not registered Tourist!"
            ],404);
        }
    }

    public function searchByName(Request $request){//with
        $user_id = auth()->user()->id;
    
        if(Tourist::where([
            "id" => $user_id,
        ] )->exists()){
        $request->validate([
            "name" => "required",
           
        ]);


    //     Author::withWhereHas('books', fn($query) =>
    //     $query->where('title', 'like', 'PHP%')
    //    )->get();
        
        // $favs = Favorite::with('place')->get();
        // foreach ($favs as $fav) {
        //  echo $fav->place->en_name;
        // }

        // $favs = Favorite::where('tourist_id', '=',  $user_id)->withWhereHas('place', fn  ($query) => 
        // $query->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")
        //    )->get();
        //    foreach ($favs as $fav) {
        //      echo $fav->place->en_name;
        //     }

        if( Favorite::where('tourist_id', '=',  $user_id)->withWhereHas('place', fn  ($query) => 
        $query->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")
           )->exists()){
           
            $favorite_details = Favorite::where('tourist_id', '=',  $user_id)->withWhereHas('place', fn  ($query) => 
            $query->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")
               )->get();
            return response()->json([
                "status" => 1,
                "message" => "Favorite found ",
                "data" => $favorite_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Favorite not found"
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
        
        $favs = Favorite::where('tourist_id', '=',  $user_id)->withWhereHas('place', fn  ($query) => 
        $query->withWhereHas('city', fn  ($q) =>
         $q->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")))->get();
            // $query->where($query->place->city->ar_name, 'like',  "%".$request->name."%")->orWhere($query->place->city->en_name, 'like', "%".$request->name."%")
               
        echo 'kkk';
        if(Favorite::where('tourist_id', '=',  $user_id)->withWhereHas('place', fn  ($query) => 
        $query->withWhereHas('city', fn  ($q) =>
         $q->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")))->exists()){
           
            $favorite_details = Favorite::where('tourist_id', '=',  $user_id)->withWhereHas('place', fn  ($query) => 
            $query->withWhereHas('city', fn  ($q) =>
             $q->where('ar_name', 'like',  "%".$request->name."%")->orWhere('en_name', 'like', "%".$request->name."%")))->get();
            return response()->json([
                "status" => 1,
                "message" => "Favorite found ",
                "data" => $favorite_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Favorite not found"
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
