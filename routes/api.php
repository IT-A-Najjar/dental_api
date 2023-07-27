<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IllnessesController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PateintsController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[UsersController::class,'login']);
Route::get('logout',[UsersController::class,'logout']);
//Illnesses
Route::get('illnesses',[IllnessesController::class,'index']);
Route::get('illnesses/{id}',[IllnessesController::class,'show']);
Route::post('illnesses',[IllnessesController::class,'store']);
Route::post('illnesses/{id}',[IllnessesController::class,'update']);
Route::delete('illnesses/{id}',[IllnessesController::class,'destroy']);
//Consultation
Route::get('consultation',[ConsultationController::class,'index']);
Route::get('consultation/{id}',[ConsultationController::class,'show']);
Route::post('consultation',[ConsultationController::class,'store']);
Route::post('consultation/{id}',[ConsultationController::class,'update']);
Route::delete('consultation/{id}',[ConsultationController::class,'destroy']);
//Comment
Route::get('comment',[CommentController::class,'index']);
Route::get('comment/{id}',[CommentController::class,'show']);
Route::post('comment',[CommentController::class,'store']);
Route::post('comment/{id}',[CommentController::class,'update']);
Route::delete('comment/{id}',[CommentController::class,'destroy']);
//Users
Route::get('users',[UsersController::class,'index']);
Route::get('users/{id}',[UsersController::class,'show']);
Route::post('users',[UsersController::class,'store']);
Route::post('users/{id}',[UsersController::class,'update']);
Route::delete('users/{id}',[UsersController::class,'destroy']);
//Business
Route::get('business',[BusinessController::class,'index']);
Route::get('business/{id}',[BusinessController::class,'show']);
Route::post('business',[BusinessController::class,'store']);
Route::post('business/{id}',[BusinessController::class,'update']);
Route::delete('business/{id}',[BusinessController::class,'destroy']);
//Pateints
Route::get('pateints',[PateintsController::class,'index']);
Route::get('pateints/{id}',[PateintsController::class,'show']);
Route::post('pateints',[PateintsController::class,'store']);
Route::post('pateints/{id}',[PateintsController::class,'update']);
Route::delete('pateints/{id}',[PateintsController::class,'destroy']);
//States
Route::get('state',[StatesController::class,'index']);
Route::get('state/{id}',[StatesController::class,'show']);
Route::post('state',[StatesController::class,'store']);
Route::post('state/{id}',[StatesController::class,'update']);
Route::delete('state/{id}',[StatesController::class,'destroy']);
//Event
Route::get('event',[EventsController::class,'index']);
Route::get('event/{id}',[EventsController::class,'show']);
Route::post('event',[EventsController::class,'store']);
Route::post('event/{id}',[EventsController::class,'update']);
Route::delete('event/{id}',[EventsController::class,'destroy']);