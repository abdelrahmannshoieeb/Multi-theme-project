<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\SkuCode;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartModal extends Component
{
    public $productCart = [];
    public $skucartItems = [];
    public $total = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        // Load product cart items
        $productCart = Session::get('product_cart', []);
        $this->productCart = [];
        $this->total = 0;

        foreach ($productCart as $productId => $quantity) {
            $product = Product::find($productId);

            if ($product) {
                $price = floatval($product->price); // Ensure price is a float
                $quantity = intval($quantity); // Ensure quantity is an integer

                $item = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $price,
                    'quantity' => $quantity,
                    'total' => $price * $quantity, // Calculate total
                    'image' => $product->image,
                ];

                $this->productCart[] = $item;
                $this->total += $item['total'];
            }
        }

        // Load SKU cart items
        $skucart = Session::get('skucart', []);
        $this->skucartItems = [];

        foreach ($skucart as $skuId => $data) {
            $sku = SkuCode::find($skuId);

            if ($sku) {
                $price = floatval($data['price']); // Ensure price is a float
                $quantity = intval($data['quantity']); // Ensure quantity is an integer

                $item = [
                    'id' => $sku->id,
                    'name' => $sku->product->name, // Assuming you have a relation to get product name
                    'price' => $price,
                    'quantity' => $quantity,
                    'total' => $price * $quantity, // Calculate total
                    'image' => $sku->product->image, // Assuming you have a relation to get product image
                    'attributes' => $sku->attribute_list, // Assuming you have this list
                ];

                $this->skucartItems[] = $item;
                $this->total += $item['total'];
            }
        }
    }

    public function removeFromCart($productId)
    {
        // Remove product from cart
        $cart = Session::get('product_cart', []);
        unset($cart[$productId]);
        Session::put('product_cart', $cart);
        $this->loadCart();
    }

    public function removeFromSkuCart($skuId)
    {
        // Remove SKU from cart
        $skucart = Session::get('skucart', []);
        unset($skucart[$skuId]);
        Session::put('skucart', $skucart);
        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.cart-modal');
    }
}



