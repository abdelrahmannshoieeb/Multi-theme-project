


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
									<h2 class="title">Register</h2>
								</div>
								<form method="POST" action="/register">
										<?php echo csrf_field(); ?>
										<?php if($errors->any()): ?>
											<div>
												<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div><?php echo e($error); ?></div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
										<?php endif; ?>

										<label for="register-email">
											Email address
											<span class="required">*</span>
										</label>
										<input type="email" class="form-input form-wide" id="register-email" name="email" required />

										<label for="register-password">
											Password
											<span class="required">*</span>
										</label>
										<input type="password" class="form-input form-wide" id="register-password" name="password" required />

										<label for="register-password-confirmation">
											Confirm Password
											<span class="required">*</span>
										</label>
										<input type="password" class="form-input form-wide" id="register-password-confirmation" name="password_confirmation" required />

										<div class="form-footer mb-2">
											<button type="submit" class="btn btn-dark btn-md w-100 mr-0">
												Register
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
<?php $__env->startSection('title',"register Page"); ?>
<?php echo $__env->make('porto.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-connerce-final - Copy\resources\views/porto/register.blade.php ENDPATH**/ ?>