

<?php $__env->startSection('title', $products->name); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
            </ol>
        </nav>

        <div class="product-single-container product-single-default">
            <div class="cart-message d-none">
                <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                <span>has been added to your cart.</span>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                        <?php if($products->discount != 0): ?>

                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-<?php echo e($products_discount->discount); ?>%</div>
                        </div>
                        <?php endif; ?>
                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-item">
                                <img class="product-single-image" src='<?php echo e(asset("storage/$gallery")); ?>' data-zoom-image="<?php echo e(asset('storage/$gallery')); ?>" width="468" height="468" alt="product" />
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- End .product-single-carousel -->


                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>


                        <div class="prod-thumbnail owl-dots">
                            <?php $__currentLoopData = $thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumbnail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="owl-dot">
                                <img src='<?php echo e(asset("storage/$thumbnail")); ?>' width="110" height="110" alt="product-thumbnail" style="min-height: 110px; min-width: 110px;max-height: 110px; max-width: 110px; object-fit:cover" />
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                    </div>


                </div>
                <!-- End .product-single-gallery -->
                <?php
                $product = $products;
                ?>
                <div class="col-lg-7 col-md-6 product-single-details">
                    <h1 class="product-title d-none"><?php echo e($product->name); ?></h1>

                    <div class="product-nav d-none">
                        <div class="product-prev">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                            src="<?php echo e(asset('porto/assets/images/products/product-3.jpg')); ?>"
                                            style="padding-top: 0px;">

                                        <span>Circled Ultimate 3D Speaker</span>
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="product-next">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                            src="<?php echo e(asset('porto/assets/images/products/product-4.jpg')); ?>"
                                            style="padding-top: 0px;">

                                        <span>Blue Backpack for the Young</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="ratings-container d-none">
                        <div class="product-ratings">
                            <span class="ratings" style="width:<?php echo e($product->stars / 5 * 100); ?>%"></span>
                            <!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <!-- End .product-ratings -->

                        <a href="#" class="rating-link">( 6 Reviews )</a>
                    </div>
                    <!-- End .ratings-container -->

                

                    <div class="price-box d-none">
                        <span class="product-price d-none">$15.00 &ndash; </span>
                        <span class="product-price" id="product-price"> $<?php echo e(number_format($product->price ,0)); ?></span>
                    </div>

                    <!-- End .price-box -->

                    <div class="product-desc d-none">
                        <p>
                            <?php echo e($product->description); ?>

                        </p>
                    </div>
                    <!-- End .product-desc -->

                    <ul class="single-info-list d-none">
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
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <strong><a href="#" class="product-category"><?php echo e($tag); ?></a></strong>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>

                    <div class="product-filters-container">
                        <div class="product-single-filter d-none"><label>Color:</label>
                            <ul class="config-size-list config-color-list config-filter-list">
                                <li class="">
                                    <a href="javascript:;" class="filter-color border-0" style="background-color: rgb(1, 136, 204);"></a>
                                </li>
                                <li class="">
                                    <a href="javascript:;" class="filter-color border-0 initial disabled" style="background-color: rgb(221, 181, 119);"></a>
                                </li>
                                <li class="">
                                    <a href="javascript:;" class="filter-color border-0" style="background-color: rgb(96, 133, 165);"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="product-single-filter d-none">
                            <label>Size:</label>
                            <ul class="config-size-list">
                                <?php $__currentLoopData = $product->skuCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skuCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="" onclick="showVariationPrice(<?php echo e($skuCode->price); ?>)">
                                    <a href="javascript:;" class="d-flex align-items-center justify-content-center" style="height: 50px;">
                                        <?php $__currentLoopData = $skuCode->attribute_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($attribute['value']); ?> <br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="product-single-filter">
                             <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('SkuCProductVariations', ['productId' => $product->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2129191545-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </div>

                        <!-- <?php $__currentLoopData = $product->skuCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skuCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $skuCode->attribute_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($attribute['value']); ?>

                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->



                        <div class="product-single-filter">
                            <label></label>
                            <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                        </div>
                        <!---->
                    </div>

                    <div class="product-action d-none">
                        <div class="price-box product-filtered-price">
                            <del class="old-price"><span>$286.00</span></del>
                            <span class="product-price">$245.00</span>
                        </div>

                        <div class="product-single-qty">
                            <input class="horizontal-quantity form-control" type="text">
                        </div>
                        <!-- End .product-single-qty -->

                        <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to
                            Cart</a>

                        <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                    </div>

                 
                    <!-- End .product-action -->

                    <hr class="divider mb-0 mt-0">

                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('product-add-wishlist', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2129191545-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    <!-- End .product single-share -->
                </div>
                <!-- End .product-single-details -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                        Information</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-none" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <p><?php echo e($product->description); ?>.</p>
                        <ul class="d-none">
                            <li>Any Product types that You want - Simple, Configurable
                            </li>
                            <li>Downloadable/Digital Products, Virtual Products
                            </li>
                            <li>Inventory Management with Backordered items
                            </li>
                        </ul>
                        <p class="d-none">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                    <!-- End .product-desc-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                    <div class="product-size-content">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?php echo e(asset('porto/assets/images/products/single/body-shape.png')); ?>" alt="body shape" width="217" height="398">
                            </div>
                            <!-- End .col-md-4 -->

                            <div class="col-md-8">
                                <table class="table table-size">
                                    <thead>
                                        <tr>
                                            <th>SIZE</th>
                                            <th>CHEST (in.)</th>
                                            <th>WAIST (in.)</th>
                                            <th>HIPS (in.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>XS</td>
                                            <td>34-36</td>
                                            <td>27-29</td>
                                            <td>34.5-36.5</td>
                                        </tr>
                                        <tr>
                                            <td>S</td>
                                            <td>36-38</td>
                                            <td>29-31</td>
                                            <td>36.5-38.5</td>
                                        </tr>
                                        <tr>
                                            <td>M</td>
                                            <td>38-40</td>
                                            <td>31-33</td>
                                            <td>38.5-40.5</td>
                                        </tr>
                                        <tr>
                                            <td>L</td>
                                            <td>40-42</td>
                                            <td>33-36</td>
                                            <td>40.5-43.5</td>
                                        </tr>
                                        <tr>
                                            <td>XL</td>
                                            <td>42-45</td>
                                            <td>36-40</td>
                                            <td>43.5-47.5</td>
                                        </tr>
                                        <tr>
                                            <td>XLL</td>
                                            <td>45-48</td>
                                            <td>40-44</td>
                                            <td>47.5-51.5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-size-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                    <table class="table table-striped mt-2">
                        <tbody>
                            <?php $__currentLoopData = $attribute_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($attribute['name']); ?></th>
                                <td><?php echo e($attribute['value']); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                        <div class="comment-list">
                            <div class="comments">
                                <figure class="img-thumbnail">
                                    <img src="<?php echo e(asset('porto/assets/images/blog/author.jpg')); ?>" alt="author" width="80" height="80">
                                </figure>

                                <div class="comment-block">
                                    <div class="comment-header">
                                        <div class="comment-arrow"></div>

                                        <div class="ratings-container float-sm-right">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>

                                        <span class="comment-by">
                                            <strong>Joe Doe</strong> – April 12, 2018
                                        </span>
                                    </div>

                                    <div class="comment-content">
                                        <p>Excellent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="add-product-review">
                            <h3 class="review-title">Add a review</h3>

                            <form action="#" class="comment-form m-0">
                                <div class="rating-form">
                                    <label for="rating">Your rating <span class="required">*</span></label>
                                    <span class="rating-stars">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Your review <span class="required">*</span></label>
                                    <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                </div>
                                <!-- End .form-group -->


                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Name <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>
                                        <!-- End .form-group -->
                                    </div>

                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>
                                        <!-- End .form-group -->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-name" />
                                            <label class="custom-control-label mb-0" for="save-name">Save my
                                                name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                        <!-- End .add-product-review -->
                    </div>
                    <!-- End .product-reviews-content -->
                </div>
                <!-- End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .product-single-tabs -->

        <div class="products-section pt-0">
            <h2 class="section-title">Related Products</h2>

            <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                <?php $__currentLoopData = $products_in_same_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="product-default">
                    <figure>
                        <a href="/product/<?php echo e($product->id); ?>">
                            <img src='<?php echo e(asset("storage/$product->image")); ?>' width="280" height="280" alt="product" style="min-height: 280px; min-width: 280px;max-height: 280px; max-width: 280px; object-fit:cover">
                            <?php
                            $gallery = $product->gallery;
                            ?>
                            <img src='<?php echo e(asset("storage/$gallery[0]")); ?>' width="280" height="280" alt="product" style="min-height: 280px; min-width: 280px;max-height: 280px; max-width: 280px; object-fit:cover">
                        </a>
                        <?php if($product->discount != 0): ?>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-<?php echo e($product->discount); ?>%</div>
                        </div>
                        <?php endif; ?>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="/category/<?php echo e($product->category->id); ?>" class="product-category"><?php echo e($product->category->name); ?></a>
                        </div>
                        <h3 class="product-title">
                            <a href="/product/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:<?php echo e($product->stars / 5 * 100); ?>%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <?php if($product->discount): ?>
                        <div class="price-box">
                            <?php
                            $discount_price = number_format($product->price + ($product->price * $product->discount / 100));
                            ?>
                            <del class="old-price">$<?php echo e($discount_price); ?></del>
                            <span class="product-price">$<?php echo e(number_format($product->price,)); ?></span>
                        </div>
                        <?php else: ?>
                        <div class="price-box">
                            <span class="product-price">$<?php echo e(number_format($product->price,2)); ?></span>
                        </div>
                        <?php endif; ?>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                    class="icon-heart"></i></a>
                            <a href="product.html" class="btn-icon btn-add-cart"><i
                                    class="fa fa-arrow-right"></i><span>SELECT
                                    OPTIONS</span></a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>



        </div>
        <!-- End .products-section -->

        <hr class="mt-0 m-b-5" />
        <div class="product-widgets-container row pb-2">
            <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                data-animation-delay="200">
                <h4 class="section-sub-title">Featured Products</h4>

                <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="product-default left-details product-widget">
                    <figure>
                        <a href="/product/<?php echo e($product->id); ?>">
                            <img src='<?php echo e(asset("storage/$product->image")); ?>'
                                width="84" height="84" style="max-height: 84px; max-width: 84px; min-width: 84px; object-fit: cover;" alt="product">

                            <?php
                            $gallery = $product->gallery;
                            ?>
                            <img src='<?php echo e(asset("storage/$gallery[0]")); ?>'
                                width="84" height="84" alt="product">
                        </a>
                    </figure>

                    <div class="product-details">
                        <h3 class="product-title"> <a href="/product/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a>
                        </h3>

                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:<?php echo e($product->stars / 5 * 100); ?>%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->

                        <div class="price-box">
                            <span class="product-price">$<?php echo e(number_format($product->price ,0)); ?></span>
                        </div>
                        <!-- End .price-box -->
                    </div>
                    <!-- End .product-details -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
            <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                data-animation-delay="200">
                <h4 class="section-sub-title">Best Selling Products</h4>

                <?php $__currentLoopData = $best_selling_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="product-default left-details product-widget">
                    <figure>
                        <a href="/product/<?php echo e($product->id); ?>">
                            <img src='<?php echo e(asset("storage/$product->image")); ?>'
                                width="84" height="84" style="max-height: 84px; max-width: 84px; min-width: 84px; object-fit: cover;" alt="product">

                            <?php
                            $gallery = $product->gallery;
                            ?>
                            <img src='<?php echo e(asset("storage/$gallery[0]")); ?>'
                                width="84" height="84" alt="product">
                        </a>
                    </figure>

                    <div class="product-details">
                        <h3 class="product-title"> <a href="/product/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a>
                        </h3>

                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:<?php echo e($product->stars / 5 * 100); ?>%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->

                        <div class="price-box">
                            <span class="product-price">$<?php echo e(number_format($product->price ,0)); ?></span>
                        </div>
                        <!-- End .price-box -->
                    </div>
                    <!-- End .product-details -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
            <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                data-animation-delay="200">
                <h4 class="section-sub-title">Latest Products</h4>

                <?php $__currentLoopData = $latest_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="product-default left-details product-widget">
                    <figure>
                        <a href="/product/<?php echo e($product->id); ?>">
                            <img src='<?php echo e(asset("storage/$product->image")); ?>'
                                width="84" height="84" style="max-height: 84px; max-width: 84px; min-width: 84px; object-fit: cover;" alt="product">

                            <?php
                            $gallery = $product->gallery;
                            ?>
                            <img src='<?php echo e(asset("storage/$gallery[0]")); ?>'
                                width="84" height="84" alt="product">
                        </a>
                    </figure>

                    <div class="product-details">
                        <h3 class="product-title"> <a href="/product/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a>
                        </h3>

                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:<?php echo e($product->stars / 5 * 100); ?>%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->

                        <div class="price-box">
                            <span class="product-price">$<?php echo e(number_format($product->price ,0)); ?></span>
                        </div>
                        <!-- End .price-box -->
                    </div>
                    <!-- End .product-details -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
            <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                data-animation-delay="200">
                <h4 class="section-sub-title">Top Rated Products</h4>

                <?php $__currentLoopData = $top_rated_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="product-default left-details product-widget">
                    <figure>
                        <a href="/product/<?php echo e($product->id); ?>">
                            <img src='<?php echo e(asset("storage/$product->image")); ?>'
                                width="84" height="84" style="max-height: 84px; max-width: 84px; min-width: 84px; object-fit: cover;" alt="product">

                            <?php
                            $gallery = $product->gallery;
                            ?>
                            <img src='<?php echo e(asset("storage/$gallery[0]")); ?>'
                                width="84" height="84" alt="product">
                        </a>
                    </figure>

                    <div class="product-details">
                        <h3 class="product-title"> <a href="/product/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a>
                        </h3>

                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:<?php echo e($product->stars / 5 * 100); ?>%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->

                        <div class="price-box">
                            <span id="product-price" class="product-price">$<?php echo e(number_format($product->price, 0)); ?></span>
                        </div>
                        <div class="price-box">

                        </div>
                        <!-- End .price-box -->
                    </div>
                    <!-- End .product-details -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>


        </div>
    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


</main>

<SCript>
    function showVariationPrice(price) {
        const formattedPrice = new Intl.NumberFormat().format(price);
        document.getElementById('product-price').textContent = `$${formattedPrice}`;
        console.log(formattedPrice);
    }
</SCript>
<script src="//unpkg.com/alpinejs" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title',"Product Page"); ?>
<?php echo $__env->make('porto.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/porto/product.blade.php ENDPATH**/ ?>