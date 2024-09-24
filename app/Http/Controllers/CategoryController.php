<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $best_selling_product = Product::all();
        $products = Product::where('category_id', $request->id)->paginate(10);
        $categories = Category::paginate(10);
        $category = Category::where("id", $request->id)->with('banner')->first();
        // dd($category) ;
        $featured_products = Product::all();


        //filters
        ///sort
        $query = Product::where('category_id', $request->id);
        $sort = $request->input('orderby', 'price');
        switch ($sort) {
            case 'price':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc'); 
        }
    
        // dd($sort);

        return view("
        porto.category",
    [
        "products" => $products,
        "category" => $category,
        "categories" => $categories,
        "featured_products" => $featured_products,
        "sort" => $sort,
        "best_selling_product" => $best_selling_product,
    ]);
    }

    public function sort(Request $request)
    {
        $sortType = $request->input('sort'); 
        
        $query = Product::query();
        switch ($sortType) {
            case 'low_to_high':
                $query->orderBy('price', 'asc');
                break;
    
            case 'high_to_low':
                $query->orderBy('price', 'desc');
                break;
    
            case 'date':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        $products = $query->get();
        return response()->json(["products"=>$products , "sortType"=>$sortType]);
    }


    public function  PriceRange(Request $request)
    {
        $range = $request->input('range');
        dd($range);
        // $filterByRangeProducts = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        return ;
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
