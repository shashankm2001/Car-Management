<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // This uses get method 
    public function index()  // Get 
    {
        return  response()->json( Car::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->json(
        [
                'message'=> 'Display the form for creating a new car',
                'expected Fields' => 'name, year, brand ,color'
        ],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Post 
    {


        $validatedData = $request->validate(
        [
            'name'=> 'required|string|max:255',
            'brand'=> 'required|string|max:255',
            'color'=> 'required|string|max:100',
            'year'=> 'required|integer' 
        ]);

        $carData = Car::create($validatedData);       

        return response()->json( [ 
            'Message' => "Car added successfully " , 
            'Data' => $carData], 
            201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $carVal = Car::find($id);

        if(!$carVal)
        {
            return response()->json(
                [
                    'message' =>' Car not found'

                ],404);
        }
        return response()->json(
                [
                    'message' => 'Car Found',
                    'data' => $carVal,

                ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //php artisan install:api

        $car = Car::find($id);

        if(!$car)
        {
            return response() ->json(
         [
               'message ' => 'Car not found '
         ],404);
        }

        return response() ->json 
        ([
            'message' => 'Car edited successfully',
            'data' => $car,
        ],200);

    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id) // Patch 
    {
        //

        $car = Car::find($id);

        if(!$car)
        {
            return  response()->json(
                data: 
                [
                    'message'=>'Car Not found'
                    
                ],status: 404
            );
        }

        $validateData = $request->validate(
            
            [
                'name' =>'sometimes|string|max :255',
                'brand'=>'sometimes | string | max: 255 ',
                'color' =>'sometimes| string | max :50',
                'year' => 'sometimes | integer', 
            ]);

          $car->update($validateData);
          
          
          return response()->json(
            [
                'message' =>'Car updated successfully',
                'data' =>$car 
            ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        if(!$car)
        {
            return response() ->json(
                [
                    'message' => 'Data not present  '
                ],404);
        }

        $car -> delete();
        return response() ->json(
            ['message' =>'Car deleted Successfully'
        ],200);

    }
}
