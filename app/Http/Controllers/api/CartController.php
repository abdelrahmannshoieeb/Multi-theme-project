<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function addToCart()
    {
        return response()->json([
            
            "message" => "this is cart adding to cart handler",
            "status" => "waiting",
        ]);
    }



    function deleteCart (Request $request) {
        return response()->json([
            
            "message" => "this is cart delete handler",
            "status" => "waiting",
        ]);
    }

    function retriveCart (Request $request) {
        return response()->json([
            
            "message" => "this is cart retrive handler",
            "status" => "waiting",
        ]);
    }
    
    public function store(Request $request)
    {
        //
    }

 
    public function show(string $id)
    {
        
    }

  
    public function update(Request $request, string $id)
    {
       
    }

    
    public function destroy(string $id)
    {

    }
}
