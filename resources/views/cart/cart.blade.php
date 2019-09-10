@extends('layouts.app')
@section('data')


<section class="banner_area">
	<div class="container">
		<div class="banner_content">
			<h4>Cart List</h4>
			<a class="active" href="menu-list.html"></a>
		</div>
	</div>
</section>
<!--================End Banner Area =================-->
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="">Home</a></li>
				<li class="active">Order Cart</li>
			</ol>
		</div>
		{{-- <div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong></strong> 
		</div> --}}
		<div class="table-responsive cart_info"> 
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="menu_name">Menu Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $total_amount = 0; ?>
					@foreach($usercart as $order)
					<tr>
						<td class="cart_product">
							<a href=""><img style="width:100px;" src="" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$order->name}}</a></h4>
						</td>
						<td class="cart_price">
							<p>{{$order->price}}</p>
						</td>
						<td class="cart_quantity">
							<div  class="cart_quantity_button">
								<a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$order->id.'/1')}}"> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$order->quantity}}"autocomplete="off" size="2">
								@if($order->quantity>1)
									<a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$order->id.'/-1')}}"> - </a>
									@endif
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">Rs.{{$order->price*$order->quantity}}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{url('/cart/delete-cart/'.$order->id)}}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php $total_amount = $total_amount + ($order->price*$order->quantity); ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next ?</h3>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Grand Total <span>Rs <?php echo $total_amount; ?> </span></li>
					</ul>
					{{-- <a class="btn btn-default update" href="">Update</a> --}}
					<a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

@endsection