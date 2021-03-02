@extends('layouts.app')

@section('content')
    <!-- Main section-->
    <section class="content">
        <header class="content__title px-0 border-0">
               <span class="rev-title-container">
                 <h1 class="stream_name m-0">Welcome : <cite style="color: green" >{{ Session::get('resource')[0]['user_full_name'] }}</cite> to the support system</h1>
               </span>
        </header>

        <div class="row quick-stats">
            <div class="col-md-12">
                <!--<div class="quick-stats__item bg-primary-green bg-pattern">
                    <div class="quick-stats__info">
                    </div>
                </div>-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" >
                        <h4 class="card-title">Pull Payment for a specific Bill</h4>
                        <hr>
                        <form class="kit-form" id="cform">
                            <div class="row">
                            <div class="col-sm-12 col-md-6">
                                 <div class="form-group">
                                     <label>
                                         <strong>Bill Number</strong>  <strong class="text-danger">*</strong>
                                     </label>
                                         <input type="text" class="form-control" id="billNo" placeholder="Enter bill number">
                                 </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-success btn--raised pull-receipt" type="submit">Pull Payment</button>
                                <span class="d-none" id="loader14" >
                                     <img src="{{ asset('img/loader/loader.gif') }}" style="size: 10px" />
                                 </span>
                            </div>


                            </div>
                         </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Merge Status for Corporates</h4>
                        <hr>

                        <form class="kit-form" id="cform1">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>Business ID</strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="businessID" placeholder="Enter business id">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-success btn--raised merge-status" type="submit">Merge Status</button>
                                    <span class="d-none" id="loader15" >
                                     <img src="{{ asset('img/loader/loader.gif') }}" style="size: 10px" />
                                 </span>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" >
                        <h4 class="card-title">Update individual working place (Corporate Id)</h4>
                        <hr>
                        <form class="kit-form" id="cform2">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>Corporate ID</strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="corporateId" placeholder="Enter corporate Id">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>National ID Number</strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="idNo" placeholder="Enter National Id">
                                    </div>
                                </div>

                                <div class="col-12 float-right">
                                    <button class="btn btn-success btn--raised updateIndividualCorporate" type="submit">Update Working Place</button>
                                    <span class="d-none" id="loader17" >
                                     <img src="{{ asset('img/loader/loader.gif') }}" style="size: 10px" />
                                 </span>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Individual Phone Number</h4>
                        <hr>
                        <form class="kit-form" id="cform11">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>National ID </strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="idNumber" placeholder="Enter business id">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>Phone Number </strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="phoneNumber" placeholder="Enter phone number">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-success btn--raised individual-number" type="submit">Correct Phone Number</button>
                                    <span class="d-none" id="loader16" >
                                     <img src="{{ asset('img/loader/loader.gif') }}" style="size: 10px" />
                                 </span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Individual Names</h4>
                        <hr>
                        <form class="kit-form" id="cform18">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>National ID </strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="idNum" placeholder="Enter business id">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>First Name </strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>Other Names </strong>  <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="text" class="form-control" id="otherNames" placeholder="Enter other names">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-success btn--raised individual-name" type="submit">Update Names</button>
                                    <span class="d-none" id="loader18" >
                                     <img src="{{ asset('img/loader/loader.gif') }}" style="size: 10px" />
                                 </span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div data-columns>

        </div>
    </section>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        //getting selected test name
        // var test_name=$('#testNam').val();
        $('.pull-receipt').click(function(e){
            e.preventDefault();

            var billNo = $('#billNo').val();

            if(billNo === ""  ) {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "pull-receipt" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {billNo:billNo},

                success:function(data){
                    $("#cform")[0].reset();

                    console.log(data.success.message);
                    $('#loader14').addClass('d-none');

                    //$("#res-table").load(window.location + " #res-table");
                    swal({
                        title: data.success.message,
                        text:data.success.message,
                        icon: "success",
                    });
                } ,
                error: function(data) {

                    console.log(data.success.message);
                    $('#loader14').addClass('d-none');
                    swal({
                        title: "Error!",
                        text:data.success.message,
                        icon: "success",
                    });

                }

            });

        })
    </script>

    <script type="text/javascript">
        //getting selected test name

        // var test_name=$('#testNam').val();
        $('.individual-number').click(function(e){
            e.preventDefault();


            var idNo = $('#idNumber').val();
            var phoneNumber = $('#phoneNumber').val();

            if(idNo === ""  || phoneNumber === "") {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader16').removeClass('d-none');
            $.ajax({

                url: "update-individual-number" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {idNo:idNo, phoneNumber:phoneNumber},

                success:function(data){
                    $("#cform11")[0].reset();

                    console.log(data.success.message);
                    $('#loader16').addClass('d-none');

                    //$("#res-table").load(window.location + " #res-table");

                    swal({
                        title: data.success.message,
                        text:data.success.message,
                        icon: "success",
                    });
                } ,
                error: function(data) {

                    console.log(data.success.message);
                    $('#loader16').addClass('d-none');
                    swal({
                        title: "Error!",
                        text:data.success.message,
                        icon: "success",
                    });

                }

            });

        })
    </script>
    <script type="text/javascript">
        //getting selected test name

        // var test_name=$('#testNam').val();
        $('.individual-name').click(function(e){
            e.preventDefault();

            var idNo = $('#idNum').val();
            var firstName = $('#firstName').val();
            var otherNames = $('#otherNames').val();

            alert(idNo);
            alert(firstName);
            alert(otherNames);

            if(idNo === ""  || firstName === "" ||  otherNames === "") {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader18').removeClass('d-none');
            $.ajax({

                url: "update-individual-name" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {idNo:idNo, firstName:firstName,otherNames:otherNames },

                success:function(data){
                    $("#cform18")[0].reset();

                    //console.log(data.success.message);
                    $('#loader18').addClass('d-none');

                    //$("#res-table").load(window.location + " #res-table");

                    swal({
                        title: data.success.message,
                        text:data.success.message,
                        icon: "success",
                    });
                } ,
                error: function(data) {

                    //console.log(data.success.message);
                    $('#loader18').addClass('d-none');
                    swal({
                        title: "Error!",
                        text:data.success.message,
                        icon: "success",
                    });

                }

            });

        })
    </script>




    <script type="text/javascript">
        //getting selected test name

        // var test_name=$('#testNam').val();
        $('.merge-status').click(function(e){
            e.preventDefault();

            var businessID = $('#businessID').val();

            if(businessID === ""  ) {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader15').removeClass('d-none');
            $.ajax({

                url: "merge-status" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {businessID:businessID},

                success:function(data){
                    $("#cform1")[0].reset();

                    console.log(data.success.message);
                    $('#loader15').addClass('d-none');

                    //$("#res-table").load(window.location + " #res-table");
                    swal({
                        title: data.success.message,
                        text:data.success.message,
                        icon: "success",
                    });
                } ,
                error: function(data) {

                    console.log(data.success.message);
                    $('#loader15').addClass('d-none');
                    swal({
                        title: "Error!",
                        text:data.success.message,
                        icon: "success",
                    });

                }

            });

        })
    </script>
    <script type="text/javascript">
        //getting selected test name



        // var test_name=$('#testNam').val();
        $('.updateIndividualCorporate').click(function(e){
            e.preventDefault();

            var corporateId = $('#corporateId').val();
            var idNo = $('#idNo').val();


            if(corporateId === "" || idNo === "" ) {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader17').removeClass('d-none');
            $.ajax({

                url: "update-individual-corporate" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {corporateId:corporateId, idNo:idNo},

                success:function(data){
                    $("#cform2")[0].reset();

                    console.log(data.success.message);
                    $('#loader17').addClass('d-none');

                    //$("#res-table").load(window.location + " #res-table");
                    swal({
                        title: "Good Job",
                        text:data.success.message,
                        icon: "success",
                    });
                } ,
                error: function(data) {

                    console.log(data.success.message);
                    $('#loader17').addClass('d-none');
                    swal({
                        title: "Error!",
                        text:data.success.message,
                        icon: "success",
                    });

                }

            });

        })
    </script>
@endsection
