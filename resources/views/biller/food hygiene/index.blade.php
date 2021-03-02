@extends('layouts.app')

@section('content')
    <!-- Main section-->
    <section class="content">
        <header class="content__title px-0 border-0">
               <span class="rev-title-container">
                 <h1 class="text-capitalize stream_name m-0">Welcome back: {{ Session::get('resource')[0]['user_full_name'] }}</h1>
               </span>
            <small>Enter Business Id <strong class="stream_name">to process your application of food hygiene</strong></small>
        </header>

        <div class="row quick-stats">
            <div class="col-md-12">
                <div class="quick-stats__item bg-primary-green bg-pattern">
                    <div class="quick-stats__info">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
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

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> </h4>
                        <hr>

                        {{--                        <img src="{{ asset('img/docs.svg') }}">--}}
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
@endsection
