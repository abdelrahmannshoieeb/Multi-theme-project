
<div class="dropdownmenu-wrapper custom-scrollbar" >
    <div class="product-action">
        <div class="price-box product-filtered-price">
            <del class="old-price"><span>$286.00</span></del>
            <span class="product-price">$245.00</span>
        </div>

        <div class="product-single-qty">
            <div class="col">
                <a href="javascript:void(0);" class="mx-3" wire:click="decrement">-</a>
                <span class="border quantity">{{ $quantity }}</span>
                <a href="javascript:void(0);" class="mx-3" wire:click="increment">+</a>
            </div>
        </div>
        <!-- End .product-single-qty -->

        <a href="javascript:void(0);" class="btn btn-dark add-cart mr-2" wire:click="addToCart" title="Add to Cart">Add to Cart</a>

        @if (session()->has('message'))
            <div class="alert alert-success mt-2">
                {{ session('message') }}
            </div>
        @endif

        <div class="cart-contents mt-4">
        <h5>Cart</h5>
        @if (!empty($cartItems))
            <ul>
                @foreach ($cartItems as $productId => $qty)
                    <li>Product id {{ $productId }} | Quantity: {{ $qty }}</li>
                @endforeach
            </ul>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
    </div>
</div>
