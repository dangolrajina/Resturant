
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/express-favicon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Restaurant Management System</title>

        <!-- Icon css link -->
        <link href="{{ asset('front/vendors/material-icon/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <link href="{{ asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('front/vendors/linears-icon/style.css')}}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="{{ asset('front/vendors/revolution/css/settings.css')}}" rel="stylesheet">
        <link href="{{ asset('front/vendors/revolution/css/layers.css')}}" rel="stylesheet">
        <link href="{{ asset('front/vendors/revolution/css/navigation.css')}}" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="{{ asset('front/vendors/bootstrap-selector/bootstrap-select.css')}}" rel="stylesheet">
        <link href="{{ asset('front/vendors/bootatrap-date-time/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('front/vendors/owl-carousel/assets/owl.carousel.css')}}" rel="stylesheet">
        
        <link href="{{ asset('front/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('front/css/responsive.css')}}" rel="stylesheet">
         <script>
            window.App = {!! json_encode([
                'csrfToken' => csrf_token(),
                'user' => Auth::user(),
                'signedIn' => Auth::check()
            ]) !!};
        </script>
    </head>
    <body>
       <div id="app">
        
       {{-- <div id="preloader">
        
            <div class="loader absolute-center">
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
            </div>
        </div>
                --}}
       
        <!--================ Frist hader Area =================-->
        <div class="first_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="header_contact_details">
                            <a href="#"><i class="fa fa-phone"></i>+977 9800000000</a>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="event_btn_inner">
                            <a class="event_btn" href="/reservations"><i class="fa fa-table" aria-hidden="true"></i>Book a Table</a>
                            
                            @guest
                                <a class="event_btn" href="/register"><i class="fa fa-sign-in" aria-hidden="true"></i>Register</a>
                                <a class="event_btn" href="/login"><i class="fa fa-lock" aria-hidden="true"></i>Sign In</a>
                            @else
                                <a class="event_btn"><i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->name }}
                                </a>
                                <a class="event_btn" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                         <i class="fa fa-lock" aria-hidden="true"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            @endguest
                             
                        </div>
                    </div>
            </div>
        </div>
    </div>
        
        <header class="main_menu_area" style="    overflow: hidden;">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="/front/img/logo-1.png" alt=""
                            ></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="/">Home</a>
                            </li>
                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About US <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/about-us">About Us</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/menu">Menu Grid</a></li>
                            
                                </ul>
                            </li>
                            <li class="hide"></li>
                            <li><a href="gallery.html">Gallery</a></li>
                             
                            <li><a href="/contact">Contact US</a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-10">

                            <form class="card card-sm" style="margin-left: 510px;">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <!-- <div class="col" style="margin-top: -38px;">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                    </div>
                                    <!--end of col-->
                                   <!-- ?<div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit" style="margin-left: 660px;margin-top: -65px;">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
        </header>
        

        
        @yield('data')

        <footer class="footer_area">
            <div class="footer_widget_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <aside class="f_widget about_widget">
                                <div class="f_w_title">
                                    <h4>ABOUT Restaurant</h4>
                                </div>
                                <p>This system is developed to provide service facility to restaurant and also to the customer. This can be used by employees in a restaurant to handle the clients, their orders and can help them easily find free tables or place orders.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-3">
                            <aside class="f_widget contact_widget">
                                <div class="f_w_title">
                                    <h4>CONTACT US</h4>
                                </div>
                                <p>Have questions, comments or just want to say hello:</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-envelope"></i>restaurant@gmail.com</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-3">
                            <aside class="f_widget twitter_widget">
                                <div class="f_w_title">
                                    <h4>Twitter Feed</h4>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#">@_sumonrahman:</a> Twitter feed can help prevent it from getting out of control.
                                    </li>
                                    <li>
                                        <a href="#">@_sumonrahman:</a> Twitter feed application provides a platform where store owners can interact with customers through their own stores or websites.
                                    </li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-3">
                            <aside class="f_widget gallery_widget">
                                <div class="f_w_title">
                                    <h4>Gallery On Flickr</h4>
                                </div>
                                <ul>
                                   
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy_right_area">
                <div class="container">
                    
                    <div class="pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <flash message="{{ session('flash') }}"></flash>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('front/js/jquery-2.1.4.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
        <!-- Rev slider js -->
        <script src="{{ asset('front/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{ asset('front/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{ asset('front/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
        <script src="{{ asset('front/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
       
        <script src="{{ asset('front/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script src="{{ asset('front/vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <!-- Extra plugin js -->
        <script src="{{ asset('front/vendors/bootstrap-selector/bootstrap-select.js')}}"></script>
        <script src="{{ asset('front/vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{ asset('front/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('front/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('front/vendors/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('front/vendors/countdown/jquery.countdown.js')}}"></script>
        <script src="{{asset('front/vendors/js-calender/zabuto_calendar.min.js')}}"></script>
        <script src="{{asset('front/js/theme.js')}}"></script>

    </body>
</html>