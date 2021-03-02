@extends('layouts.app')

@section('content')
    <!-- Main section-->
    <section class="content">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" >
                        <h4 class="card-title">Apply for food hygiene license</h4>
                        <hr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="transaction-form p-0 w-100 row">
                            <div class="col">
                                <p class="alert alert-danger d-none" id="msg-danger"></p>
                                <p class="alert alert-success d-none" id="msg-success"></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 alert alert-info"></div>
                                <div class="col-md-6 alert alert-danger"></div>
                            </div>


                            <div class="col-12 mt-2">
                                <p class="mb-3 text-capitalize"><strong>Personal details <strong class="text-danger">*</strong></strong></p>
                                <hr>
                            </div>

                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <label for="fname" class="text-capitalize">businessName <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control " id="BusinessName" name="BusinessName" value="{{ $getSBPDetails->data->BusinessName}}"  placeholder="Enter business name" >
                            </div>


                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <label for="businessID" class="text-capitalize">business ID</label>
                                <input type="text" class="form-control " id="businessID" name="businessID" value="{{ $getSBPDetails->data->BusinessID}}" placeholder="Enter business ID" >

                            </div>



                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <label for="telephone1" class="text-capitalize">Telephone 1 <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control " id="telephone1"  name="telephone1" placeholder="eg Enter your last name" value="{{ $getSBPDetails->data->ContactPersonTelephone1}}" >
                            </div>

                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <label for="telephone2" class="text-capitalize">telephone 2  <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control " id="telephone2" placeholder="Enter telephone2" value="{{ $getSBPDetails->data->ContactPersonTelephone2 }}" name="telephone2" placeholder="Enter your telephone2" >
                            </div>



                            <div class="form-group col-md-12 col-lg-4 mt-2  employed">
                                <label for="phone" class="text-capitalize">Physical address <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control first-required" id="address" placeholder="enter physical address" value="{{  $getSBPDetails->data->PhysicalAddress }}" name="address" >

                            </div>

                            <div class="form-group col-md-12 col-lg-4 mt-2  employed">
                                <label for="phone" class="text-capitalize">Postal Code <strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control first-required" id="postalCode" placeholder="enter postal code" value="{{  $getSBPDetails->data->ContactPersonPostalCode }}" name="postalCode" >

                            </div>


                            <div class="col-12 mt-2">
                                <p class="mb-3 text-capitalize"><strong>Business information <strong class="text-danger">*</strong></strong></p>
                                <hr>
                            </div>

                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <label for="street" class="text-capitalize">County<strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control first-required" id="county" name="county" value="Nairobi" placeholder="Enter County" >
                            </div>

                            <div class="form-group col-md-12 col-lg-4 mt-2  employed">
                                <label for="town" class="text-capitalize">Town<strong class="text-danger">*</strong></label>
                                <input type="text" class="form-control" id="town" name="town" placeholder="Enter the town" >
                            </div>

                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <label for="zone" class=" ">Sub county<strong class="text-danger">*</strong></label>
                                <select  id="subcounty" name="subCountyId" class="first-required select2">
                                    <option>-- select subcounty --</option>
                                    @foreach($subcounties->response_data as $subcounty)
                                        <option value="{{$subcounty->SubCountyID}}">{{$subcounty->SubCountyName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-1 float-right d-none" id="loader4" >
                                <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
                            </div>
                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <label for="wardId" class=" ">Ward<strong class="text-danger">*</strong></label>
                                <select  id="ward" name="wardId" class="first-required select2">
                                    <option>-- select ward --</option>

                                </select>
                            </div>


                            <div class="col-sm-12 pt-3">
                <span type="submit" id="create-next" class="btn btn-primary text-white font-12 border-0 text-capitalize next-btn btn-confirm" data-toggle="modal" data-target="#pending-loader">
                   <i class="fa fa-save"></i> Apply for food hygiene</span>

                                <div class="col-lg-1 float-right d-none" id="loader14" >
                                    <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
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
    {{-- my loader container --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
        $('.btn-confirm').click(function(){

            var businessName = $("#BusinessName").val();
            var businessID = $("#businessID").val();
            var telephone1 = $("#telephone1").val();
            var telephone2 = $("#telephone2").val();
            var address = $("#address").val();
            var postalCode = $("#postalCode").val();
            var county = $("#county").val();
            var subCountyId = $("#subcounty").val();
            var wardId = $("#ward").val();
            var town = $("#town").val();

            if(businessName === ""){
                $('#businessName').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(businessID === ""){
                $('#businessID').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(telephone1 === ""){
                $('#telephone1').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(telephone2 === ""){
                $('#telephone2').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(address === ""){
                $('#address').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(postalCode === ""){
                $('#postalCode').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(county === ""){
                $('#county').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(subCountyId === ""){
                $('#subCountyId').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(wardId === ""){
                $('#wardId').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }else if(town === ""){
                $('#town').css( "border-color", "red" );
                $("#pending-loader .notification-warning").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                $('#pending-loader .notification-warning p').html('check the field highlighted in <strong class="text-danger">Red</strong> and ensure it has a value.');
                $('#pending-loader .notification-warning h2').text('Empty Field');
                return;
            }

            $('#loader14').removeClass('d-none');


            $.ajax({
                url: "register-food-hygiene" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {businessName:businessName, businessID:businessID, telephone1:telephone1, telephone2:telephone2,address:address, postalCode:postalCode, county:county, subCountyId:subCountyId, wardId:wardId, town:town},

                success:function(data){
                    if(data.success.success === true){

                        setTimeout(function(){
                            window.location = '<?php echo url('get-health-bill') ?>/'+data.success.data.businessID;
                        }, 5000);

                        $("#pending-loader .notification-success").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                        $("#pending-loader .notification-success p").text(data.success.message);

                        console.log(data.success.data.businessID);
                        $('#loader14').addClass('d-none');
                        //$('#msg-success').removeClass('d-none');


                        //$("#msg-success").html(data.success.message);
                        //$("#msg-success").delay(5000).fadeOut('slow');
                        //a.href = "get-health-bill/" +data.success.data.businessID;


                    }else{
                        setTimeout(function(){
                            window.location = '<?php echo url('get-health-bill') ?>/'+data.success.data.businessID;
                        }, 5000);

                        // alert("some error");
                        $("#pending-loader .notification-danger").removeClass('d-none').siblings().addClass('d-none').parent().parent().siblings('.modal-footer').removeClass('d-none');
                        $("#pending-loader .notification-danger p").text(data.success.message);
                        $("#pending-loader .notification-danger h2").text("Redirecting");
                        $("#pending-loader img").attr('src','{{ asset('img/notifications/search.svg') }}');

                        console.log(data.success.data.businessID);
                        // console.log(data.success.message);
                        $('#loader14').addClass('d-none');
                        //$('#msg-danger').removeClass('d-none');



                        //$("#msg-danger").html(data.success.message);
                        //$("#msg-danger").delay(10000).fadeOut('slow');
                    }





                    //console.log(data.success.message);
                    // a.href = "get-health-bill/" +data.success.data.businessID;

                    //document.getElementById("msg").innerHTML = data.success.message.toLocaleString();

                    //$('#msg').html(data.success.message).fadeIn('slow');

                    //$('#msg').html("data insert successfully").fadeIn('slow') //also show a success message
                    //$('#msg').delay(5000).fadeOut('slow');
                },
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

        $(document).ready(function ()
        {
            $('#subcounty').on('change',function(){
                $('#loader4').removeClass('d-none');
                $('#ward').addClass('d-none');
                var subcountyID = $(this).val();
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
    <script type="text/javascript">
        $('.btn-getBusinessDetails').click(function(){
                var businessID = $('input[name=businessID]').val()
                alert();
            });
    </script>
        @endsection






















