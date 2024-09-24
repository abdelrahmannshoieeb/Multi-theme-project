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
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="product-row">
                        <td>
                            <figure class="product-image-container">
                                <a href="" class="product-image">
                                    <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>">
                                </a>
                            </figure>
                        </td>
                        <td class="product-col">
                            <h5 class="product-title">
                                <a href=""><?php echo e($item['type'] == 'sku' ? $item['product_name'] : $item['name']); ?>

                                    <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>">
                                </a>
                            </h5>
                            <!--[if BLOCK]><![endif]--><?php if($item['type'] == 'sku'): ?>
                            <!-- Display SKU attributes if available -->
                            <div class="product-attributes">

                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td>$<?php echo e(number_format($item['price'], 2)); ?></td>
                        <td>
                            <div class="product-single-qty">
                                <a href="javascript:void(0);" class="mx-3" wire:click="decrement(<?php echo e($item['id']); ?>, '<?php echo e($item['type']); ?>')">-</a>
                                <span class="border quantity"><?php echo e($item['quantity']); ?></span>
                                <a href="javascript:void(0);" class="mx-3" wire:click="increment(<?php echo e($item['id']); ?>, '<?php echo e($item['type']); ?>')">+</a>
                            </div><!-- End .product-single-qty -->
                        </td>
                        <td class="text-right"><span class="subtotal-price">$<?php echo e(number_format($item['subtotal'], 2)); ?></span></td>
                        <td>
                            <a href="#" class="btn-remove icon-cancel" title="Remove Product" wire:click.prevent="removeFromCart(<?php echo e($item['id']); ?>, '<?php echo e($item['type']); ?>')"></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">Your cart is empty.</td>
                    </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                                    <!--[if BLOCK]><![endif]--><?php if(session('coupon_applied')): ?>
                                    <button class="btn btn-sm" type="submit" id="deleteBtn" wire:click="resetCoupon">Reset Coupon</button>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                </div>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if(!session()->has('cart saved')): ?>
                            <div class="float-right">
                                <button type="submit" class="btn btn-shop btn-update-cart" wire:click="updateCart">
                                    Update Cart
                                </button>
                            </div><!-- End .float-right -->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                      
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
                        <td>$<?php echo e(number_format($subtotal, 2)); ?></td>
                    </tr>
                    <!--[if BLOCK]><![endif]--><?php if($amount > 0 && session('coupon_applied') === true): ?>
                    <tr>
                        <td>Discount:</td>
                        <td>-$<?php echo e(number_format($amount, 2)); ?></td>
                    </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if(session('coupon_applied') === true): ?>

                    <tr>
                        <td>Total after coupon:</td>
                        <td>$<?php echo e(number_format($total, 2)); ?></td>
                    </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    </div><!-- End .col-lg-4 -->

    <?php if(session('coupon_applied') == false): ?>
 
    <?php else: ?>
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
                        _token: '<?php echo e(csrf_token()); ?>'
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
   
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
</div><!-- End .row --><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/livewire/cart-page.blade.php ENDPATH**/ ?>