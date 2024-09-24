@extends('porto.layout.master')


@section('content')


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
										@csrf
										@if($errors->any())
											<div>
												@foreach($errors->all() as $error)
													<div>{{ $error }}</div>
												@endforeach
											</div>
										@endif

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
    
@endsection
@section('title',"register Page")