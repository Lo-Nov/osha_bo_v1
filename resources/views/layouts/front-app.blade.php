<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="~/login/vendor/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendors/animate.css">
    <link rel="stylesheet" href="{{ asset('vendors/animate.css/animate.min.css') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/new-age.css">
	    <link rel="stylesheet" href="css/login.css">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="~/login/img/county.png">
    <link rel="icon" type="image/png" sizes="96x96" href="~/login/img/county.png">

</head>

<body data-ma-theme="green">



<body id="page-top" data-ma-theme="green">
    <header class="masthead hide-overflow">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="device-container light-box">
                       @yield('content')
                    </div>
                </div>
                <!--				show this when there is an error-->

            </div>
        </div>
    </header>

    <!-- Javascript -->
    <!-- Vendors -->
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>




    <!-- Bootstrap core JavaScript -->
    <script src="~/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="~/login/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
    <script>
        var d = new Date();

        var month = d.getMonth() + 1;
        var day = d.getDate();

        var output = d.getFullYear() + '/' +
            (month < 10 ? '0' : '') + month + '/' +
            (day < 10 ? '0' : '') + day;


        $(document).ready(function () {


            $('.yeartxt').text(d.getFullYear());

            $('.cancel-icon').on('click', function () {
                fadealert();
                console.log("clicked");
            });

            document.getElementsByClassName("kev-alert").style.display = "none";

            function fadealert() {
                $('.kev-alert').removeClass('slideInRight');
                $('.kev-alert').addClass('lightSpeedOut');
            }

        });

    </script>
</body>
</html>
