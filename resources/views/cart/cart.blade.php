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
					@foreach($orders as $order)
					<tr>
						<td class="cart_product">
							<a href=""><img style="width:100px;" src="" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$order->menu_name}}</a></h4>
						</td>
						<td class="cart_price">
							<p>{{$order->price}}</p>
						</td>
						<td class="cart_quantity">
							<div  class="cart_quantity_button">
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="2"autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price"></p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>
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
						<li>Grand Total<span></span></li>
					</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

@endsection