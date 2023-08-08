<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PlaceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// admin routes 
Route::prefix('admin')->middleware('auth:sanctum' , 'isAdmin')->group(function(){

        // optimized routes
        // Route::resource('places', PlaceController::class);
        // detailed routes
        Route::get('places',[PlaceController::class,'index']);
        Route::post('places',[PlaceController::class,'store']);
        Route::get('places/{id}',[PlaceController::class,'show']);
        Route::put('places/{id}',[PlaceController::class,'update']);
        Route::delete('places/{id}',[PlaceController::class,'destroy']);

});


// Public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/places',[PlaceController::class,'index']);
Route::get('/places/{id}',[PlaceController::class,'show']);
Route::get('/places/search/{title}' , [PlaceController::class , 'search']);
