<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\TouristController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\LandmarkController;
use App\Http\Controllers\Api\PlaceController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\Places_categoryController;
use App\Http\Controllers\Api\NationalityController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Plan_typeController;
use App\Http\Controllers\Api\Days_offController;
use App\Http\Controllers\Api\Landmarks_typeController;
use App\Http\Controllers\Api\ImageController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/********Admin Apis********/
Route::post("registerAdmin", [AdminController::class, "register"]);
Route::post("loginAdmin", [AdminController::class, "login"]);
Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::put("updateAdmin", [AdminController::class, "updateAdmin"]);
    Route::get("profileAdmin", [AdminController::class, "profile"]);
    Route::get("logoutAdmin", [AdminController::class, "logout"]);

    /////////
    Route::get("numberOfUsers", [AdminController::class, "numberOfUsers"]);
    Route::get("numberOfOutTourists", [AdminController::class, "numberOfOutTourists"]);
    Route::get("numberOfInTourists", [AdminController::class, "numberOfInTourists"]);


    /////////event
    Route::post("addEvent", [EventController::class, "createEvent"]);
    Route::get("viewEvents", [EventController::class, "listEvent"]);
    Route::get("oneEvent/{id}", [EventController::class, "getSingleEvent"]);
    Route::delete("deleteEvent/{id}", [EventController::class, "deleteEvent1"]);
    Route::put("updateEvent/{id}", [EventController::class, "updateEvent"]);
    

    /////////landmark
    Route::post("addLandmark", [LandmarkController::class, "createLandmark"]);
    Route::get("viewLandmarks", [LandmarkController::class, "listLandmark"]);
    Route::get("oneLandmark/{id}", [LandmarkController::class, "getSingleLandmark"]);
    Route::delete("deleteLandmark/{id}", [LandmarkController::class, "deleteLandmark"]);
    Route::put("updateLandmark/{id}", [LandmarkController::class, "updateLandmark"]);
   

    /////////place
    Route::post("createPlace", [PlaceController::class, "createPlace"]);
    Route::get("viewPlaces", [PlaceController::class, "listPlace"]);
    Route::get("onePlace/{id}", [PlaceController::class, "getSinglePlace"]);
    Route::delete("deletePlace/{id}", [PlaceController::class, "deletePlace"]);
    Route::put("updatePlace/{id}", [PlaceController::class, "updatePlace"]);

    /////////Image
    Route::delete("deleteImage/{id}", [ImageController::class, "deleteImage"]);
    

});

/********Tourist Apis********/
Route::post("registerTourist", [TouristController::class, "register"]);
Route::post("loginTourist", [TouristController::class, "login"]);
Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::get("profileTourist", [TouristController::class, "profile"]);
    Route::get("logoutTourist", [TouristController::class, "logout"]);
    Route::put("updateTourist", [TouristController::class, "updateTourist"]);
    Route::delete("deleteTourist", [TouristController::class, "deleteTourist"]);

    /////////event
    Route::get("touristviewEvent", [EventController::class, "listEvent"]);
    Route::get("touristoneEvent/{id}", [EventController::class, "getSingleEvent"]);
    Route::get("searchByNameEvents", [EventController::class, "searchByName"]);
    Route::get("searchByCityEvents", [EventController::class, "searchByCity"]);

    /////////landmark
    Route::get("touristviewLandmark", [LandmarkController::class, "listLandmark"]);
    Route::get("touristoneLandmark/{id}", [LandmarkController::class, "getSingleLandmark"]);
     Route::get("searchByNameLandmarks", [LandmarkController::class, "searchByName"]);
    Route::get("searchByCityLandmarks", [LandmarkController::class, "searchByCity"]);

    /////////place
    Route::get("touristviewPlace", [PlaceController::class, "listPlace"]);
    Route::get("touristonePlace/{id}", [PlaceController::class, "getSinglePlace"]);
    Route::get("searchByNamePlaces", [PlaceController::class, "searchByName"]);
    Route::get("searchByCityPlaces", [PlaceController::class, "searchByCity"]);

    /////////favorite
    Route::post("addFavorite/{id}", [FavoriteController::class, "createFavorite"]);
    Route::get("viewFavorite", [FavoriteController::class, "listFavorite"]);
    Route::get("oneFavorite/{id}", [FavoriteController::class, "getSingleFavorite"]);
    Route::delete("deleteFavorite/{id}", [FavoriteController::class, "deleteFavorite"]);
    Route::get("searchByNameFavorites", [FavoriteController::class, "searchByName"]);
    Route::get("searchByCityFavorites", [FavoriteController::class, "searchByCity"]);

    /////////plan
    Route::post("addPlan", [PlanController::class, "createPlan"]);//
    Route::get("viewPlans", [PlanController::class, "listPlan"]);
    Route::get("onePlan/{id}", [PlanController::class, "getSinglePlan"]);
    Route::delete("deletePlan/{id}", [PlanController::class, "deletePlan"]);
    Route::put("updatePlan/{id}", [PlanController::class, "updatePlan"]);//
    Route::get("searchByNamePlan", [PlanController::class, "searchByName"]);
    Route::get("searchByCityPlan", [PlanController::class, "searchByCity"]);

    /////////rate
    Route::post("addRate", [RateController::class, "createRate"]);
    Route::get("viewRate/{id}", [RateController::class, "listRate"]);
    Route::get("oneRate/{id}", [RateController::class, "getSingleRate"]);
    Route::delete("deleteRate/{id}", [RateController::class, "deleteRate"]);
    Route::put("updateRate/{id}", [RateController::class, "updateRate"]);

    /////////search
    Route::post("addSearch", [SearchController::class, "addToSearch"]);
    Route::get("viewSearch", [SearchController::class, "visitorSearch"]);
    Route::get("oneSearch/{id}", [SearchController::class, "getSingleSearch"]);
    Route::delete("deleteSearch/{id}", [SearchController::class, "deleteSearch"]);
    Route::put("updateSearch/{id}", [SearchController::class, "updateSearch"]);


    

    
});

// ////////place category
// Route::get("viewPlaceCategory", [Places_categoryController::class, "listPlaceCategory"]);
// Route::get("onePlaceCategory/{id}", [Places_categoryController::class, "getSinglePlaceCategory"]);
///////city
Route::get("viewCity", [CityController::class, "listCity"]);
Route::get("oneCity/{id}", [CityController::class, "getSingleCity"]);
///////nationality
Route::get("viewNationality", [NationalityController::class, "listNationality"]);
Route::get("oneNationality/{id}", [NationalityController::class, "getSingleNationality"]);
///////landmark category
Route::get("viewlandmark_category", [CategoryController::class, "listCategory"]);
Route::get("onelandmark_category/{id}", [CategoryController::class, "getSingleCategory"]);
///////landmark type
Route::get("viewLandmark_type", [Landmarks_typeController::class, "listLandmarks_type"]);
Route::get("oneLandmark_type/{id}", [Landmarks_typeController::class, "getSingleLandmarks_type"]);
//////plan type
Route::get("viewPlan_type", [Plan_typeController::class, "listPlan_type"]);
Route::get("onePlan_type/{id}", [Plan_typeController::class, "getSinglePlan_type"]);
//////place category
Route::get("viewPlaces_category", [Places_categoryController::class, "listPlaces_Category"]);
Route::get("onePlaces_category/{id}", [Places_categoryController::class, "getSinglePlaces_Category"]);
//////daysOff type
Route::get("viewDays_off", [Days_offController::class, "listDays_off"]);
Route::get("oneDays_off/{id}", [Days_offController::class, "getSingleDays_off"]);

 /////////Image
 Route::get("viewImages/{id}/{name}", [ImageController::class, "listImages"]);
 Route::get("oneImage/{id}", [ImageController::class, "getSingleImage"]);
// Route::post("uploadImages", [ImageController::class, "upload2"]);