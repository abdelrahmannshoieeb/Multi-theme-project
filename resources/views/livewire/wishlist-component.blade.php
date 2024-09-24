<div>
<div>
    @foreach ($wishlists as $wishlist)
    <tr class="product-row">
        <td>
            <figure class="product-image-container">
                @if ($wishlist->skuCode && $wishlist->skuCode->id)
                <!-- If skuCode exists -->
                <a href="/product/{{ $wishlist->skuCode->product->id }}" class="product-image">
                    <img src="{{ asset('storage/' . $wishlist->skuCode->product->image) }}" alt="product">
                </a>
                @else
                <!-- Fall back to product if skuCode does not exist -->
                <a href="/product/{{ $wishlist->product->id }}" class="product-image">
                    <img src="{{ asset('storage/' . $wishlist->product->image) }}" alt="product">
                </a>
                @endif
                <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
            </figure>
        </td>
        <td>
            <h5 class="product-title">
                @if ($wishlist->skuCode && $wishlist->skuCode->id)
                <a href="/product/{{ $wishlist->skuCode->product->id }}">{{ $wishlist->skuCode->product->name }}</a>
                @else
                <a href="/product/{{ $wishlist->product->id }}">{{ $wishlist->product->name }}</a>
                @endif
            </h5>
        </td>
        <td class="price-box">
            ${{ $wishlist->skuCode ? $wishlist->skuCode->price : $wishlist->product->price }}
        </td>
        <td>
            <span class="stock-status">{{ $wishlist->skuCode ? $wishlist->skuCode->product->status : $wishlist->product->status }}</span>
        </td>
        <td class="action">
            <a href="/product/{{ $wishlist->skuCode ? $wishlist->skuCode->product->id : $wishlist->product->id }}" class="btn btn-quickview mt-1 mt-md-0" title="Quick View">Quick View</a>
            <button class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                ADD TO CART
            </button>
        </td>
    </tr>
    @endforeach
</div>
</div>
