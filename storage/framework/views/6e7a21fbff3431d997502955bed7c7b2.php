

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
        data-owl-options="{
        'loop': false
    }">
        
    <!-- End .home-slide -->

    <?php $__currentLoopData = $main_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="home-slide home-slide2 banner banner-md-vw">
        <img class="slide-bg" style="background-color: #ccc; max-height:400px" width="1903" height="499"
            src='<?php echo e(asset("storage/$banner->image")); ?>' alt="slider image">
        <div class="container d-flex align-items-center">
            <div class="banner-layer d-flex justify-content-center appear-animate"
                data-animation-name="fadeInUpShorter">
                <div class="mx-auto">
                    <?php if($banner->discount != 0): ?>
                    <h4 class="m-b-1">Extra</h4>
                    <h3 class="m-b-2"><?php echo e($banner->discount); ?>% off</h3>
                    <?php endif; ?>
                    <h3 class="mb-2 heading-border"><?php echo e($banner->title); ?></h3>
                    <h2 class="text-transform-none m-b-4"><?php echo e($banner->description); ?></h2>
                    <a href="<?php echo e($banner->btnURL); ?>" class="btn btn-block btn-dark"><?php echo e($banner->btnText); ?></a>
                </div>
            </div>
            <!-- End .banner-layer -->
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <!-- End .home-slide -->
    </div>
    <!-- End .home-slider -->

    <div class="container">
        <div class="info-boxes-slider owl-carousel owl-theme mb-2"
            data-owl-options="{
            'dots': false,
            'loop': false,
            'responsive': {
                '576': {
                    'items': 2
                },
                '992': {
                    'items': 3
                }
            }
        }">
            <div class="info-box info-box-icon-left">
                <i class="icon-shipping"></i>

                <div class="info-box-content">
                    <h4>FREE SHIPPING &amp; RETURN</h4>
                    <p class="text-body">Free shipping on all orders over $99.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>

                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p class="text-body">100% money back guarantee</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>

                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->
        </div>
        <!-- End .info-boxes-slider -->

        <div class="banners-container mb-2">
            <div class="banners-slider owl-carousel owl-theme"
                data-owl-options="{
                'dots': false
            }">

                <?php $__currentLoopData = $sub_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php switch($banner->text_dir):
                case ('left'): ?>
                <div id="sub-banner-left"
                    class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate"
                    style="background-color: #ccc;" data-animation-name="fadeInLeftShorter"
                    data-animation-delay="500">
                    <figure class="w-100">
                        <img src='<?php echo e(asset("storage/$banner->image")); ?>' alt="banner" width="380"
                            height="175" />
                    </figure>
                    <div class="banner-layer">
                        <h3 class="m-b-2"><?php echo e($banner->title); ?></h3>
                        <?php if($banner->discount != 0): ?>
                        <h4 class="m-b-3 text-primary">
                            <sup class="text-dark">
                                <del><?php echo e($banner->discount - $banner->discount * 0.25); ?>%</del>
                            </sup>
                            <?php echo e($banner->discount); ?>%
                            <br>
                            <sup><?php echo e($banner->description); ?></sup>
                        </h4>
                        <?php else: ?>
                        <h4 class="m-b-3 text-primary">

                            <sup><?php echo e($banner->description); ?></sup>
                        </h4>
                        <?php endif; ?>
                        <a href="<?php echo e($banner->btnURL); ?>" class="btn btn-sm btn-dark"><?php echo e($banner->btnText); ?></a>
                    </div>
                </div>
                <?php break; ?>

                <?php case ('right'): ?>
                <div id="sub-banner-right"
                    class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate"
                    style="background-color: #ccc;" data-animation-name="fadeInRightShorter"
                    data-animation-delay="500">
                    <figure class="w-100">
                        <img src='<?php echo e(asset("storage/$banner->image")); ?>' alt="banner" width="380"
                            height="175" />
                    </figure>
                    <div class="banner-layer text-right">
                        <h3 class="m-b-2"><?php echo e($banner->title); ?></h3>
                        <h4 class="m-b-2 text-secondary text-uppercase"><?php echo e($banner->description); ?></h4>
                        <a href="<?php echo e($banner->btnURL); ?>" class="btn btn-sm btn-dark"><?php echo e($banner->btnText); ?></a>
                    </div>
                </div>
                <?php break; ?>

                <?php case ('center'): ?>
                <div id="sub-banner-center"
                    class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate"
                    data-animation-name="fadeInUpShorter" data-animation-delay="200">
                    <figure class="w-100">
                        <img src='<?php echo e(asset("storage/$banner->image")); ?>' style="background-color: #ccc;"
                            alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-center">
                        <div class="row align-items-lg-center">
                            <div class="col-lg-7 text-lg-right">
                                <h3><?php echo e($banner->title); ?></h3>
                                <h4 class="pb-4 pb-lg-0 mb-0 text-body"><?php echo e($banner->description); ?></h4>
                            </div>
                            <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                <a href="<?php echo e($banner->btnURL); ?>"
                                    class="btn btn-sm btn-dark"><?php echo e($banner->btnText); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php break; ?>
                <?php endswitch; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- End .banner -->

            </div>
        </div>
    </div>
    <!-- End .container -->

    <section class="featured-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                data-owl-options="{
                'dots': false,
                'nav': true
            }">

                <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="/product/<?php echo e($product->id); ?>">
                            <img src='<?php echo e(asset("storage/$product->image")); ?>' style=" min-height: 280px; min-width: 280px;max-height: 280px; max-width: 280px; object-fit:cover" width="280"
                                height="280" alt="product">

                            <?php
                            $gallery = $product->gallery;
                            ?>

                            <img src='<?php echo e(asset("storage/$gallery[0]")); ?>' style="min-height: 280px; min-width: 280px;max-height: 280px; max-width: 280px; object-fit:cover" width="280"
                                height="280" alt="product">
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
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                    class="icon-heart"></i></a>
                            <a href="/product/<?php echo e($product->id); ?>" class="btn-icon btn-add-cart"><i
                                    class="fa fa-arrow-right"></i><span>View Product</span></a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview d-none" title="Quick View"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!-- End .featured-proucts -->
        </div>
    </section>

    <section class="new-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2"
                data-owl-options="{
                'dots': false,
                'nav': true,
                'responsive': {
                    '992': {
                        'items': 4
                    },
                    '1200': {
                        'items': 5
                    }
                }
            }">
                <?php $__currentLoopData = $new_arrival; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="/product/<?php echo e($product->id); ?>">
                            <img src='<?php echo e(asset("storage/$product->image")); ?>' style="min-height: 220px; min-width: 220px;max-height: 220px; max-width: 220px; object-fit:cover" width="280"
                                height="220" alt="product">


                            <?php
                            $gallery = $product->gallery;
                            ?>

                            <img src='<?php echo e(asset("storage/$gallery[0]")); ?>' style="min-height: 220px; min-width: 220px;max-height: 220px; max-width: 220px; object-fit:cover" width="280"
                                height="220" alt="product">
                        </a>
                        <div class="label-group">
                            <div class="product-label label-sale">-<?php echo e($product->discount); ?>%</div>
                        </div>
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
                        <div class="price-box">
                            <del class="old-price">$<?php echo e(number_format($product->price,0)); ?></del>
                            <span class="product-price">$<?php echo e(number_format($product->price,0)); ?></span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="#" class="btn-icon-wish" title="wishlist"><i
                                    class="icon-heart"></i></a>
                            <a href="/product/<?php echo e($product->id); ?>" class="btn-icon btn-add-cart"><i
                                    class="fa fa-arrow-right"></i><span>Shop Now</span></a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!-- End .featured-proucts -->

            <div class="banner d-none banner-big-sale appear-animate" data-animation-delay="200"
                data-animation-name="fadeInUpShorter"
                style="background: #2A95CB center/cover url('assets/images/demoes/demo4/banners/banner-4.jpg');">
                <div class="banner-content row align-items-center mx-0">
                    <div class="col-md-9 col-sm-8">
                        <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                            <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands items up to
                            70% off
                            <small class="text-transform-none align-middle">Online Purchases Only</small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-4 text-center text-sm-right">
                        <a class="btn btn-light btn-white btn-lg" href="category.html">View Sale</a>
                    </div>
                </div>
            </div>

            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate"
                data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories
            </h2>

            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                <div class="product-category appear-animate animated fadeInUpShorter appear-animation-visible" data-animation-name="fadeInUpShorter" style="animation-duration: 1000ms;">
                    <a href="/category/<?php echo e($category->id); ?>">
                        <figure>
                            <img src='<?php echo e(asset("storage/$category->image")); ?>' alt="category" width="280" height="240" style="max-width: 280px; max-height: 240px;  object-fit: cover;">
                        </figure>
                        <div class="category-content">
                            <h3><?php echo e($category->name); ?></h3>
                            <span><mark class="count"><?php echo e($category->products_count); ?></mark> Products</span>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>

    <section class="feature-boxes-container">
        <div class="container appear-animate" data-animation-name="fadeInUpShorter">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-earphones-alt"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Customer Support</h3>
                            <h5>You Won't Be Alone</h5>

                            <p>We really care about you and your website as much as you do. Purchasing Porto or any
                                other theme from us you get 100% free support.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Fully Customizable</h3>
                            <h5>Tons Of Options</h5>

                            <p>With Porto you can customize the layout, colors and styles within only a few minutes.
                                Start creating an amazing website right now!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-action-undo"></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>Powerful Admin</h3>
                            <h5>Made To Help You</h5>

                            <p>Porto has very powerful admin features to help customer to build their own shop in
                                minutes without any special skills in web development.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container-->
    </section>
    <!-- End .feature-boxes-container -->
    <?php
      $sticky_banner = $main_banners[0];
    ?>
    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}"
        data-image-src='<?php echo e(asset("storage/$sticky_banner->image")); ?>'>
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center justify-content-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter"
                    data-animation-delay="600">

                    <h2 class="mb-md-0 text-white"><?php echo e($sticky_banner->title); ?></h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="300">
                    <a href="<?php echo e($sticky_banner->btnURL); ?>" class="btn btn-dark btn-black ls-10"><?php echo e($sticky_banner->btnText); ?></a>
                </div>
                <!-- D-none -->
                <div class="d-none col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter"
                    data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive
                            COUPON</b>
                    </h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b
                            class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section pb-0">
        <div class="container">
            <h2 class="section-title heading-border border-0 appear-animate d-none" data-animation-name="fadeInUp">
                Latest News</h2>

            
            <div class="owl-carousel owl-theme appear-animate d-none" data-animation-name="fadeIn"
                data-owl-options="{
                    'loop': false,
                            'margin': 20,
                            'autoHeight': true,
                            'autoplay': false,
                            'dots': false,
                            'items': 2,
                            'responsive': {
                                '0': {
                                    'items': 1
                                },
                                '480': {
                                    'items': 2
                                },
                                '576': {
                                    'items': 3
                                },
                                '768': {
                                    'items': 4
                                }
                            }   
                        }">
                <article class="post">
                    <div class="post-media">
                        <a href="single.html">
                            <img src="<?php echo e(asset('porto/assets/images/blog/home/post-1.jpg')); ?>" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="single.html">Top New Collection</a>
                        </h2>
                        <div class="post-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non
                                tellus sem. Aenean...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="single.html" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->

                <article class="post">
                    <div class="post-media">
                        <a href="single.html">

                            <img src="<?php echo e(asset('porto/assets/images/blog/home/post-2.jpg')); ?>" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="single.html">Fashion Trends</a>
                        </h2>
                        <div class="post-content">
                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="single.html" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->

                <article class="post">
                    <div class="post-media">
                        <a href="single.html">
                            <img src="<?php echo e(asset('porto/assets/images/blog/home/post-3.jpg')); ?>" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="single.html">Right Choices</a>
                        </h2>
                        <div class="post-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="single.html" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->

                <article class="post">
                    <div class="post-media">
                        <a href="single.html">
                            <img src="<?php echo e(asset('porto/assets/images/blog/home/post-4.jpg')); ?>" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="single.html">Perfect Accessories</a>
                        </h2>
                        <div class="post-content">
                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="single.html" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->
            </div>

            <hr class="mt-0 m-b-5">
            <h2 style="text-align: center;">Brands</h2>

            <div class="brands-slider owl-carousel owl-theme images-center appear-animate"
                data-animation-name="fadeIn" data-animation-duration="500"
                data-owl-options="{
            'margin': 0}">
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <img src='<?php echo e(asset("storage/$brand->image")); ?>' width="130" height="56"
                    style="max-height: 56px; max-width: 130px; min-width: 130px; object-fit: cover;"
                    alt="brand">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- End .brands-slider -->

            <hr class="mt-4 m-b-5">

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
                                <span class="product-price">$<?php echo e(number_format($product->price ,0)); ?></span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>


            </div>
            <!-- End .row -->
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('porto.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/porto/home.blade.php ENDPATH**/ ?>