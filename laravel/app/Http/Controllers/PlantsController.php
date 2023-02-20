<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Plants;

class PlantsController extends Controller
{
    //
    function getPlants(){
        $plants = Plants::all();
        if($plants->count() > 0){
            return json_encode($plants);
        }else{
            return response()->json(['message' => 'Plant not found'], 404);
        }
    }

    function getPlantbyID($id){
        $plants = Plants::find($id);
        return json_encode($plants);
    }

    function getPlantbyName($name){
        $plants = Plants::where('plantname', '=' , $name)->get();
        if($plants->count() > 0){
            return json_encode($plants);
        }else{
            return response()->json(['message' => 'Plant not found'], 404);
        }
    }

    function addPlant(Request $request){
        $plants = new Plants;
        $plants->plantname = $request->plantname;
        $plants->description = $request->description;
        $plants->category = $request->category;
        $plants->stocks = $request->stocks;
        $plants->price = $request->price;
        $plants->img = $request->img;
        if($plants->save()){
            return ['Message' => 'Plant added'];
        }else{
            return ['Message' => 'Not saved'];
        }
    }
}
