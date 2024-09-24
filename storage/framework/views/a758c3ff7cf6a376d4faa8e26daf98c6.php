

<?php $__env->startSection('css'); ?>
<link rel="icon" type="image/x-icon" href="porto/assets/images/icons/favicon.png">
<link rel="stylesheet" href="porto/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="porto/assets/css/style.min.css">
<link rel="stylesheet" type="text/css" href="porto/assets/vendor/fontawesome-free/css/all.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>









<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container account-container custom-account-container">
        <div class="row">
            <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
                <h2 class="text-uppercase">My Account</h2>
                <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                            role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
                            aria-controls="order" aria-selected="true">Orders</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                            aria-controls="edit" aria-selected="false">Account
                            details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab"
                            aria-controls="edit" aria-selected="false">Shopping Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('wishlist')); ?>">Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 order-lg-last order-1 tab-content">
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                    <div class="dashboard-content">
                        <p>
                            Hello <strong class="text-dark">Editor</strong> (not
                            <strong class="text-dark">Editor</strong>?
                            <a href="login.html" class="btn btn-link ">Log out</a>)
                        </p>

                        <p>
                            From your account dashboard you can view your
                            <a class="btn btn-link link-to-tab" href="#order">recent orders</a>,
                            manage your
                            <a class="btn btn-link link-to-tab" href="#address">shipping and billing
                                addresses</a>, and
                            <a class="btn btn-link link-to-tab" href="#edit">edit your password and account
                                details.</a>
                        </p>

                        <div class="mb-4"></div>

                        <div class="row row-lg">
                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="#order" class="link-to-tab"><i class="icon-gift"></i></a>
                                    <div class="feature-box-content">
                                        <h3>ORDERS</h3>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="#address" class="link-to-tab"><i
                                            class="icon-heart"></i></a>
                                    <div class="feature-box-content">
                                        <h3>ADDRESSES</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="<?php echo e(route('myaccount')); ?>" class="link-to-tab"><i class="icon-user-2"></i></a>
                                    <div class="feature-box-content p-0">
                                        <h3>ACCOUNT DETAILS</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="feature-box text-center pb-4">
                                    <a href="{route('wishlist')}} "><i class="icon-heart"></i></a>
                                    <div class="feature-box-content">
                                        <h3>WISHLIST</h3>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End .row -->
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="order" role="tabpanel">
                    <div class="order-content">
                        <h3 class="account-sub-title d-none d-md-block"><i
                                class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
                        <div class="order-table-container text-center">
                            <table class="table table-order text-left">
                                <thead>
                                    <tr>
                                        <th class="order-id">ORDER</th>
                                        <th class="order-date">DATE</th>
                                        <th class="order-status">STATUS</th>
                                        <th class="order-price">TOTAL</th>
                                        <th class="order-action">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center p-0" colspan="5">
                                            <p class="mb-5 mt-5">
                                                No Order has been made yet.
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr class="mt-0 mb-3 pb-2" />

                            <a href="category.html" class="btn btn-dark">Go Shop</a>
                        </div>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="download" role="tabpanel">
                    <div class="download-content">
                        <h3 class="account-sub-title d-none d-md-block"><i
                                class="sicon-cloud-download align-middle mr-3"></i>Downloads</h3>
                        <div class="download-table-container">
                            <p>No downloads available yet.</p> <a href="category.html"
                                class="btn btn-primary text-transform-none mb-2">GO SHOP</a>
                        </div>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="address" role="tabpanel">
                    <h3 class="account-sub-title d-none d-md-block mb-1"><i
                            class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
                    <div class="addresses-content">
                        <p class="mb-4">
                            The following addresses will be used on the checkout page by
                            default.
                        </p>

                        <div class="row">
                            <div class="address col-md-6">
                                <div class="heading d-flex">
                                    <h4 class="text-dark mb-0">Billing address</h4>
                                </div>

                                <div class="address-box">
                                    You have not set up this type of address yet.
                                </div>

                                <a href="#billing" class="btn btn-default address-action link-to-tab">Add
                                    Address</a>
                            </div>

                            <div class="address col-md-6 mt-5 mt-md-0">
                                <div class="heading d-flex">
                                    <h4 class="text-dark mb-0">
                                        Shipping address
                                    </h4>
                                </div>

                                <div class="address-box">
                                    You have not set up this type of address yet.
                                </div>

                                <a href="#shipping" class="btn btn-default address-action link-to-tab">Add
                                    Address</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="edit" role="tabpanel">
                    <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
                            class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
                    <div class="account-content">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('account-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2630750119-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="billing" role="tabpanel">
                    <div class="address account-content mt-0 pt-2">
                        <h4 class="title">Billing address</h4>

                        <form class="mb-2" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="select-custom">
                                <label>Country / Region <span class="required">*</span></label>
                                <select name="orderby" class="form-control">
                                    <option value="" selected="selected">British Indian Ocean Territory
                                    </option>
                                    <option value="1">Brunei</option>
                                    <option value="2">Bulgaria</option>
                                    <option value="3">Burkina Faso</option>
                                    <option value="4">Burundi</option>
                                    <option value="5">Cameroon</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Street address <span class="required">*</span></label>
                                <input type="text" class="form-control"
                                    placeholder="House number and street name" required />
                                <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit, etc. (optional)" required />
                            </div>

                            <div class="form-group">
                                <label>Town / City <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>State / Country <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>Postcode / ZIP <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group mb-3">
                                <label>Phone <span class="required">*</span></label>
                                <input type="number" class="form-control" required />
                            </div>

                            <div class="form-group mb-3">
                                <label>Email address <span class="required">*</span></label>
                                <input type="email" class="form-control" placeholder="editor@gmail.com"
                                    required />
                            </div>

                            <div class="form-footer mb-0">
                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-dark py-4">
                                        Save Address
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="shipping" role="tabpanel">
                  <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('address-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2630750119-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div><!-- End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',"MY Account Page"); ?>
<script></script>

<?php echo $__env->make('porto.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/porto/myAccount.blade.php ENDPATH**/ ?>