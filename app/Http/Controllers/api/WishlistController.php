<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToWishlist()
    {
        return response()->json([
            
            "message" => "this is wishlist adding to cart handler",
            "status" => "waiting",
        ]);
    }



    function deleteWishlist (Request $request) {
        return response()->json([
            
            "message" => "this is wishlist delete handler",
            "status" => "waiting",
        ]);
    }

    function retriveWishlist (Request $request) {
        return response()->json([
            
            "message" => "this is wishlist retrive handler",
            "status" => "waiting",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
