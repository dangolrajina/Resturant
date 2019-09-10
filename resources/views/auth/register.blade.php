@extends('layouts.app')

@section('data')


 <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>About Us</h4>
                    
                </div>
            </div>
        </section>
        
<section class="booking_table_area booking_area_white" style="padding-top: 190px;">
    <div class="container">
        <div class="s_black_title">
            <h3>User Registration</h3>
            <h2>Form</h2>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}" role="form" name="form1" >
            @csrf
            <div class="form-group">
                <label for="firstName" class="col-sm-4 control-label">User Name</label>
                <div class="col-sm-5">
                    <input type="text" name="name" id="firstName" placeholder="First Name" class="form-control" required autofocus="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Email* </label>
                <div class="col-sm-5">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" name="text1" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-4 control-label">Password*</label>
                <div class="col-sm-5">
                    <input type="password" id="password" placeholder="Password" class="form-control" name="password" required autocomplete="new-password" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="cpassword" class="col-sm-4 control-label">Confirm Password*</label>
                <div class="col-sm-5">
                    <input type="password" id="cpassword" placeholder="Password" class="form-control" name="password_confirmation" required autocomplete="new-password" required autofocus>
                </div>
            </div>
            <button type="submit" value="Submit" onclick="return Validate()" class="btn btn-primary" style="margin-left: 494px;">Register</button>
        </form> 
    </div>
</section>
@endsection
