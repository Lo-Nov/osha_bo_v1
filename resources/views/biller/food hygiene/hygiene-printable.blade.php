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
                <div class="col-12 service-form-img-container" id="health-img" style="height: 169px;">
                    <div class="col-lg-8 col-md-12 position-relative p-5">

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <h3>Print Food Hygiene License</h3>
                        <i>Thanks for applying for food hygiene.</i>

                        <i>Your food hygiene certificate is ready, please download</i>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('print-food-hygiene-cert') }}" target="_blank" method="post" class="transaction-form p-0 w-100 row">
                            @csrf
                            <div class="form-group col-md-12 col-lg-4 mt-2">
                                <input type="hidden" class="form-control " id="businessID" placeholder="eg Enter your Business ID" value="{{ Session::get('businessID') }}" name="businessID" >
                            </div>

                            <div class="col-sm-12 pt-3">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-download"></i> Download food hygiene License </button>

                            </div>
                        </form>

                    </div>
                    <div class="col-md-6">
                        <h3>Print receipt </h3>
                        <ul>
                            <li>Click on the Print Receipt button above and paste the bill number below</li>
                        </ul>
                        <i>Copy and paste the bill number <strong> {{ join('-', str_split($pay_id, 6))   }} </strong>  to print your receipt </i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.btn-getBusinessDetails').click(function(){
            var businessID = $('input[name=businessID]').val()
            alert();


        });
    </script>
@endsection
