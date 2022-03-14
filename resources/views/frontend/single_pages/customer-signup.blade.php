@extends('frontend.layouts.master')

@section('content')
    <style type="text/css">

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 600px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
            margin-bottom: 170px;

        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>

    <div id="login">
        <h3 class="text-center text-white pt-5">SignUp form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form cpass" action="{{route('signup.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label  class="text-info">Full name :</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Mobile No :</label><br>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info ">Confirm Password:</label><br>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign Up">
                                <i class="fa fa-user"> Have Account? <a href="{{route('customer.login')}}"><span> Login Here </span> </a></i>

                            </div>

                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

