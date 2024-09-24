<div>
    <span class="product-price" wire:poll.500ms>
        @if($price)
            ${{ $price }}
        @else
            Price not available
        @endif
    </span>
</div>
