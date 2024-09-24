<div class="row">
    <div class="col-lg-8">
        <div class="cart-table-container">
            <table class="table table-cart">
                <thead>
                    <tr>
                        <th class="thumbnail-col"></th>
                        <th class="product-col">Product</th>
                        <th class="price-col">Price</th>
                        <th class="qty-col">Quantity</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cartItems as $item)
                    <tr class="product-row">
                        <td>
                            <figure class="product-image-container">
                                <a href="" class="product-image">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                </a>
                            </figure>
                        </td>
                        <td class="product-col">
                            <h5 class="product-title">
                                <a href="">{{ $item['type'] == 'sku' ? $item['product_name'] : $item['name'] }}
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                </a>
                            </h5>
                            @if ($item['type'] == 'sku')
                            <!-- Display SKU attributes if available -->
                            <div class="product-attributes">

                            </div>
                            @endif
                        </td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>
                            <div class="product-single-qty">
                                <a href="javascript:void(0);" class="mx-3" wire:click="decrement({{ $item['id'] }}, '{{ $item['type'] }}')">-</a>
                                <span class="border quantity">{{ $item['quantity'] }}</span>
                                <a href="javascript:void(0);" class="mx-3" wire:click="increment({{ $item['id'] }}, '{{ $item['type'] }}')">+</a>
                            </div><!-- End .product-single-qty -->
                        </td>
                        <td class="text-right"><span class="subtotal-price">${{ number_format($item['subtotal'], 2) }}</span></td>
                        <td>
                            <a href="#" class="btn-remove icon-cancel" title="Remove Product" wire:click.prevent="removeFromCart({{ $item['id'] }}, '{{ $item['type'] }}')"></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Your cart is empty.</td>
                    </tr>
                    @endforelse
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="6" class="clearfix">
                            <div class="float-left">
                                <div class="cart-discount">
                                    <form wire:submit.prevent="applyCouponCode">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" placeholder="Coupon Code" wire:model="couponCode" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-sm" type="submit" id="deleteBtn">Apply Coupon</button>
                                            </div>
                                        </div>
                                    </form>
                                    @if(session('coupon_applied'))
                                    <button class="btn btn-sm" type="submit" id="deleteBtn" wire:click="resetCoupon">Reset Coupon</button>
                                    @endif

                                </div>
                            </div>
                            @if(!session()->has('cart saved'))
                            <div class="float-right">
                                <button type="submit" class="btn btn-shop btn-update-cart" wire:click="updateCart">
                                    Update Cart
                                </button>
                            </div><!-- End .float-right -->
                            @endif
                      
                        </td>
                    </tr>
                </tfoot>
            </table>

        </div><!-- End .cart-table-container -->
    </div><!-- End .col-lg-8 -->

    <div class="col-lg-4">
        <div class="cart-summary">
            <h3>Cart Total</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Total:</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
                    @if ($amount > 0 && session('coupon_applied') === true)
                    <tr>
                        <td>Discount:</td>
                        <td>-${{ number_format($amount, 2) }}</td>
                    </tr>
                    @endif
                    @if (session('coupon_applied') === true)

                    <tr>
                        <td>Total after coupon:</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div><!-- End .col-lg-4 -->

    @if(session('coupon_applied') == false)
 
    @else
    <script>
        document.getElementById('deleteBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Coupon applied?',
                text: 'Congratulation your coupon aplied successfully!',
                icon: 'success',
                button: "Aww yiss!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('/your/delete/route', {
                        _token: '{{ csrf_token() }}'
                    }).then(response => {
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        );
                    }).catch(error => {
                        Swal.fire(
                            'Error!',
                            'There was a problem apllying the coupon.',
                            'error'
                        );
                    });
                }
            });
        });
    </script>
   
    @endif
    
</div><!-- End .row -->