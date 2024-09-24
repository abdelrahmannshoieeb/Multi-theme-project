<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Banners
        $main_banners = Banner::where("isHome", 1)->get();
        $sub_banners = Banner::where("isHomeSub", 1)->get();


        // Featured Products 
        $featured_products = Product::all();
        $new_arrival = Product::all();

        $categories = Category::whereHas('products')->get();
        $brands = Brand::limit(5)->get();


        //session data
        //////////////////////////////////////////
        $Category = Category::all();
        Session::put('Category', $Category);
        $Product = Product::all();
        Session::put('product', $Product);
        ///////////////////////////////////////////
        
        // P
        $latest_product = Product::all();
        $top_rated_product = Product::all();
        $best_selling_product = Product::all();
        
        $sessionData = Session::all();
        dd($sessionData);
        $user = Auth::user();  
        // dd($user); 

        return view(
            "porto.home",
            [
                "main_banners" => $main_banners,
                "sub_banners" => $sub_banners,
                "featured_products" => $featured_products,
                "new_arrival" => $new_arrival,
                "categories" => $categories,
                "brands" => $brands,
                "best_selling_product" => $best_selling_product,
                "latest_product" => $latest_product,
                "top_rated_product" => $top_rated_product,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
