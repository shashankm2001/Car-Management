<?php

use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) 
{
    return $request->user();
})->middleware('auth:sanctum');

Route::get(uri:'/cars',              action : [CarController :: class , 'index']);  // index method to get all cars
Route::post(uri:'/displayCar',       action : [CarController :: class , 'store']); // store method to add a new car 
Route::patch(uri:'/updateData/{id}', action : [CarController :: class , 'update']); // update the data of a car
Route::get(uri : '/editCar/{id}',    action : [CarController :: class, 'edit']); // edit or check the changes of updated 
Route::delete(  '/delete/{id}', action : [CarController :: class, 'destroy']);// Delete a record
Route::get('show/{id}',         action : [CarController :: class, 'show']);// Show  particular id 
