<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistComponent extends Component
{
    public $wishlists;

public function mount()
{
    $user = Auth::user();

    $this->wishlists = Wishlist::with('product', 'user', 'skuCode')
    ->where('user_id', $user->id)
    ->get();

}

    public function render()
    {
        return view('livewire.wishlist-component' , [
            'wishlists' => $this->wishlists
        ]);
    }
}


