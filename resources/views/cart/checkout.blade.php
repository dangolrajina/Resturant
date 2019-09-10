@extends('layouts.app')
@section('data')


<section class="banner_area">
	<div class="container">
		<div class="banner_content">
			<h4>Checkout</h4>
			<a class="active" href="menu-list.html"></a>
		</div>
	</div>
</section>
<!--================End Banner Area =================-->

<section id="form" style="margin-top: 20px;"><!--form-->
	<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Checkout</li>
				</ol>
			</div>
		<form action="{{url('/checkout')}}" method="post">
			{{csrf_field()}}
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Deliver/Bill To</h2>
						<div class="form-group">
							<input type="text" class="form-control" name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{$userDetails->name}}"@endif placeholder="Billing Name"/>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="billing_address" id="billing_address"  placeholder=" Billing Address" />
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="billing_city" id="billing_city"  placeholder="Billing City"/>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="billing_mobile" id="billing_mobile"  placeholder="Billing Mobile"/>
						</div>
					</div><!--/login form-->
					<button type="submit" class="btn btn-primary">Continue to Checkout</button>
					<div class="clearfix" style="padding-top: 12px;"></div>
				</div>
			</div>
		</form>
	</div>
</section><!--/form-->

@endsection
