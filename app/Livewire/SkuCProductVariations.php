<?php

namespace App\Livewire;

use Spatie\Color\Hex;

use App\Models\Product;
use App\Models\SkuCode;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SkuCProductVariations extends Component
{
    public $productId;
    public $product;
    public $skus;
    public $tags;
    public $combinedVariations = [];
    public $selectedSkuCodeId = null;
    public $selectedPrice = null;
    public $quantity = 1;
    public $productIdd;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findOrFail($productId);
        $this->skus = SkuCode::where('product_id', $productId)->get();
        $this->tags = Product::where('tags', $productId)->get();
        $this->selectedPrice = $this->product->price;
        session()->forget('selected_sku_code_id');
        $this->combineVariations();
    }

    private function combineVariations()
    {
        foreach ($this->skus as $sku) {
            $variations = $sku->attribute_list;
            $variationString = '';
            $color = '';

            foreach ($variations as $variation) {
                if ($variation['name'] === 'color') {
                    $color = $this->convertRgbToColorName($variation['value']);
                } else {
                    $variationString .= $variation['name'] . ': ' . $variation['value'] . ' | ';
                }
            }

            $this->combinedVariations[] = [
                'id' => $sku->id,
                'string' => rtrim($variationString, ' | ') . ($color ? ' | Color: ' . $color : ''),
                'color' => $color,
                'price' => $sku->price,
            ];
        }
    }

    private function convertRgbToColorName($hexCode)
    {
        try {
            $hex = Hex::fromString($hexCode);
            $rgb = $hex->toRgb();
            $r = $rgb->red();
            $g = $rgb->green();
            $b = $rgb->blue();

            $response = file_get_contents("https://www.thecolorapi.com/id?rgb=$r,$g,$b");
            $data = json_decode($response, true);

            return $data['name']['value'] ?? 'Unknown';
        } catch (\Exception $e) {
            return 'Unknown';
        }
    }

    public function selectSku($skuCodeId)
    {
        $this->selectedSkuCodeId = $skuCodeId;
        $sku = SkuCode::find($skuCodeId);

        if ($sku) {
            $this->selectedPrice = $sku->price;
            Session::put('selected_sku_code_id', $skuCodeId);
        }
    }

    public function resetPrice()
    {
        $this->selectedPrice = $this->product->price;
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
        $productCart = Session::get('product_cart', []);
        $skuCart = Session::get('skucart', []);
        
        if ($this->selectedSkuCodeId) {
            // Add SKU-specific information to the SKU cart
            $skuCode = SkuCode::find($this->selectedSkuCodeId);

            if ($skuCode) {
                $skuCart[$this->selectedSkuCodeId] = [
                    'sku_id' => $this->selectedSkuCodeId,
                    'price' => $skuCode->price,
                    'quantity' => $this->quantity,
                    'attributes' => $skuCode->attribute_list, // assuming attribute_list is an array
                ];

                Session::put('skucart', $skuCart);
                session()->flash('message', 'SKU added to cart successfully!');
            } else {
                session()->flash('message', 'Invalid SKU!');
            }
        } else {
            // Add base product information to the product cart
            if (isset($productCart[$this->productId])) {
                $productCart[$this->productId]['quantity'] += $this->quantity;
            } else {
                $productCart[$this->productId] = [
                    'product_id' => $this->productId,
                    'price' => $this->selectedPrice,
                    'quantity' => $this->quantity,
                ];
            }

            Session::put('product_cart', $productCart);
            session()->flash('message', 'Product added to cart successfully!');
        }
        Session::forget(' selected_sku_code_id');

    }

    public function render()
    {
        return view('livewire.sku-c-product-variations', [
            'product' => $this->product,
            'combinedVariations' => $this->combinedVariations,
            'selectedPrice' => $this->selectedPrice,
        ]);
    }
}
