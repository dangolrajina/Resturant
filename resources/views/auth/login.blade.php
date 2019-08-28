@extends('layouts.app')

@section('data')
        
<!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>User Login In Form</h4>
                    
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Booking Table Area =================-->
        <section class="booking_table_area booking_area_white">
            <div class="container">
                <div class="s_black_title">
                    <h3>User Login In</h3>
                    <h2>Form</h2>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="form-group">
                   
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
               
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    
                                </div>
                            </div>
                        </div>
               

                <button type="submit" value="submit" style="margin-left: 295px;" class="btn btn-primary">Login</button>
            </form> 
            </div>
        </section>
        <!--================End Booking Table Area =================-->
        

@endsection
