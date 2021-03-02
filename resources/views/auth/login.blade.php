@extends('layouts.front-app')
@section('content')
    <div class="container h-100 p-0">
        <div class="row h-100">
            <div class="col-lg-12 my-auto">
                <div class="device-container light-box">
                    <!-- Login -->
                    <div class="login__block active p-0" id="l-login">
                        <div class="login__block__header">
                            
                            <div class="actions actions--inverse login__bleock__actions">
                                <div class="dropdown">
                                    <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-register" href="#">Create an account</a> <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-forget-password" href="#">Forgot password?</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-3 pt-3 text-black">
                            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded" height="150px" src="img/logo.png" alt="Image"></a></div>
                            @if($errors->any())
                                <p class="alert alert-danger mt-3">{{$errors->first()}}</p>
                            @endif

                            <h3 class="text-black mt-3 px-4 text-center"><strong class="text-black">Login</strong></h3>
                            <p class="px-4 text-center"><small class="text-black">Input your account credentials to continue</small></p>
                        </div>
                           <form action="{{ route('health-login') }}" method="post" class="mb-3" id="loginForm">
                            @csrf
                            
                            <div class="col-12 px-5 pt-2 pb-0">
                                <div class="wrap-input100 validate-input mb-5" data-validate="Name is required">
                                    <span class="label-input100 pull-left w-100 text-left name-lable">Account Username</span>
                                    <input id="user_name" type="email" placeholder="Enter username" autocomplete="off" required class="input100  emaiil is-invalid" type="text" placeholder="Enter your username" name="user_name" required autocomplete="email" autofocus placeholder="Enter E-mail Address">
                                    <span class="focus-input100 mb-2"></span>
                                </div>
                                <div class="wrap-input100 validate-input mb-4" data-validate="Valid password is required">
                                    <span class="label-input100 pass-lable">Your Password</span>
                                    <input id="password" required class="input100 is-invalid" type="password"  required  placeholder="Enter your account password" name="password">
                                    <span class="focus-input100"></span>
                                </div>
                                <a class="text-muted" href="{{  route('health-forgot-password') }}">Forgot your password?</a>
                            </div>
                            <div action="index.html" class="form-group row mb-0">
                                <div class="col-md-12 mb-0 pb-0 dropdown">
                                    <button class="m-0 p-3 text-center drop-bottom w-100 mb-24rem mt-3 btn login-btn text-capitalize" type="submit">
                                        LogIn<i data-feather="arrow-right" class="ml-3" id="login-btnk"></i>
                                    </button>
                                </div>
                            </div>
                     
                        </form>
                    </div>
                </div>
            </div>
            <!--				show this when there is an error-->
           
        </div>
    </div>

    <div class="wrapper d-none">
        <div class="block-center mt-4 wd-xl">
            <!-- START card-->
            <div class="card card-flat">
                <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded" src="img/logo.png" alt="Image"></a></div>
                <div class="card-body">
                    <p class="text-center py-2" style="color: black">SIGN IN TO CONTINUE.  | <a href="{{ url('/') }}">Home</a> </p>
                    @if($errors->any())
                        <p class="alert alert-success mt-3">{{$errors->first()}}</p>
                    @endif
                    <form action="{{ route('health-login') }}" method="post" class="mb-3" id="loginForm" novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="input-group with-focus"><input  name="user_name" class="form-control border-right-0" id="user_name" type="email" placeholder="Enter username" autocomplete="off" required>
                                <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-envelope"></em></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group with-focus"><input name="password" class="form-control border-right-0" id="password" type="password" placeholder="xxxxxxxxxx" required>
                                <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="checkbox c-checkbox float-left mt-0"><label><input type="checkbox" value="" name="remember"><span class="fa fa-check"></span> Remember Me</label></div>
                            <div class="float-right"><a class="text-muted" href="{{  route('health-forgot-password') }}">Forgot your password?</a></div>
                        </div><button class="btn btn-block btn-primary mt-3" type="submit">Login</button>
                    </form>
                    {{--  <p class="pt-3 text-center">Need to Signup?</p><a class="btn btn-block btn-secondary" href="register.html">Register Now</a>  --}}
                </div>
            </div><!-- END card-->
            <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2020</span><span class="mr-2">-</span><span>Health</span><br><span>Nairobi City County Government</span></div>
        </div>
    </div><!-- =============== VENDOR SCRIPTS ===============-->
@endsection
