<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductAction extends Component
{
    public $quantity = 1;
    public $productIdd;

    public function mount()
    {
        $this->productIdd = request()->segment(count(request()->segments()));
    }

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$this->productId])) {
            session()->flash('message', 'u already added this');
        } else {
            $cart[$this->productId] = $this->quantity;

            Session::put('cart', $cart);

            session()->flash('message', 'Product added to cart successfully!');
        }
    }

    public function getCart()
    {
        return Session::get('cart', []);
    }
    public function render()
    {
        return view('livewire.product-action' , [
            'cartItems' => $this->getCart(),
        ]);
    }
}
