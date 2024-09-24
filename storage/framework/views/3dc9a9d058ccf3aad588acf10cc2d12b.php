<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent("title"); ?></title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="author" content="SW-THEMES">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('porto/assets/images/icons/favicon.png')); ?>">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('porto/assets/css/bootstrap.min.css')); ?>">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('porto/assets/css/demo4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('porto/assets/vendor/fontawesome-free/css/all.min.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></script>

    <?php echo $__env->yieldContent('css'); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body>

    <div class="page-wrapper">
      
        <?php echo $__env->make("porto.layout.top_notice", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make("porto.layout.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make("porto.layout.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>


    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>

    <?php echo $__env->make('porto.layout.mobile_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End .mobile-menu-container -->

   

    <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-formm" style="background: #f1f1f1 no-repeat center/cover url(<?php echo e(asset('porto/assets/images/newsletter_popup_bg.jpg')); ?>)">
        <div class="newsletter-popup-content">
            <img src="<?php echo e(asset('porto/assets/images/logo.png')); ?>" width="111" height="44" alt="Logo" class="logo-newsletter">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
						Don't show this popup again
					</label>
                </div>
            </div>
        </div>
        <!-- End .newsletter-popup-content -->

        <button title="Close (Esc)" type="button" class="mfp-close">
			×
		</button>
    </div>


    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <!-- Plugins JS File -->
    <script src="<?php echo e(asset('porto/assets/js/jquery.min.js')); ?>"></script>

    <script src="<?php echo e(asset('porto/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('porto/assets/js/optional/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('porto/assets/js/plugins.min.js')); ?>"></script>
    <script src="<?php echo e(asset('porto/assets/js/jquery.appear.min.js')); ?>"></script>

    <!-- Main JS File -->
    <script src="<?php echo e(asset('porto/assets/js/main.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>


</body>



</html><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/porto/layout/master.blade.php ENDPATH**/ ?>