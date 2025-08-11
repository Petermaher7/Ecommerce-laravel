<?php

use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userAthentication;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// usersAthentication
Route::post('/register',userAthentication::class.'@register');
Route::post('/login',userAthentication::class.'@login');
Route::delete('/logout',userAthentication::class.'@logout')->middleware('auth:sanctum');

// usersRoutes 
Route::get('/getAllUsers',UserController::class.'@getAllUsers')->middleware('auth:sanctum');
Route::get('/getUser/{id}',UserController::class.'@getUser')->middleware('auth:sanctum');
Route::put('/updateUser/{id}',UserController::class.'@updateUser')->middleware('auth:sanctum');
Route::delete('/deleteUser/{id}',UserController::class.'@deleteUser')->middleware('auth:sanctum');

// productsRoutes
Route::post('/addProduct',productController::class.'@addProduct')->middleware('auth:sanctum');
Route::get('/getAllProducts',productController::class.'@getAllProducts')->middleware('auth:sanctum');
Route::get('/getProduct/{id}',productController::class.'@getProduct')->middleware('auth:sanctum');
Route::put('/updateProduct/{id}',productController::class.'@updateProduct')->middleware('auth:sanctum');
Route::delete('/deleteProduct/{id}',productController::class.'@deleteProduct')->middleware('auth:sanctum');

// ordersRoutes
Route::post('/addOrder',orderController::class.'@addOrder')->middleware('auth:sanctum');
Route::get('/getAllOrders',orderController::class.'@getAllOrders')->middleware('auth:sanctum');
Route::get('/getOrder/{id}',orderController::class.'@getOrder')->middleware('auth:sanctum');
Route::put('/updateOrder/{id}',orderController::class.'@updateOrder')->middleware('auth:sanctum');
Route::delete('/deleteOrder/{id}',orderController::class.'@deleteOrder')->middleware('auth:sanctum');