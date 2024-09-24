<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
     public function index($id) 
     {
         // Retrieve the best-selling products
         $best_selling_product = Product::all();
     
         // Retrieve products based on the category ID with pagination
         $productsQuery = Product::where('category_id', $id);
     
         // Apply sorting
         $sort = request()->input('orderby', 'price');
         switch ($sort) {
             case 'price':
                 $productsQuery->orderBy('price', 'asc');
                 break;
             case 'price-desc':
                 $productsQuery->orderBy('price', 'desc');
                 break;
             default:
                 $productsQuery->orderBy('created_at', 'desc'); 
         }
     
         $products = $productsQuery->paginate(10);
     
         // Retrieve categories with pagination
         $categories = Category::paginate(10);
     
         // Retrieve the specific category by ID with its associated banner
         $category = Category::where("id", $id)->with('banner')->first();
     
         // Retrieve featured products
         $featured_products = Product::all();
     
         // Return API response in JSON format
         return response()->json([
             "products" => $products,
             "category" => $category,
             "categories" => $categories,
             "featured_products" => $featured_products,
             "sort" => $sort,
             "best_selling_product" => $best_selling_product,
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
