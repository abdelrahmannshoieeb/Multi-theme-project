<div class="dropdownmenu-wrapper custom-scrollbar">
    <div class="dropdown-cart-header">Shopping Cart</div>
    <!-- End .dropdown-cart-header -->

    <div class="dropdown-cart-products">
        <!-- Product Cart Items -->
        <!--[if BLOCK]><![endif]--><?php if(!empty($productCart)): ?>
            <h5>Products</h5>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $productCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product">
                    <div class="product-details">
                        <h4 class="product-title">
                            <a href="#"><?php echo e($item['name']); ?></a>
                        </h4>

                        <span class="cart-product-info">
                            <span class="cart-product-qty"><?php echo e($item['quantity']); ?></span> × $<?php echo e(number_format($item['price'], 2)); ?>

                        </span>
                    </div>
                    <!-- End .product-details -->

                    <figure class="product-image-container">
                        <a href="#" class="product-image">
                            <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" width="80" height="80">
                        </a>

                        <a href="#" class="btn-remove" title="Remove Product" wire:click.prevent="removeFromCart(<?php echo e($item['id']); ?>)"><span>×</span></a>
                    </figure>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
            <p>Your product cart is empty.</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- SKU Cart Items -->
        <!--[if BLOCK]><![endif]--><?php if(!empty($skucartItems)): ?>
            <h5>SKU Items</h5>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $skucartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product">
                    <div class="product-details">
                        <h4 class="product-title">
                            <a href="#"><?php echo e($item['name']); ?></a>
                        </h4>

                        <span class="cart-product-info">
                            <span class="cart-product-qty"><?php echo e($item['quantity']); ?></span> × $<?php echo e(number_format($item['price'], 2)); ?>

                        </span>

                        <!-- Display SKU Attributes -->
                        <p class="cart-product-attributes">
                            Attributes:
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $item['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($attribute['name']); ?>: <?php echo e($attribute['value']); ?> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </p>
                    </div>
                    <!-- End .product-details -->

                    <figure class="product-image-container">
                        <a href="#" class="product-image">
                            <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" width="80" height="80">
                        </a>

                        <a href="#" class="btn-remove" title="Remove SKU" wire:click.prevent="removeFromSkuCart(<?php echo e($item['id']); ?>)"><span>×</span></a>
                    </figure>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
            <p>Your SKU cart is empty.</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <!-- End .dropdown-cart-products -->

    <div class="dropdown-cart-total">
        <span>SUBTOTAL:</span>

        <span class="cart-total-price float-right">$<?php echo e(number_format($total, 2)); ?></span>
    </div>
    <!-- End .dropdown-cart-total -->

    <div class="dropdown-cart-action">
        <a href="#" class="btn btn-gray btn-block view-cart">View Cart</a>
        <a href="#" class="btn btn-dark btn-block">Checkout</a>
    </div>
</div>
<?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/livewire/cart-modal.blade.php ENDPATH**/ ?>