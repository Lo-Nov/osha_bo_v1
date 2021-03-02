@extends('layouts.app')

@section('content')
    <!--	creating handlers bill loader-->

    <!-- Modal -->
    <div class="modal fade" id="mpesa-pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Processing Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div>

                        <div class="payment-loader">
                            <hr>
                            <center class="p-5">
                                <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                            </center>
                        </div>

                        <div class="pending-pay">

                            <h5><strong>Follow instructions bellow</strong></h5>
                            <ol type="1" class="font-14 pb-5">
                                <li>Wait for a <strong>payment pop </strong>up on your phone.</li>
                                <li>Enter your <strong>M-PESA pin</strong> and click OK.</li>
                                <li>An <strong>MPESA</strong> confimation SMS will be sent to you.</li>
                                <li>Wait for upto <strong>45 secs</strong> as we process your transaction</li>
                            </ol>
                        </div>

                        <div class="wrong-phone-number d-none">
                            <hr>
                            <h5 class="text-center mt-3"><strong>You enteed an <strong class="text-danger">Invalid</strong> phone number</strong></h5>
                        </div>

                        <div class="successful-transaction d-none">
                            <hr>
                            <center class="p-5"><img src="{{ asset('img/check.gif') }}" ></center>
                            <h5 class="text-center mt-3"><strong>The transaction was successful.</strong></h5>
                        </div>

                        <div class="request-timeout d-none">
                            <hr>
                            <h5 class="mb-2"><strong class="  mb-5">Kindly follow the following instructions to pay for your application.</strong></h5>
                            <ol>
                                <li class="font-14 m-0">Go to the M-PESA menu on your SIM Toolkit</li>
                                <li class="font-14 m-0">Under the Lipa na M-PESA option, select Pay Bill and enter <strong>367776</strong>  as the business no.</li>
                                <li class="font-14 m-0">Enter <strong id="bill_pay">{{ $getFoodHygieneBill->data->paymentCode  }}</strong>  as the account no.</li>
                                <li class="font-14 m-0">Enter KES <strong id="pay_amount">{{ $getFoodHygieneBill->data->billTotal  }}</strong>  as the amount.</li>
                                <li class="font-14 m-0">You will receive a confirmation SMS that your payment has been received.</li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="createfood-loader-container d-none animated">
        <div class="loader-container swing animated">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>

        <div class="loader-txt animated swing">
            Please wait as we prepare your application
        </div>
    </div>


    <section id="service-form-section" class="parallax-section">
        <div class="container">
            <div class="row p-5 ">
                <div class="service-form-container  flex-column-md animated col-12 p-0">
                    <div class="col-12 service-form-img-container" id="health-img" style="height: 169px;">
                        <div class="col-lg-8 col-md-12 position-relative p-5">
                            <h2 class="mb-4">Get Food Handler Bill details </h2>
                            <p class="font-14 mb-3 ">Fill in and remember to double check details to avoid any wrong submissions</p>
                        </div>
                    </div>
                    <div class="col-12 p-5 position-relative transactions-form-container d-flex">



                        <!--created bill actions-->
                        <div class="row animated bill-actions-container">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <p class="text-capitalize mb-1"><strong>Application has been made succesfully</strong></p>
                                <span class="mb-5"><small>You can pay for the bill now instantly via M-PESA or print the bill and pay for it later</small></span>
                                <p class="mb-0 p-0 mt-5">Food handlers total application is fee is</p>
                                <h4 class="mt-0 pt-0">Kes <span id="bill_amount">{{  number_format($getFoodHygieneBill->data->billTotal,2) }}</span></h4>
                                <!--					  pay via mpesa now-->
                                <div class="col-sm-12 pl-0 d-none" id="print-receipt">
                                    <p><b>You can now proceed to print your receipt</b></p>
                                    <a href="" target="_blank" id="receipt-link" class="btn btn-secondary text-white font-14 w-100  center mx-0 ">
                                        <div class="btn-txt animated">
                                            <span class="btn-text text-uppercase font-12" >Print receipt</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="payment-actions">
{{--                                    <button class="btn btn-primary text-white font-12 border-0 text-capitalize " id="show-mpesa">--}}
{{--                                        <text class="d-flex align-items-center">Pay now<i data-feather="smartphone" class="ml-3"></i></text>--}}
{{--                                    </button>--}}
                                    <input type="hidden" class="form-control col flex-grow-1 border-0" id="idNo" value="{{ $getFoodHygieneBill->data->billNo  }}" name="idNo">
                                    <button formtarget="_blank" class="btn btn-white font-12 text-primary border-2 text-capitalize btn-print-bill" id="btn-print">
                                        <text class="d-flex align-items-center">Print bill<i data-feather="printer" class="ml-3"></i></text></button>

                                    <!--mpesa form-->
                                    <div class="row mx-0 mt-4 mb-2 gray-bg p-4 animated health-mpesa position-relative d-none" id="example">

                                        <span class="close"> <i data-feather="x"></i></span>
                                        <label for="mpesa-num"><strong>Mpesa Phone Number</strong></label>
                                        <p><small>Enter your Mpesa number in the field below so as to get a payment request</small></p>
                                        <p class="d-none alert alert-danger" id="pay_errors"></p>

                                        <form class="form-inline mpesa-form flex-grow-1">
                                            <div class="form-group m-0 flex-grow-1">
                                                <input type="text" class="form-control col flex-grow-1 border-0" id="phoneNumber" placeholder="07XXXXXXXXXXXXX" name="phoneNumber" value="{{old('phoneNumber')}}">
                                                <input type="hidden" class="form-control col flex-grow-1 border-0" id="paymentCode" value="{{  $getFoodHygieneBill->data->paymentCode }}" name="paymentCode">
                                                <input type="hidden" class="form-control col flex-grow-1 border-0" id="Amount" value="{{ number_format($getFoodHygieneBill->data->billTotal)  }}" name="Amount">
                                                <input type="hidden" class="form-control col flex-grow-1 border-0" id="accNo" value="{{  $getFoodHygieneBill->data->paymentCode }}" name="accNo">
                                            </div>
                                            <button type="button" class="btn btn-primary text-white font-12 center mx-0 btn-pay" data-toggle="modal" data-target="#mpesa-pay">
                                                <div class="">
                                                    <span class="btn-text font-12">Get payment request</span>
                                                    <i data-feather="arrow-right" class="ml-2 float-right pull-right">
                                                    </i>
                                                </div>
                                                <div class="lds-ellipsis d-none animated"><div></div><div></div><div></div><div></div></div>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 p-5 bg-light">
                                <p class="text-capitalize mb-1"><strong>This is your bill information</strong></p>
                                <hr>
                                <ul>

                                    <li>Customer: <i>{{ $getFoodHygieneBill->data->customer }}</i> </li>
                                    <li>Bill Number:<i>{{  $getFoodHygieneBill->data->billNo }}</i> </li>
                                    <li>Description:<i> {{ $getFoodHygieneBill->data->description }} </i></li>
                                    <li>Fiscal Year:<i> {{ $getFoodHygieneBill->data->fiscalYear }} </i></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>
    </div>
    </section>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $("#show-mpesa").click(function(){
            $("#example").toggleClass('d-none');
        });

    </script>
    <script type="text/javascript">
        $(".btn-print-bill").click(function(e){

            e.preventDefault();
            // $('.btn-txt').addClass('d-none');
            // $('.lds-ellipsis').removeClass('d-none');
            var idNo = $('#idNo').val();

            //alert(idNo);
            window.location = '<?php echo url('print-multi-handler-bill') ?>/'+idNo;
            //window.open("print-food-hygiene-bill/" +bID);
        } );
    </script>
    <script type="text/javascript">

        $('#mpesa-pay button').on('click', function () {
            $('.pending-pay').removeClass('d-none').siblings().addClass('d-none');
            $('.payment-loader').removeClass('d-none');

        })
        $(".btn-pay").click(function(e){

            var recheck_count = 1;

            e.preventDefault();
            $('.btn-txt').addClass('d-none');
            $('.lds-ellipsis').removeClass('d-none');

            var paymentCode = $('#paymentCode').val();
            var Amount = $('#Amount').val();
            var accNo = $('#accNo').val();
            var phoneNumber = $("input[name=phoneNumber]").val();

            //alert(Amount);


            var regex = /(\+?254|0|^){1}[-. ]?[7]{1}([0-2]{1}[0-9]{1}|[9]{1}[0-9]{1}|[4]{1}[0-9]{1})[0-9]{6}/;

            if(regex.test(phoneNumber) === false)
            {
                document.getElementById('pay_errors').innerHTML = 'Please enter a valid Safaricom number';

                $('.wrong-phone-number').removeClass('d-none').siblings().addClass('d-none');

                $('#pay_errors').removeClass('d-none');
                $('#btn-text').text('PAY');
                $('#btn-text').removeClass('d-none');
                $('.lds-ellipsis').addClass('d-none');
                return;
            }
            $('#pay-confirmation-pop').removeClass('d-none');
            $('.lds-roller').removeClass('d-none');
            $('.transacton-instructions').removeClass('d-none');
            $('.payment-status').text('Awaiting payment');

            $.ajax({
                url: "/pay-food-hygiene-bill" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {phoneNumber:phoneNumber, paymentCode:paymentCode, Amount:Amount, accNo:accNo },
                success:function(data){

                    if(data == null)
                    {
                        document.getElementById('pay_errors').innerHTML = "We're having trouble initiating payment. Please try again later.";
                        $('#pay_errors').removeClass('d-none');
                        $('.btn-txt').text('PAY');
                        $('.btn-txt').removeClass('d-none');
                        return;
                    }
                    if(data.success.success == true){
                        console.log(data.success.data);

                        var pay_id = data.success.data;
                        checkagain(pay_id,recheck_count);
                    }
                    else{
                        document.getElementById("pay_errors").innerHTML = data.success.message;

                        $("#pay_errors").removeClass('d-none');
                        $('.btn-txt').text('PAY');
                        $('.btn-txt').removeClass('d-none');
                        $('.lds-ellipsis').addClass('d-none');
                        $('#payment-pop-container').addClass('d-none');

                    }
                }
            });
        } );
    </script>
    <script type="text/javascript">

        function checkagain(pay_id,recheck_count)
        {

            if(recheck_count===12)
            {

                $('.request-timeout').removeClass('d-none').siblings().addClass('d-none');
                $('.pending-pay').addClass('.d-none');
                // alert('spmething happened');

                $('.btn-txt').removeClass('d-none');
                $('.lds-ellipsis').addClass('d-none');
                $('.transacton-instructions').addClass('d-none');
                $('.transactions-actions').removeClass('d-none');
                $('.lds-roller').addClass('d-none');
                $('.confirmed-pay').removeClass('d-none');

                $('.payment-status').text('Unable to validate payment!');                    ;

            }
            else
            {
                recheck_count++;
                setTimeout(function(){
                    $.ajax({

                        url :"/get-food-hygiene-receipt/" +pay_id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            //console.log(data);

                            if(data == null)
                            {
                                document.getElementById('errors').innerHTML = "We're having trouble retrieving the receipt. Please try again later.";
                                $('#errors').removeClass('d-none');
                                $('.btn-txt').text('PAY');
                                $('.btn-txt').removeClass('d-none');
                                return;
                            }

                            if(data.success.success === true  && data.success.data.callback_returned === "PAID")
                            {

                                $('.successful-transaction').addClass('d-none').siblings().removeClass();

                                setTimeout(function(){
                                    window.location = '<?php echo url('handler-printables') ?>/'+pay_id;
                                }, 5000);


                                //$('#payment-pop-container').addClass('d-none');
                                //var a = document.getElementById('receipt-link');

                                //a.href = "get-hygiene-receipt/"+pay_id;
                                //$('.payment-actions').addClass('d-none');
                                //$('#print-receipt').removeClass('d-none');
                                // window.open("view-health-receipt/"+ pay_id);
                            }

                            else
                            {
                                checkagain(pay_id,recheck_count);
                            }


                        }
                    });
                }, 3000);

            }
        }
    </script>
@endsection





