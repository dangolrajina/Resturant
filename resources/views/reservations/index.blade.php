@extends('layouts.app')
@section('data')

 <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4></h4>
                    
                </div>
            </div>
        </section>
       <section class="booking_table_area booking_area_white">
            <div class="container">
                <div class="s_black_title">
                    <h3>Book a</h3>
                    <h2>Table</h2>
                    <p>Book is a powerful tool that puts you in control of your table and ... Know the status of your tables in real time, making it easier to manage tables and avoid.</p>
                </div>
                <form class="form_area" method="post" action="/reservations">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <div class="input-append date form_datetime">
                                <input size="16" type="text" value="" readonly placeholder="Date" name="date">
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="input-append date form_time">
                                <input size="16" type="text" value="" readonly placeholder="Dining time" name="time">
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="party_size">
                                 <input type="number" class="form-control" id="number" placeholder="No of people" name="total_ppl">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone_number">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" rows="3" name="description" placeholder="Additional notes.."></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-default submit_btn">BOOK MY TABLE</button>
                        </div>
                    </div>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
               
                </div>
            </div>
        </section>
        <!--================End Booking Table Area =================-->
     

        @endsection
