<?php

namespace App\Livewire;

use App\Models\SkuCode;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class VariationPrice extends Component
{
    public $skuCodeId;
    public $price;

protected $listeners = ['skuSelected' => 'updateSkuCodeId'];

    public function mount()
    {
        $this->skuCodeId = Session::get('selected_sku_code_id');
        $this->loadPrice();
    }

    public function loadPrice()
    {
        if ($this->skuCodeId) {
            $skuCode = SkuCode::find($this->skuCodeId);
            $this->price = $skuCode ? $skuCode->price : 'Price not available';
        }
    }


   public function updateSkuCodeId($skuCodeId)
{
    $this->skuCodeId = $skuCodeId;
    $this->loadPrice();
}
    
    public function render()
    {
       
        return view('livewire.variation-price');
    }
}
