<div>
    <div class="ratings-container">
        <div class="product-ratings">
            <span class="ratings" style="width:<?php echo e($product->stars / 5 * 100); ?>%"></span>
            <!-- End .ratings -->
            <span class="tooltiptext tooltip-top"></span>
        </div>
        <!-- End .product-ratings -->

        <a href="#" class="rating-link">( 6 Reviews )</a>
    </div>
    <div class="variation-price">
        <h3>$<?php echo e(number_format($selectedPrice ?? $product->price)); ?></h3>
    </div>
    <div>
        <h3><?php echo e($product->name); ?></h3>
    </div>

    <hr class="short-divider">


    <div class="product-desc">
        <p>
            <?php echo e($product->description); ?>

        </p>
    </div>
    <!-- End .product-desc -->

    <ul class="single-info-list">
        <!---->
        <li>
            SKU:
            <strong><?php echo e($product->parent_sku); ?></strong>
        </li>

        <li>
            CATEGORY:
            <strong>
                <a href="#" class="product-category"><?php echo e($product->category->name); ?></a>
            </strong>
        </li>

        <li>
            TAGs:
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <strong><a href="#" class="product-category"><?php echo e($tag); ?></a></strong>,
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </li>
    </ul>

    <div class="product-details" id="product-details">
        <div>
            <label>Variations:</label>
            <ul class="config-size-list" id="variation-list">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $combinedVariations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a
                        href="javascript:;"
                        class="d-flex align-items-center justify-content-center"
                        wire:click="selectSku(<?php echo e($variation['id']); ?>)">
                        <?php echo e($variation['color']); ?>

                        <?php echo e($variation['string']); ?>

                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
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
                <span class="border quantity"><?php echo e($quantity); ?></span>
                <a href="javascript:void(0);" class="mx-3" wire:click="increment">+</a>
            </div>
        </div>
        <!-- End .product-single-qty -->

        <a href="javascript:void(0);" class="btn btn-dark add-cart mr-2" wire:click="addToCart" title="Add to Cart">Add to Cart</a>

        <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
            <div class="alert alert-success mt-2">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="cart-contents mt-4">
        <h5>Cart</h5>
        <!--[if BLOCK]><![endif]--><?php if(!empty($cartItems)): ?>
            <ul>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $qty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>Product id <?php echo e($productId); ?> | Quantity: <?php echo e($qty); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    </div>
</div>

    <div wire:click="resetPrice" style="height: 100vh; width: 100vw; position: absolute; top: 0; left: 0; z-index: -1;"></div>
</div><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/livewire/sku-c-product-variations.blade.php ENDPATH**/ ?>