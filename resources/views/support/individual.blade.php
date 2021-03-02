@extends('layouts.app')

@section('content')
    <!-- Main section-->
    <section class="content">
        <header class="content__title px-0 border-0">
               <span class="rev-title-container">
                 <h1 class="text-capitalize stream_name m-0">Welcome back: {{ Session::get('resource')[0]['user_full_name'] }} to the support system</h1>
               </span>
            <small>Showing number of test results <strong class="stream_name">made in all labs</strong></small>
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
                        <h4 class="card-title">Nairobi Health department</h4>
                        <hr>
                        @if($errors->any())
                            <p class="alert alert-danger mt-3">{{$errors->first()}}</p>
                        @endif
                        <form class="kit-form" action="{{ route('get-individual-name') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <strong>Bill Number</strong>  <strong class="text-danger">*</strong>
                                            <p><small>Enter the corrected bill number</small></p>
                                        </label>
                                        <input type="text" class="form-control" name="billNo" placeholder="Enter bill number">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn--raised" type="submit">Pull Name</button>
                                </div>
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

                        {{-- <img src="{{ asset('img/docs.svg') }}"> --}}
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
