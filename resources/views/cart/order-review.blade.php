@extends('layouts.app')

@section('data')

<section class="banner_area">
	<div class="container">
		<div class="banner_content">
			<h4>Order Review</h4>
			<a class="active" href="menu-list.html"></a>
		</div>
	</div>
</section>
<!--================End Banner Area =================-->

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">Order Review</li>
			</ol>
		</div><!--/breadcrums-->
		
		<div class="review-payment">
			<h2>Review & Payment</h2>
		</div>

		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $total_amount =0; ?> 
					@foreach($userCart as $cart)
					<tr>
						{{-- <td class="cart_product">
							<a href=""><img style="width:100px;" src="{{asset('images/backend_images/products/small/'. $cart->image)}}" alt=""></a>
						</td> --}}
						<td class="cart_description">
							<h4><a href="">{{$cart->name}}</a></h4>
						</td>
						<td class="cart_price">
							<p>Rs.{{$cart->price}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								{{$cart->quantity}}
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">Rs.{{$cart->price*$cart->quantity}}</p>
						</td>
					</tr>
					<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
					@endforeach
					<tr>
						{{-- <td colspan="4">&nbsp;</td> --}}
						<td colspan="2">
							<table class="table table-condensed total-result">
								<tr>
									<td>Cart Sub Total</td>
									<td>Rs.{{$total_amount}}</td>
								</tr>
								{{-- <tr>
									<td>Exo Tax</td>
									<td>$2</td>
								</tr> --}}
								<tr class="shipping-cost">
									<td>Shipping Cost (+)</td>
									<td>Free</td>										
								</tr>
								<tr>
									<td>Total</td>
									<td><span>Rs.{{$grand_total = $total_amount}}</span></td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<form name="paymentForm" id="paymentForm" action="{{url('/place-order')}}" method="post">
			{{csrf_field()}}
			<input type="hidden" name="grand_total" value="{{$grand_total}}">
			<div class="payment-options">
				<span>
					<label><strong>Select Payment Method:</strong></label>
				</span>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD"> <b>Cash on Delivery[COD]</b> </label>
					</span>
					{{-- <span>
						<label><input type="radio" name="payment_method" id="Paypal" value="Paypal"> <b>Esewa</b> </label>
					</span> --}}
				<span style="float:right;">
					<button type="submit" class="btn btn-primary" onclick="return selectPaymentMethod();">Place Order</button>
				</span>
			</div>
		</form>
	</div>
</section> <!--/#cart_items-->

@endsection
