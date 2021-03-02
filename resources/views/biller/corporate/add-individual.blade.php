@extends('layouts.app')
@section('content')


    <!--  pay confirmation pop up-->
    <section id="service-form-section" class="">
        <div class="container">
            <div class="row ">
                <div class="service-form-container  d-flex flex-column-md animated col-12 p-0">
                    <div class="col-md-5 service-form-img-container" id="health-img">

                        <div class="col-lg-12 col-md-12 position-relative p-5">
                            <h2 class="mb-4   text-white">New staff</h2>
                            <p class="font-14 mb-3  ">Correctly fill in the form to continu</p>
                        </div>

                    </div>
                    <div class="col-lg-7 p-5 position-relative transactions-form-container d-flex">
                        <div class="col-12 p-0 the-transaction-form animated">
                            <div class="mini-nav mb-4 mx-2">
                                <ul>
                                    <li><a href="{{  route('get-corporate-individual',Session::get('corporateId')) }}">Home</a></li>
                                    <li class="active"><a href="{{ route('add-corporate-individual') }}">Add Individual</a></li>
                                    <li><a href="{{ route('upload-individual') }}">Upload Staff</a></li>
                                </ul>
                            </div>
                            <form class="transaction-form p-0 w-100 mt-5">

                                <div class="form-group col-md-12 col-lg-12 mt-2">
                                    <label for="lname" class="text-capitalize"> ID Number <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control " id="idNo" placeholder="XXXXXXXXXX" value="{{old('idNo')}}" name="idNo" required>
                                </div>

                                <div class="form-group col-md-12 col-lg-12 mt-2">
                                    <label for="corporateId" class="text-capitalize">Corporate Id <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control " id="corporateId"  placeholder="XXXXXXX" value="{{ Session::get('corporateId') }}" name="corporateId" readonly >
                                </div>

                                <div class="col-sm-12 pt-3">
                 <span type="submit" id="create-next" class="btn btn-primary text-white font-12 border-0 text-capitalize btn-confirm"><i class="fa fa-user"></i>
                     Add Individual</span>
                                    <div class="col-lg-1 float-right d-none" id="loader14" >
                                        <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
                                    </div>
                                </div>

                                <div class="col-12 pt-5">
                                    <p class="alert alert-danger d-none" id="msg-danger"></p>
                                    <p class="alert alert-success d-none" id="msg-success"></p>

                                </div>
                            </form>
                        </div>
                        <div class="d-none">
                            <p class="mb-5 pb-2  "><strong>Correctly fill in the form below to continue</strong></p>
                        </div>


                        <!-- application form-->



                    </div>

                    <div class="col-12 d-none p-0 animated details-confirm">
                        <div class="">
                            <p class="mb-5 pb-2  ">
                                <span class="back-toform" title="back to transactions form"><i data-feather="arrow-left"  class="mr-3 float-left"></i></span><strong>Enter the PIN sent to your phone</strong>
                            </p>
                            <hr class="mt-1 p-0">

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--form section-->
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
        $('.btn-confirm').click(function(e){
            e.preventDefault();

            var idNo = $("#idNo").val();
            var corporateId = $("#corporateId").val();

            if(idNo == "")
            {
                $('#idNo').css( "border-color", "red" );
                return;
            }
            $('#loader14').removeClass('d-none');


            $.ajax({

                url: "register-corporate-individual" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {corporateId:corporateId, idNo:idNo},

                success:function(data){
                    if(data.success.success == true){



                        //console.log(data.success.message);
                        $('#loader14').addClass('d-none');
                        $('#msg-success').removeClass('d-none');


                        $("#msg-success").html(data.success.message);
                        $("#msg-success").delay(5000).fadeOut('slow');
                        //a.href = "get-health-bill/" +data.success.data.businessID;


                    }else{

                        // console.log(data.success.message);
                        $('#loader14').addClass('d-none');
                        $('#msg-danger').removeClass('d-none');



                        $("#msg-danger").html(data.success.message);
                        $("#msg-danger").delay(10000).fadeOut('slow');
                    }





                    //console.log(data.success.message);
                    // a.href = "get-health-bill/" +data.success.data.businessID;

                    //document.getElementById("msg").innerHTML = data.success.message.toLocaleString();

                    //$('#msg').html(data.success.message).fadeIn('slow');

                    //$('#msg').html("data insert successfully").fadeIn('slow') //also show a success message
                    //$('#msg').delay(5000).fadeOut('slow');
                }

            });


        })
    </script>
@endsection
