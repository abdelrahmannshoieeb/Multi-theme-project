


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

			<div class="container login-container py-3">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="row justify-content-center align-items-center">
							<div class="col-md-6">
								<div class="heading mb-1">
									<h2 class="title">Login</h2>
								</div>

							
								<form method="POST" action="/login">
										<?php echo csrf_field(); ?>
										<?php if($errors->any()): ?>
											<div class="alert alert-danger">
												<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div><?php echo e($error); ?></div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
										<?php endif; ?>

										<?php if(session('success')): ?>
											<div class="alert alert-success">
												<?php echo e(session('success')); ?>

											</div>
										<?php endif; ?>

										<label for="login-email">
											Email address
											<span class="required">*</span>
										</label>
										<input type="email" class="form-input form-wide" id="login-email" name="email" value="<?php echo e(old('email')); ?>" required />

										<label for="login-password">
											Password
											<span class="required">*</span>
										</label>
										<input type="password" class="form-input form-wide" id="login-password" name="password" required />

										<div class="form-footer mb-2">
											<button type="submit" class="btn btn-dark btn-md w-100 mr-0">
												Login
											</button>
										</div>
									</form>
							</div>
					
						</div>
					</div>
				</div>
			</div>
		</main><!-- End .main -->
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',"login Page"); ?>
<?php echo $__env->make('porto.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/porto/login.blade.php ENDPATH**/ ?>