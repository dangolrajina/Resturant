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
                <div class="row map_contact">
                    <div class="col-md-6">
                        <div class="map_area">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.8666396062!2d-74.25819367467702!3d40.70531099097622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1489317146051" style="border:0"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="map_contact_info">
                            <h3>Contact Information</h3>
                            <p>This section collects information about different ways to contact you. This information is important early in the application process if you're ....</p>
                            <ul>
                                <li><a href="#"><span>Address:</span>Kathmandu-Baneshwor 200</a></li>
                                <li><a href="#"><span>Phone:</span>+0 000-000-0000</a></li>
                                <li><a href="#"><span>Email</span> support@themeXart.com</a></li>
                            </ul>
                            <h4>Opening Times</h4>
                            <h5>Monday - Friday 8am - 10pm</h5>
                            <h5>Saturday 2pm - 10pm | Sunday 10am - 10pm</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Booking Table Area =================-->
     

        @endsection
