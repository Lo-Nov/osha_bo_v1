@extends('layouts.app')

@section('content')
    {{-- main section --}}
    <section class="content">
        <header class="content__title px-0 border-0">
            <div class="row">
                <div class="col-md-6">
                <span class="rev-title-container">
                    <h1 class="text-capitalize stream_name m-0">Update corporate phone numbers</h1>
                    <div class="actions text-black d-none">
                   <a href="#" class="actions__item zmdi zmdi-trending-up d-none"></a>
                   <a href="#" class="actions__item zmdi zmdi-check-all d-none"></a>

                   <div class="dropdown actions__item" title="choose another revenue stream d-none">
                       <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                       <div class="dropdown-menu dropdown-menu-right">
                           <a href="#" class="dropdown-item">Ngaira</a>
                           <a href="#" class="dropdown-item">Lady North</a>
                           <a href="#" class="dropdown-item">Westlands</a>
                       </div>
                   </div>
                  </div>

               </span>
                    <small>Enter the required fileds</small>
                </div>

            </div>
        </header>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card by-stream">
                    <div class="card-body">

                        <form class="kit-form" id="cform">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <p class="mb-3 text-capitalize"><strong>Personal information <strong class="text-danger">*</strong></strong></p>
                                    <hr>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="firstName" class="text-capitalize">First name <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control " id="firstName" name="firstName" value="{{old('firstName')}}"  placeholder="Enter your first name" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="otherNames" class="text-capitalize">Other Names</label>
                                        <input type="text" class="form-control " id="otherNames" name="otherNames" value="{{old('otherNames')}}" placeholder="Enter your other Names" required>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="zone" class=" ">Gender<strong class="text-danger">*</strong></label>
                                        <select  id="gender" name="gender" class="first-required form-control">
                                            <option value="">-- Select your gender --</option>
                                            <option value="Female"> Female </option>
                                            <option value="Male"> Male </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-4">
                                    <label for="idType" class=" ">ID Type<strong class="text-danger">*</strong>  </label>
                                    <select  id="idType" name="idType" class="first-required form-control">
                                        <option value="">-- select your idType --</option>
                                        <option value="1"> National Id </option>
                                        <option value="2"> Passport </option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <label for="lname" class="text-capitalize">ID Number <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control " id="idNo" placeholder="eg Enter your idNo" value="{{old('idNo')}}" name="idNo" required>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <label for="mobile" class="text-capitalize">Mobile Number <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control " id="mobile" value="{{ old('mobile') }}" name="mobile" placeholder="07xxxxxxxxx" required>
                                </div>

                                <div class="col-12 mt-2">
                                    <p class="mb-3 text-capitalize"><strong>Business information <strong class="text-danger">*</strong></strong></p>
                                    <hr>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <label for="address" class="text-capitalize">Street/Location<strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control first-required" id="address" name="address" value="{{old('address')}}" placeholder="Enter the location of the business" required>
                                </div>



                                <div class="col-sm-12 col-md-4">
                                    <label for="selfEmployed" class=" ">self Employed<strong class="text-danger">*</strong>  </label>
                                    <select  id="selfEmployed" name="selfEmployed" class="first-required form-control">
                                        <option value="">-- Select your self Employed --</option>
                                        <option value="1"> Employed </option>
                                        <option value="2"> Self employed </option>
                                        <option value="3"> Not employed </option>
                                    </select>
                                </div>



                                <div class="col-sm-12 col-md-4">
                                    <label for="postalCode" class="text-capitalize">postalCode<strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control first-required" id="postalCode" name="postalCode" value="{{old('postalCode')}}" placeholder="Enter the postalCode of the business" required>
                                </div>


                                <div class="col-sm-12 col-md-4">
                                    <label for="town" class="text-capitalize">Town<strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control first-required" id="town" name="town" value="{{old('town')}}" placeholder="Enter the town of the business" required>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <label for="county" class="text-capitalize">county<strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control first-required" id="county" name="county" value="{{old('county')}}" placeholder="Enter the county of the business" required>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <label for="subCounty" class=" ">Sub county<strong class="text-danger">*</strong></label>
                                    <select  id="subcounty" name="subCounty" class="first-required select2 form-control">
                                        <option>-- Select Subcounty --</option>
                                        @foreach($subcounties->response_data as $subcounty)
                                            <option value="{{$subcounty->SubCountyID}}">{{$subcounty->SubCountyName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-1 float-right d-none" id="loader4" >
                                    <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <label for="ward" class="text-capitalize">Ward<strong class="text-danger">*</strong></label>
                                    <select  id="ward" name="ward" class="first-required select2 form-control">
                                        <option>-- Select Ward --</option>

                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <label for="corporateId" class="text-capitalize">Business / Corporate ID <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="corporateId" name="corporateId" placeholder="Enter Id or (NA if Not employed)" required>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <label for="workGroupId" class="text-capitalize">Work Group<strong class="text-danger">*</strong></label>
                                    <select  id="workGroupId" name="workGroupId" class="first-required form-control">
                                        <option value="">-- Select your Work Group --</option>
                                        <option value="4"> Food Handlers </option>
                                        <option value="1"> Truck Drivers </option>
                                        <option value="2"> Taxi Drivers </option>
                                        <option value="3"> PSV Operators </option>
                                        <option value="5"> Medical Practioners </option>

                                    </select>
                                </div>

                                <div class="col-12">
                                   <span type="submit" id="create-next" class="btn btn-primary btn--raised text-white btn-confirm mt-4" data-toggle="modal" data-target="#pending-loader">
                                       <i class="fa fa-save"></i> Apply for food handler</span>
                                    <div class="col-lg-1 float-right d-none" id="loader14" >
                                        <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="pending-loader" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content radius-0">
                    <div class="modal-header d-none">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center class="pt-3">
                            <div class="the-loader animated fade-in">
                                <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                                <h2>Processing request</h2>
                                <p>Kindly be patient as your request is being processed. this will take a few minute.</p>
                                <hr class="iphone-line">
                            </div>

                            <div class="notification-success kev-notification d-none animated fade-in">
                                <img src="{{ asset('img/notifications/tick.svg') }}">
                                <h2>Created successfully</h2>
                                <p>Your food handler certificate has been created successfully</p>
                                <hr class="iphone-line">
                            </div>

                            <div class="notification-warning kev-notification d-none animated fade-in">
                                <img src="{{ asset('img/notifications/alert.svg') }}">
                                <h2>We are sorry</h2>
                                <p>There seems to be an issue while processing your request. Probably its an empty field on one of the <strong>required (<strong class="text-danger">*</strong>) fields</strong>.<br>Double check to ensure or <strong>Required fields are not empty</strong> Contact customer care desk if it persists.</p>
                                <hr class="iphone-line">
                            </div>

                            <div class="notification-danger kev-notification d-none animated fade-in">
                                <img src="{{ asset('img/notifications/error.svg') }}">
                                <h2>Something went wrong</h2>
                                <p>Sorry, we ran into an error while processing your request. Kindly retry the process if it persists contact our customer service desk.</p>
                                <hr class="iphone-line">
                            </div>

                            <div class="notification-registered kev-notification d-none animated fade-in">
                                <img src="{{ asset('img/notifications/warning.svg') }}">
                                <h2>Something went wrong</h2>
                                <p>Sorry, we ran into an error while processing your request. Kindly retry the process if it persists contact our customer service desk.</p>
                                <hr class="iphone-line">
                            </div>

                        </center>
                    </div>
                    <div class="modal-footer d-none">
                        <center>
                            <button type="button" class="btn btn-large btn-info px-5 text-uppercase" data-dismiss="modal">ok</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

        // firing the loader
        $('.modal-footer button').on('click', function(){
            $("#pending-loader .the-loader").removeClass('d-none').siblings().addClass('d-none');
        });

        $('.btn-confirm').click(function(){

            var firstName = $("#firstName").val();
            var otherNames = $("#otherNames").val();
            var idNo = $("#idNo").val();
            var gender = $("#gender").val();
            var selfEmployed = $("#selfEmployed").val();
            var mobile = $("#mobile").val();
            var address = $("#address").val();
            var idType = $("#idType").val();
            var postalCode = $("#postalCode").val();
            var town = $("#town").val();
            var county = $("#county").val();
            var subcounty = $("#subcounty").val();
            var ward = $("#ward").val();
            var corporateId = $("#corporateId").val();
            var workGroupId = $("#workGroupId").val();
            if(firstName === "")
            {
                $('#firstName').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(otherNames === ""){
                $('#otherNames').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(idNo === ""){
                $('#idNo').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(gender === ""){
                $('#gender').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(selfEmployed === ""){
                $('#selfEmployed').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(mobile === ""){
                $('#mobile').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(address === ""){
                $('#address').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(postalCode === ""){
                $('#postalCode').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(town === ""){
                $('#town').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }


            else if(county === ""){
                $('#county').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }


            else if(subcounty === ""){
                $('#subcounty').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }


            else if(corporateId === ""){
                $('#corporateId').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }


            else if(workGroupId === ""){
                $('#workGroupId').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }
            else if(ward === ""){
                $('#ward').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }


            $('#loader14').removeClass('d-none');

            $.ajax({

                url: "register-food-handler" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {firstName:firstName, otherNames:otherNames, idNo:idNo, gender:gender,selfEmployed:selfEmployed, mobile:mobile,address:address, idType:idType, postalCode:postalCode, town:town,county:county,subcounty:subcounty,ward:ward,corporateId:corporateId,workGroupId:workGroupId},

                success:function(data){

                    if(data.success.success === true && data.success.status === 200){
                        setTimeout(function(){
                            window.location = '<?php echo url('get-foodhandler-bill') ?>/'+data.success.data.idNo;
                        }, 5000);

                        //console.log(data.success.message);
                        // alert("congratulations");
                        $("#pending-loader .notification-success").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                        $("#pending-loader .notification-success p").html(data.success.message);

                        $('#loader14').addClass('d-none');
                        //$('#msg-success').removeClass('d-none');
                        //$("#msg-success").html(data.success.message);
                        //$("#msg-success").delay(5000).fadeOut('slow');
                        //a.href = "get-health-bill/" +data.success.data.businessID;
                    }else if(data.success.success == false && data.success.status == 200){
                        setTimeout(function(){
                            window.location = '<?php echo url('get-foodhandler-bill') ?>/'+data.success.data.idNo;
                        }, 5000);

                        $("#pending-loader .notification-registered").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                        $("#pending-loader .notification-registered p").html(data.success.message);
                        // alert("Are youb registered?");
                        // console.log(data.success.message);
                        $('#loader14').addClass('d-none');
                        //$('#msg-danger').removeClass('d-none');
                        //$("#msg-danger").html(data.success.message);
                        //$("#msg-danger").delay(10000).fadeOut('slow');
                    }else{
                        // alert("some error");
                        $("#pending-loader .notification-danger").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                        $("#pending-loader .notification-danger p").html(data.success.message);
                        // console.log(data.success.message);
                        $('#loader14').addClass('d-none');
                        //$('#msg-danger').removeClass('d-none');
                        //$("#msg-danger").html(data.success.message);
                        //$("#msg-danger").delay(10000).fadeOut('slow');
                    }
                } ,
                error: function(data) {

                    $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');

                    // console.log(data.success.message);
                    $('#loader14').addClass('d-none');
                    //$('#msg-danger').removeClass('d-none');
                    //$("#msg-danger").html(data.success.message);
                    //$("#msg-danger").delay(10000).fadeOut('slow');
                }

            });


        })
    </script>
    <script type="text/javascript">
        //getting selected test name

        // var test_name=$('#testNam').val();
        $('.save-mobile').click(function(e){
            e.preventDefault();

            var corporateId = $('#corporateId').val();
            var telephone1 = $("#telephone1").val();
            var telephone2 = $("#telephone2").val();

            //alert(telephone2);
            if(corporateId === "" || telephone1 ===""  ||   telephone2 ==="") {
                swal({
                    title: "Required fields",
                    text:"Please Fill All Required Field",
                    icon: "danger",
                });
                return false;
            }

            $('#loader14').removeClass('d-none');
            $.ajax({

                url: "save-mobile" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {corporateId:corporateId, telephone1:telephone1, telephone2:telephone2},

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

        $(document).ready(function ()
        {
            $('#subcounty').on('change',function(){
                $('#loader4').removeClass('d-none');
                $('#ward').addClass('d-none');
                var subcountyID = $(this).val();
                //alert(subcountyID);
                if(subcountyID)
                {
                    $.ajax({
                        url : "<?php echo url('get-wards/')?>",
                        type : "GET",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data:{subcountyID:subcountyID},

                        success:function(data)
                        {

                            $('#loader4').addClass('d-none');
                            $('#ward').removeClass('d-none');
                            $('#ward').empty();
                            $('#ward').append($('<option>', {
                                value: ' ',
                                text: '-- select ward --'
                            }));
                            $.each(data, function (i, item) {
                                $('#ward').append($('<option>', {
                                    value: item.WardID,
                                    text: item.WardName
                                }));
                            });

                        }
                    });
                }
                else
                {
                    $('#ward').empty();
                }
            });

        });
    </script>
@endsection

