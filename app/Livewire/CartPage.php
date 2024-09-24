<?php

namespace App\Livewire;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\SkuCode;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartPage extends Component
{
    public $cartItems = [];
    public $subtotal = 0;
    public $couponCode = '';
    public $amount = 0;
    public $couponMessageHandle = "Your coupon is not valid";

    public function mount()
    
    {
        session()->flush();
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = [];
        $this->subtotal = 0;

        $productCart = Session::get('product_cart', []);
        foreach ($productCart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $price = floatval($product->price);
                $quantity = intval($quantity);
                $productSubtotal = $price * $quantity;

                $this->cartItems[] = [
                    'type' => 'product',
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $price,
                    'quantity' => $quantity,
                    'subtotal' => $productSubtotal,
                    'image' => $product->image,
                ];
                $this->subtotal += $productSubtotal;
            }
        }

        $skuCart = Session::get('skucart', []);
        foreach ($skuCart as $skuId => $skuData) {
            $sku = SkuCode::find($skuId);
            if ($sku) {
                $price = floatval($sku->price);
                $quantity = intval($skuData['quantity']);
                $skuSubtotal = $price * $quantity;

                $product = Product::find($sku->product_id);
                $productName = $product ? $product->name : 'Unknown Product';

                $this->cartItems[] = [
                    'type' => 'sku',
                    'id' => $sku->id,
                    'name' => $sku->name,
                    'product_name' => $productName,
                    'price' => $price,
                    'quantity' => $quantity,
                    'subtotal' => $skuSubtotal,
                    'image' => $sku->image,
                    'attributes' => $sku->attribute_list,
                ];
                $this->subtotal += $skuSubtotal;
            }
        }

          if (!session()->has('total_with_discount')) {
            session()->put('total_with_discount', $this->subtotal);
        }


    }

    public function couponCode()
    {
        if (session('coupon_applied') === true) {
            return;
        } else {
            if ($this->couponCode) {
                $coupon = Coupon::where('coupon', $this->couponCode)->first();
                if ($coupon) {
                    $this->amount = $coupon->amount;
                    session()->put('total_with_discount', $this->subtotal - $this->amount);
                    session()->put('coupon_applied', true);
                    $coupon->increment('used_count');
                } else {
                    $this->couponMessageHandle = "Your coupon is not valid";
                }
            }
        }
    }

    public function resetCoupon()
    {
        session()->put('coupon_applied', false);
        session()->put('total_with_discount', $this->subtotal);
    }

    public function increment($id, $type)
    {
        if ($type === 'product') {
            $cart = Session::get('product_cart', []);
            if (isset($cart[$id])) {
                $cart[$id] = intval($cart[$id]) + 1;
            } else {
                $cart[$id] = 1;
            }
            Session::put('product_cart', $cart);
        } elseif ($type === 'sku') {
            $cart = Session::get('skucart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = intval($cart[$id]['quantity']) + 1;
            } else {
                $cart[$id] = ['quantity' => 1];
            }
            Session::put('skucart', $cart);
        }
        $this->loadCart(); 
    }

    public function decrement($id, $type)
    {
        if ($type === 'product') {
            $cart = Session::get('product_cart', []);
            if (isset($cart[$id]) && $cart[$id] > 1) {
                $cart[$id] = intval($cart[$id]) - 1;
            } else {
                unset($cart[$id]);
            }
            Session::put('product_cart', $cart);
        } elseif ($type === 'sku') {
            $cart = Session::get('skucart', []);
            if (isset($cart[$id]['quantity']) && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] = intval($cart[$id]['quantity']) - 1;
            } else {
                unset($cart[$id]);
            }
            Session::put('skucart', $cart);
        }
        $this->loadCart(); 
    }

    public function removeFromCart($id, $type)
    {
        if ($type === 'product') {
            $cart = Session::get('product_cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
            Session::put('product_cart', $cart);
        } elseif ($type === 'sku') {
            $cart = Session::get('skucart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
            Session::put('skucart', $cart);
        }
        $this->loadCart(); // Update cart and recalculate totals
    }

    public function applyCouponCode()
    {


        $this->couponCode(); 
        $this->loadCart(); 
    }

    public function render()
    {
        $total = session('total_with_discount', $this->subtotal - $this->amount);
        return view('livewire.cart-page', ['total' => $total]);
    }
}




