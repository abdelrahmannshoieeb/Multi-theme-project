<div class="dropdownmenu-wrapper custom-scrollbar">
    <div class="dropdown-cart-header">Shopping Cart</div>
    <!-- End .dropdown-cart-header -->

    <div class="dropdown-cart-products">
        <!-- Product Cart Items -->
        @if (!empty($productCart))
            <h5>Products</h5>
            @foreach ($productCart as $item)
                <div class="product">
                    <div class="product-details">
                        <h4 class="product-title">
                            <a href="#">{{ $item['name'] }}</a>
                        </h4>

                        <span class="cart-product-info">
                            <span class="cart-product-qty">{{ $item['quantity'] }}</span> × ${{ number_format($item['price'], 2) }}
                        </span>
                    </div>
                    <!-- End .product-details -->

                    <figure class="product-image-container">
                        <a href="#" class="product-image">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" width="80" height="80">
                        </a>

                        <a href="#" class="btn-remove" title="Remove Product" wire:click.prevent="removeFromCart({{ $item['id'] }})"><span>×</span></a>
                    </figure>
                </div>
            @endforeach
        @else
            <p>Your product cart is empty.</p>
        @endif

        <!-- SKU Cart Items -->
        @if (!empty($skucartItems))
            <h5>SKU Items</h5>
            @foreach ($skucartItems as $item)
                <div class="product">
                    <div class="product-details">
                        <h4 class="product-title">
                            <a href="#">{{ $item['name'] }}</a>
                        </h4>

                        <span class="cart-product-info">
                            <span class="cart-product-qty">{{ $item['quantity'] }}</span> × ${{ number_format($item['price'], 2) }}
                        </span>

                        <!-- Display SKU Attributes -->
                        <p class="cart-product-attributes">
                            Attributes:
                            @foreach ($item['attributes'] as $attribute)
                                {{ $attribute['name'] }}: {{ $attribute['value'] }} 
                            @endforeach
                        </p>
                    </div>
                    <!-- End .product-details -->

                    <figure class="product-image-container">
                        <a href="#" class="product-image">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" width="80" height="80">
                        </a>

                        <a href="#" class="btn-remove" title="Remove SKU" wire:click.prevent="removeFromSkuCart({{ $item['id'] }})"><span>×</span></a>
                    </figure>
                </div>
            @endforeach
        @else
            <p>Your SKU cart is empty.</p>
        @endif
    </div>
    <!-- End .dropdown-cart-products -->

    <div class="dropdown-cart-total">
        <span>SUBTOTAL:</span>

        <span class="cart-total-price float-right">${{ number_format($total, 2) }}</span>
    </div>
    <!-- End .dropdown-cart-total -->

    <div class="dropdown-cart-action">
        <a href="#" class="btn btn-gray btn-block view-cart">View Cart</a>
        <a href="#" class="btn btn-dark btn-block">Checkout</a>
    </div>
</div>
