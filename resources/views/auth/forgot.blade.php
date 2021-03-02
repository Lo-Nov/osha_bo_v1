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

                        <h3 class="text-black mt-3 px-3 text-center"><strong class="text-black">Password reset</strong></h3>
                        <p class="px-3 text-center"><small class="text-black text-center">Input your username or email address to continue.</small></p>
                    </div>
                       <form action="{{ route('forgot-password') }}" method="post" class="mb-3" id="loginForm"">
                        @csrf
                        
                        <div class="col-12 px-5 pt-3 pb-2">
                            <div class="wrap-input100 validate-input" data-validate="Name is required mb-3">
                                <span class="label-input100 pull-left w-100 text-left name-lable">Account Username</span>
                                <input id="user_name" type="email" placeholder="Enter username" autocomplete="off" required class="input100  emaiil is-invalid" type="text" placeholder="Enter your username" name="username" required autocomplete="email" autofocus placeholder="Enter E-mail Address">
                                <span class="focus-input100 mb-1"></span>
                            </div>
                           
                            <a class="text-muted" href="{{ url('/') }}">Landing page</a>
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
                    <p class="text-center py-2" style="color: black">RESET PASSWORD TO CONTINUE.  | <a href="{{ url('/') }}">Home</a> </p>
                    @if($errors->any())
                        <p class="alert alert-danger mt-3">{{$errors->first()}}</p>
                    @endif
                    <form action="{{ route('forgot-password') }}" method="post" class="mb-3" id="loginForm" novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="input-group with-focus"><input  name="username" class="form-control border-right-0" id="username" type="text" placeholder="Enter username" autocomplete="off" required>
                                <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-envelope"></em></span></div>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div><button class="btn btn-block btn-primary mt-3" type="submit">Reset Password</button>
                    </form>
                    {{--  <p class="pt-3 text-center">Need to Signup?</p><a class="btn btn-block btn-secondary" href="register.html">Register Now</a>  --}}
                </div>
            </div><!-- END card-->
            <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2020</span><span class="mr-2">-</span><span>Health</span><br><span>Nairobi City County Government</span></div>
        </div>
    </div><!-- =============== VENDOR SCRIPTS ===============-->
@endsection
