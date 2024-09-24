@extends('porto.layout.master')


@section('content')

<main class="main">
			<div class="container">
				<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
					<li class="active">
						<a href="cart.html">Shopping Cart</a>
					</li>
					<li>
						<a href="checkout.html">Checkout</a>
					</li>
					<li class="disabled">
						<a href="cart.html">Order Complete</a>
					</li>
				</ul>

				<div>
					<livewire:cart-page/>
				</div>
				
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->
@endsection
@section('title',"Cart Page")