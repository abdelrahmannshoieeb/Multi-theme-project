<div>
<div>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="product-row">
        <td>
            <figure class="product-image-container">
                <!--[if BLOCK]><![endif]--><?php if($wishlist->skuCode && $wishlist->skuCode->id): ?>
                <!-- If skuCode exists -->
                <a href="/product/<?php echo e($wishlist->skuCode->product->id); ?>" class="product-image">
                    <img src="<?php echo e(asset('storage/' . $wishlist->skuCode->product->image)); ?>" alt="product">
                </a>
                <?php else: ?>
                <!-- Fall back to product if skuCode does not exist -->
                <a href="/product/<?php echo e($wishlist->product->id); ?>" class="product-image">
                    <img src="<?php echo e(asset('storage/' . $wishlist->product->image)); ?>" alt="product">
                </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
            </figure>
        </td>
        <td>
            <h5 class="product-title">
                <!--[if BLOCK]><![endif]--><?php if($wishlist->skuCode && $wishlist->skuCode->id): ?>
                <a href="/product/<?php echo e($wishlist->skuCode->product->id); ?>"><?php echo e($wishlist->skuCode->product->name); ?></a>
                <?php else: ?>
                <a href="/product/<?php echo e($wishlist->product->id); ?>"><?php echo e($wishlist->product->name); ?></a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </h5>
        </td>
        <td class="price-box">
            $<?php echo e($wishlist->skuCode ? $wishlist->skuCode->price : $wishlist->product->price); ?>

        </td>
        <td>
            <span class="stock-status"><?php echo e($wishlist->skuCode ? $wishlist->skuCode->product->status : $wishlist->product->status); ?></span>
        </td>
        <td class="action">
            <a href="/product/<?php echo e($wishlist->skuCode ? $wishlist->skuCode->product->id : $wishlist->product->id); ?>" class="btn btn-quickview mt-1 mt-md-0" title="Quick View">Quick View</a>
            <button class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                ADD TO CART
            </button>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>
</div>
<?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/livewire/wishlist-component.blade.php ENDPATH**/ ?>