<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function createCategory(Request $request){
        $request->validate([
            "ar_name" => "required|unique:categories",
            "en_name" => "required|unique:categories",
            
        ]);

        $category = new Category();

        $category->ar_name = $request->ar_name;
        $category->en_name = $request->en_name;

        $category->save();

        return response()->json([
            "status" => 1,
            "message" => "Category added successfully"
        ]);
    }

    public function listCategory(){
        $categorys = Category::get();

        return response()->json([
            "status" => 1,
            "message" => "Listing Categorys: ",
            "data" => $categorys
        ],200);
    }

    public function getSingleCategory($id){
        if(Category::where("id", $id)->exists()){
           
            $category_details = Category::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "Category found ",
                "data" => $category_details
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Category not found"
            ],404);
        }
    }

    public function updateCategory(Request $request, $id){
        if(Category::where("id", $id)->exists()){
           
            $category = Category::find($id);
            
            $category->ar_name = !empty($request->ar_name)? $request->ar_name : $category->ar_name;
            $category->en_name = !empty($request->en_name)? $request->en_name : $category->en_name;
            
            $category->save();

            return response()->json([
                "status" => 1,
                "message" => "Category updated successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Category not found"
            ],404);
        }
    }

    public function deleteCategory($id){
        if(Category::where("id", $id)->exists()){
           
            $category = Category::find($id);

            $category->delete();

            return response()->json([
                "status" => 1,
                "message" => "Category deleted successfully "
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Category not found"
            ],404);
        }
    
    }
}
