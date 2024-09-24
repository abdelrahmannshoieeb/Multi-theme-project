<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Retrieve the product with its SKU codes
        $product = Product::with('skuCodes')->where('id', $id)->firstOrFail();

        // Get attribute list unique
        $attributeList = $product->skuCodes->flatMap(function ($skuCode) {
            return $skuCode->attribute_list;
        })
            ->groupBy('name')
            ->map(function ($attributes) {
                return [
                    'name' => $attributes->first()['name'],
                    'value' => $attributes->pluck('value')->unique()->implode(',')
                ];
            });

        // Retrieve other products
        $productsInSameCategory = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();

        $best_selling_product = Product::all();
        $latest_product = Product::all();
        $top_rated_product = Product::all();
        $featured_products = Product::all();
        $new_arrival = Product::all();
        $tags = explode(',', $product->tags);

        // Return API response in JSON format
        return response()->json([
            "product" => $product,
            "tags" => $tags,
            "gallery" => $product->gallery,
            "thumbnail" => $product->gallery,
            'attribute_list' => $attributeList,
            'products_in_same_category' => $productsInSameCategory,
            "best_selling_product" => $best_selling_product,
            "latest_product" => $latest_product,
            "top_rated_product" => $top_rated_product,
            "featured_products" => $featured_products,
            "new_arrival" => $new_arrival,
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
