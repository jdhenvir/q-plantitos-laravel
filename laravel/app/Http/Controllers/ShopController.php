<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop;

class ShopController extends Controller
{
    //
    function getProducts(){
        $shop = Shop::all();
        if($shop->count() > 0){
            return json_encode($shop);
        }else{
            return response()->json(['message' => 'Plant not found'], 404);
        }
    }

    function getProductbyID($id){
        $plants = Shop::find($id);
        return json_encode($plants);
    }
}
