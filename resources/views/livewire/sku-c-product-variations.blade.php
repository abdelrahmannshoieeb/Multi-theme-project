<div>
    <div class="ratings-container">
        <div class="product-ratings">
            <span class="ratings" style="width:{{ $product->stars / 5 * 100 }}%"></span>
            <!-- End .ratings -->
            <span class="tooltiptext tooltip-top"></span>
        </div>
        <!-- End .product-ratings -->

        <a href="#" class="rating-link">( 6 Reviews )</a>
    </div>
    <div class="variation-price">
        <h3>${{ number_format($selectedPrice ?? $product->price) }}</h3>
    </div>
    <div>
        <h3>{{ $product->name }}</h3>
    </div>

    <hr class="short-divider">


    <div class="product-desc">
        <p>
            {{$product->description}}
        </p>
    </div>
    <!-- End .product-desc -->

    <ul class="single-info-list">
        <!---->
        <li>
            SKU:
            <strong>{{ $product->parent_sku }}</strong>
        </li>

        <li>
            CATEGORY:
            <strong>
                <a href="#" class="product-category">{{ $product->category->name }}</a>
            </strong>
        </li>

        <li>
            TAGs:
            @foreach ($tags as $tag )
            <strong><a href="#" class="product-category">{{$tag}}</a></strong>,
            @endforeach
        </li>
    </ul>

    <div class="product-details" id="product-details">
        <div>
            <label>Variations:</label>
            <ul class="config-size-list" id="variation-list">
                @foreach($combinedVariations as $variation)
                <li>
                    <a
                        href="javascript:;"
                        class="d-flex align-items-center justify-content-center"
                        wire:click="selectSku({{ $variation['id'] }})">
                        {{ $variation['color'] }}
                        {{ $variation['string'] }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    
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

    <div wire:click="resetPrice" style="height: 100vh; width: 100vw; position: absolute; top: 0; left: 0; z-index: -1;"></div>
</div>