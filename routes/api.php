<?php

use App\Http\Controllers\API\RouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('product/list',[RouteController::class,'productList']);
Route::get('category/list',[RouteController::class,'categoryList']);
// localhost:8000/webTesting
//Post
Route::post('category/create',[RouteController::class,'categoryCreate']);
Route::post('contact/create',[RouteController::class,'contactCreate']);
// Route::post('category/delete',[RouteController::class,'categoryDelete']);
Route::get('category/delete/{id}',[RouteController::class,'categoryDelete']);
Route::post('category/details',[RouteController::class,'categoryDetails']);
Route::post('category/update',[RouteController::class,'categoryUpdate']);




