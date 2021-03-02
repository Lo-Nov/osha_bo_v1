<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('global.title') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/new-age.css" rel="stylesheet" />
    <link href="css/app.min.css" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="css/icon_fonts/css/icon_set_1.css">
    <link rel="stylesheet" href="css/icon_fonts/css/icon_set_2.css">
    <link rel="stylesheet" href="css/icon_fonts/css/icon_set_3.css">
    <link rel="stylesheet" href="css/icon_fonts/css/icon_set_4.css">
    <link rel="stylesheet" href="css/new_font_icon/font/flaticon.css">

    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="img/county.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/county.png">
    <link href="~/css/landing-page.css" rel="stylesheet" />

</head>

<body id="page-top">


    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-7 my-auto">
                    <div class="header-content mx-auto">
                        <h1 class="">
                         <strong class="landing-title">OSHA  KENYA</strong>
                        </h1>
                        <blockquote>
                            <p>Ensure safe and healthful working conditions for employees</p>
                        </blockquote>
                        <div class="col-12 landing-module-header p-0">
                            <div class="col-2 p-0">
                                <span class="landing-page-module mr-2"><strong>Modules</strong></span>
                            </div>
                            <div class="col-11 p-0 line"></div>
                        </div>
                        <span class="module-holder">
                                  <!-- Lab -->
                                  <a href="{{ route('login') }}" class="module-content my-3 mx-3">
                                    <div><span class="flaticon-dropper"></span></div>
                                    <span class="module-content-text">Practitioner</span>
                                </a>

                            <!-- Doctors -->
                            <a href="{{ route('login') }}" class="module-content my-3 mr-3">
                                <div><span class="flaticon-doctor"></span></div>
                                <span class="module-content-text">OSHA Admin</span>
                            </a>


                            <!-- Corporates -->
                            <a href="{{ route('login') }}" class="module-content cop my-3 ml-3">
                                <div><span class="flaticon-team"></span></div>
                                <span class="module-content-text">Corporates</span>
                            </a>


                            <!-- Reports -->
                            <a href="{{ route('login') }}" class="module-content my-3 mx-3">
                                <div><span class="flaticon-marketing"></span></div>
                                <span class="module-content-text">Reports</span>
                            </a>
                        </span>
                    </div>
                </div>

                <div class="col-lg-5 my-auto">
                    <div class="device-container">

                        <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                        <img src="{{ asset('img/kenyalogo.png') }}" class="img-fluid county_logo" alt="county logo">

                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Bootstrap core JavaScript -->
    <script src="~/login/vendor/jquery/jquery.min.js"></script>
    <script src="~/assets/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="~/login/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="~/login/css/new-age.min.js"></script>

</body>

</html>
