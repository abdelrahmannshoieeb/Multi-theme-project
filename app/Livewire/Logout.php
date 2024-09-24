<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{

    public function logout()
    {
        Auth::logout();
        session()->forget('selected_sku_code_id');
        session()->forget('SkuWishlist');
        session()->forget('ProductWishlist');
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
