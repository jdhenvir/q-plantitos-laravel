<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShopController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// users api
Route::get('/users',[UsersController::class,'getUsers']);
Route::get('/user/{id}',[UsersController::class,'getUserbyid']);
Route::post('/user/create/', [UsersController::class, 'createUser']);
Route::post('/user/auth/', [UsersController::class, 'authenthecate']);

//plants api
Route::get('/shop',[ShopController::class,'getProducts']);
Route::get('/shop/{id}',[ShopController::class,'getProductbyID']);
// Route::get('/plant/{name}',[PlantsController::class,'getPlantbyName']);
// Route::post('/plant/add', [PlantsController::class, 'addPlant']);
// Route::put('/plant/update/{id}', [PlantsController::class, 'updatePlant']);
