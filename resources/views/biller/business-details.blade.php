@extends('layouts.app')

@section('content')
    <!--	creating handlers bill loader-->

    <div class="createfood-loader-container d-none animated">
        <div class="loader-container swing animated">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>

        <div class="loader-txt animated swing">
            Please wait as we prepare your application
        </div>
    </div>

    <div class="container">
        <div class="row p-5 ">
            <div class="service-form-container  flex-column-md animated col-12 p-0">
                <div class="col-lg-7 service-form-img-container" id="health-img">
                    <div class="col-lg-8 col-md-12 position-relative p-5">
                        <h2 class="mb-4 text-white">Get food hygiene business details </h2>
                        <p class="font-14 mb-3 ">Fill in and remember to double check details to avoid any wrong submissions</p>
                    </div>
                </div>
                <div class="col-lg-5 p-5 position-relative transactions-form-container d-flex">
                    <div class="col-12 p-0 the-transaction-form animated">


                        <!-- application form-->
                        <div class="row food-application animated">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('pull-business-details') }}" method="post" class="transaction-form p-0 w-100 row">
                                @csrf
                                <div class="form-group col-md-12 mt-2">
                                    <label for="lname" class="text-capitalize">Business ID <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control " id="businessID" placeholder="eg Enter your Business ID" value="{{old('businessID')}}" name="businessID" >
                                </div>

                                <div class="col-sm-12 pt-3">
                                    <button type="submit" class="btn btn-primary text-white font-12 border-0 text-capitalize"><i class="fa fa-cloud-download" aria-hidden="true"></i> pull business details</button>

                                </div>
                            </form>


                        </div>
                    </div>
                </div>

                <div class="col-12 d-none p-0 animated location-info details-confirm">
                    <div class="">
                        <p id="errors"></p>
                        <p class="alert alert-danger d-none" id="bill_errors"></p>
                        <p class="mb-5 pb-2 text-capitalize">
                  <span class="back-to-cert-form" title="back to transactions form">
                      <i data-feather="arrow-left"  class="mr-3 float-left"></i>
                </span><strong>Confirm your food handlers certificate registration details</strong>
                        </p>
                        <hr class="mt-1 p-0">
                        <p><strong class="text-capitalize">Registration details</strong></p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </section>
@endsection
@section('scripts')
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>


    <script type="text/javascript">
        $('.btn-getBusinessDetails').click(function(){
            var businessID = $('input[name=businessID]').val()
            alert();


        }
    </script>

@endsection
