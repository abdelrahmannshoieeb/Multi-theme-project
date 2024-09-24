<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductAddWishlist extends Component
{
    public $productId;

    public function mount()
    {
        $this->productId = request()->segment(2);
        
        // session()->forget('SkuWishlist');
        // session()->forget('ProductWishlist');
    }
    public function addToWishlist()
    {
        $selectedSkuCodeId = session()->get('selected_sku_code_id');
        if ($selectedSkuCodeId) {
            $skuWishlist = session()->get('SkuWishlist', []);
            if (!in_array($selectedSkuCodeId, $skuWishlist)) {
                $skuWishlist[] = $selectedSkuCodeId;
                session()->put('SkuWishlist', $skuWishlist);
            } else {
                $productWishlist = session()->get('ProductWishlist', []);
                $productWishlist[] = $this->productId;
                session()->put('ProductWishlist', $productWishlist);
            }
            
            // session()->forget('selected_sku_code_id');
        }
    
        /////////////////// Save to DB //////////////////
        $userId = Auth::user()->id;
        $skuWishlist = session()->get('SkuWishlist', []);
        $productWishlist = session()->get('ProductWishlist', []);
    
        foreach ($skuWishlist as $skuId) {
            if (!Wishlist::where('user_id', $userId)->where('sku_id', $skuId)->exists()) {
                Wishlist::create([
                    'user_id' => $userId,
                    'sku_id' => $skuId,
                    'product_id' => null,
                ]);
            }
        }
    
        foreach ($productWishlist as $productId) {
            if (!Wishlist::where('user_id', $userId)->where('product_id', $productId)->exists()) {
                Wishlist::create([
                    'user_id' => $userId,
                    'sku_id' => null,  
                    'product_id' => $productId,
                ]);
            }
        }
    }
    

  
    public function render()
    {
        return view('livewire.product-add-wishlist');
    }
}
