<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LaptopController ;




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
        // Route::resource('laptops', LaptopController::class);


        // detailed routes
        Route::get('laptops',[LaptopController::class,'index']);
        Route::post('laptops',[LaptopController::class,'store']);
        Route::get('laptops/{id}',[LaptopController::class,'show']);
        Route::put('laptops/{id}',[LaptopController::class,'update']);
        Route::delete('laptops/{id}',[LaptopController::class,'destroy']);
});


// public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/laptops',[LaptopController::class,'index']);
Route::get('laptops/{id}',[LaptopController::class,'show']);

