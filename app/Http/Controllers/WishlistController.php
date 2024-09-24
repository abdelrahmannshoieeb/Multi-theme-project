<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SkuCode;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {

        session()->forget('SkuWishlist');
        session()->forget('ProductWishlist');
        $wishlists = Wishlist::with('product', 'user', 'skuCode')->get();
        return view('porto.wishlist' , [
            'wishlists' => $wishlists
        ]);
    }
}
