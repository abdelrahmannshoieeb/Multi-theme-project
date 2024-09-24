<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

    
        return view("porto.cart");

    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $cart = Cart::firstOrCreate(['user_id' => $userId]);

            $skuCart = session('skucart', []);
            $productCart = session('product_cart', []);

            // dd($cart);
         
                foreach ($skuCart as $skuId => $skuItem) {
                    CartItem::Create(
                        [
                            'cart_id' => $cart->id,
                            'sku_id' => $skuId, 
                            'product_id' => null,
                            'qty' => $skuItem['quantity'] ?? 1, // Default quantity to 1 if not set
                        ]
                    );
                

                foreach ($productCart as $productId => $productItem) {
                    CartItem::Create(
                        [
                            'cart_id' => $cart->id,
                            'product_id' => $productId, // Use the correct product_id from session key
                            'sku_id' => null,
                            'qty' => $productItem['quantity'] ?? 1, // Default quantity to 1 if not set
                        ]
                    );
                }
            }
        }


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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
