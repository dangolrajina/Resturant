<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin">
    <title>Admin </title>
    <link rel="icon" type="image/png" href="{{asset('icon/feather.png')}}" sizes="32x32">
    <link rel="stylesheet" href="{{asset('backend/admin-login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <style>
    #back_ground {
        background-image: url('/icon/1986185.jpg');
        background-color: #FFFFFF;
        background-repeat: no-repeat;
        background-size: 67% 97%;
    }

    body.login .login-sidebar {
        border-top:5px solid #22A7F0;
    }
    @media (max-width: 767px) {
        body.login .login-sidebar {
            border-top:0px !important;
            border-left:5px solid #22A7F0;
        }
    }
    body.login .form-group-default.focused{
        border-color:#22A7F0;
    }
    .login-button, .bar:before, .bar:after{
        background:#22A7F0;
    }
</style>
</head>
<body class="login">
    <div id="back_ground">

        <div class="container-fluid">
            <div class="row">
                <div class="faded-bg animated"></div>
                <div class="hidden-xs col-sm-7 col-md-8">
                    <div class="clearfix">
                        <div class="col-sm-12 col-md-10 col-md-offset-2">
                            <div class="logo-title-container">   
                              <img class="" >
                              <div class="copy animated fadeIn">
                                <h1>Login</h1>
                                <p>Welcome to Dashboard</p>
                            </div>
                        </div> <!-- .logo-title-container -->
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">
                <div class="login-container">

                    <p>Sign In Below:</p>

                    <form method="POST" action="{{ route('admin.login.submit') }}">
                     @csrf
                     <div class="form-group form-group-default" id="emailGroup">
                        <label>E-mail</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="" placeholder="E-mail" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> Logging in...</span>
                        <span class="signin">Login</span>
                    </button>

                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                        Forgot Your Password?
                    </a>
                </form>
                
                <div style="clear:both"></div>
            </div> <!-- .login-container -->
            <div>
                <img src="/icon/birds.png" style="width: 100%;
                    position: absolute;
                    height: 412px;
                    right: 0px;
                    transition-property: 404px;
                    top: 277px;">
            </div>
        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
</div>
</body>
</html>