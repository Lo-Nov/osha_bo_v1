@extends('layouts.app')
@section('content')
    <!--  pay confirmation pop up-->
    <section class="account-pop-up h-100vh w-100 justify-content-center align-items-center animated d-none" id="pay-confirmation-pop">
        <div class="container p-md-5 p-sm-0">
            <div class="row p-5 d-flex justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-5 payment-pop-container m-5 m-sm-3 d-flex flex-column-md animated p-0">

                    <div class="col-12 position-relative p-0">
                        <span class="close-receipt-form position-absolute z-index-1 d-none transactions-actions animated text-white" id="close-pricepop"> <i data-feather="x"></i></span>

                        <div class="">
                            <div class="show-amount-loader">
                                <center class="p-5 text-white">
                                    <div class="lds-roller animated"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                                    <div class="confirmed-pay d-none animated"><img src="img/icons/transactions-icons/check.svg"></div>
                                    <p class="text-center text-white m-0 p-0 mb-3  payment-status">pending daily parking payment</p>
                                    <h2 class="mb-5 pb-5   text-white"><sup class="font-14 text-uppercase">KES</sup><span id="payable_amount"></span></h2>
                                </center>
                            </div>
                            <div class="col-12 p-lg-5 p-sm-3 ">
                                <div class="col-12 p-0 transacton-instructions">
                                    <h5><strong class="  pb-3">payment procedure</strong></h5>
                                    <p class="font-12">follow the following payment procedure in order to complete the payment</p>

                                    <hr>
                                    <ul type="1" class="font-14 pb-5">
                                        <li>1.Wait for a <strong>payment pop </strong>up on your phone.</li>
                                        <li>2.Enter your <strong>M-PESA pin</strong> and click OK.</li>
                                        <li>3.An <strong>MPESA</strong> confimation SMS will be sent to you.</li>
                                        <li>4.Wait for upto <strong>45 secs</strong> as we process your transaction</li>
                                    </ul>
                                </div>

                                <div class="col-12 p-0 pb-3 d-none transactions-actions animated mt-5">
                                    <h5><strong class="  pb-3">Thank You!</strong></h5>
                                    <p class="font-14   m-0">Payment was succesfully initiated.</p>
                                    <p class="font-14">Kindly complete payment as indicate on your phone before proceeding to prin the receipt</p>
                                    <a href="#" class="btn btn-primary px-5 py-3 text-white text-uppercase font-12 font-sm-10 px-sm-4 get-a-receipt">Print Receipts</a>
                                    <a href="#" class="btn btn-secondary px-5 py-3 text-black text-uppercase font-12 font-sm-10 px-sm-4">add to assets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  pay confirmation pop up-->
    <section id="service-form-section" class="">
        <div class="container">
            <div class="row p-5 ">
                <div class="service-form-container  d-flex flex-column-md animated col-12 p-0">
                    <div class="col-lg-7 service-form-img-container" id="health-img">
                        <div class="col-lg-8 col-md-12 position-relative p-5">
                            <h2 class="mb-4">NCCG Health Department</h2>
                            <p class="font-14 mb-3  ">Fill in and remember to double check details to avoid any errors.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 p-5 position-relative transactions-form-container d-flex">
                        <div class="col-12 p-0 the-transaction-form animated">
                            <div class="">
                                <p class="mb-5 pb-2  "><strong>Correctly fill in the form below to continue</strong></p>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="transaction-form" action="{{ route('get-corporate-individuals')  }}" method="post">
                                @csrf
                                <div id="errors" class="alert alert-danger d-none"></div>
                                <div class="form-group col-sm-12 col-md-12 p-0 mt-2 mb-5">
                                    <label for="mpesa-phone" class=" ">Corporate Id / Business ID</label>
                                    <input type="text" class="form-control" id="plot" placeholder="Enter your national ID number" name="corporateId" value="{{old('corporateId')}}">
                                </div>

                                <div class="col-sm-2 float-right d-none" id="loader2" >
                                    <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
                                </div>

                                <div class="col-12 px-0 text-uppercase mt-5 pt-5">
                                    <button type="submit" class="btn btn-primary text-white font-14 w-100 p-4 center mx-0">
                                        <span class="btn-text text-uppercase font-12">Pull Individuals</span>
                                        <i data-feather="arrow-right" class="ml-2 float-right pull-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 d-none p-0 animated details-confirm">

                            <div class="">
                                <p class="mb-5 pb-2  ">
                                    <span class="back-toform" title="back to transactions form"><i data-feather="arrow-left"  class="mr-3 float-left"></i></span><strong id="otp-sent"></strong>
                                </p>
                                <hr class="mt-1 p-0">
                                <!-- <p><strong class=" ">Land details</strong></p> -->

                                <div class="transactions-details-container  ">

                                    <form>
                                        <div id="opt_errors" class="alert alert-danger d-none"></div>
                                        <div id="pin_errors" class="alert alert-danger d-none"></div>
                                        <div class="form-group col-sm-12 col-md-12 p-0">
                                            <label for="number-plate" class=" ">PIN</label>
                                            <input type="text" class="form-control" id="amount" placeholder="Enter pin sent to your phone" name="pin" value="{{old('pin')}}">
                                        </div>
                                        <div class="col-sm-2 float-right d-none" id="loader3" >
                                            <img src="{{ asset('img/loader/loader.gif') }}" alt="" />
                                        </div>
                                        <div class="col-12 px-0 text-uppercase mt-5 pt-5">
                                            <button id="check-otp" class="btn btn-primary text-white font-14 w-100 p-4 center mx-0"><span class="btn-text text-uppercase font-12">Check for certificates</span> <i data-feather="arrow-right" class="ml-2 float-right pull-right"></i></button>
                                        </div>
                                    </form>
                                    <!--  -->

                                    <br><br>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--form section-->
@endsection
