<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// register user
Route::post('/register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
// Protected Routes
Route::middleware('auth:sanctum')->get('/students',[StudentController::class,'index']);
 
Route::middleware(['auth:sanctum'])->group(function(){
Route::apiResource('student',StudentController::class);
Route::post('/store-students',[StudentController::class,'store']);
Route::get('/students',[StudentController::class,'index']);
Route::get('/student/{id}',[StudentController::class,'show']);
Route::put('/student/{id}',[StudentController::class,'update']);
Route::delete('/student/{id}',[StudentController::class,'destroy']);
Route::get('/student/search/{city}',[StudentController::class,'search']);
Route::post('logout',[UserController::class,'logout']);
});
// Public Routes
// Route::post('/store-students',[StudentController::class,'store']);
// Route::get('/students',[StudentController::class,'index']);
// Route::get('/student/{id}',[StudentController::class,'show']);
// Route::put('/student/{id}',[StudentController::class,'update']);
// Route::delete('/student/{id}',[StudentController::class,'destroy']);
// Route::get('/student/search/{city}',[StudentController::class,'search']);