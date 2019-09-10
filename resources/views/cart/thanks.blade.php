@extends('layouts.app')
@section('data')

<section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Menu List</h4>
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
				  <li class="active">Thanks</li>
				</ol>
			</div>
		</div>
	</section>

	<section id="do_action">
		<div class="container">
			<div class="heading" style="text-align: center;">
				<h2>Your Order has been completed successfully</h2>
				<p>Your Order ID is <b>00</b><b>{{Session::get('order_id')}}</b>. Please use this number in any correspondence regarding this order.<br>
				You will receive an email receipt with your order information as well.</p>
			</div>
		</div>
	</section>

@endsection

<?php
	Session::forget('grand_total');
	Session::forget('order_id');
?>