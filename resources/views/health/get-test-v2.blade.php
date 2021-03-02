@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="col-12 p-0">
            <div class="card-demo">
                <div class="card card-success card--inverse bg-green pb-0">

                    <div class="card-body pb-0">
                        <center class="search-bill pb-0">
                            <h4 class="card-title">Customer Test result Assignment</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h6 class="card-subtitle">Use both the Patient's bill and their ID/PPT number to continue </h6>
                            <form action="{{ route('get-tests') }}" method="post" class="form-inline">
                                @csrf
                                <div class="form-group mx-sm-3 mb-2 col-8 p-0">
                                    <label for="inputPassword2" class="sr-only">Bill Number</label>
                                   <select class="form-control w-100 flex-grow-1 select2" name="billNo" required>
                                       <option value="">-Select the Bill Number and ID of the client</option>
                                   @foreach($getTestHeaders->data as $item)
                                       <option value="{{ $item->billNo  }}, {{ $item->idNo }}">{{ $item->billNo }}, {{ $item->idNo }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <button type="submit" class="btn btn-warning text-white mb-2 ml-0 text-black"><i class="zmdi zmdi-search"></i> Search</button>
                                <div class="row">
                                    <div class="col-12">
                                        <p pattern="[Mm]{1}[Ss]{1}[-]{1}[0-9]{3,}[,]{1}[0-9A-za-z]">The bills and National Ids of the clients above have been paid for. So select one by one as you assign results from the lab. </p>
                                    </div>
                                </div>
                            </form>
                            <img src="{{ asset('img/docs.svg') }}">
                        </center>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="content__inner d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Get patient test by bill number</h4>
                    <p>Assign result to the bill searched</p>
                    <br>
                    <br><br>
                    <br><br>
                    <br>
                    <br>
                    <br>
                    <h6 class="card-subtitle"></h6>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('get-tests') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="billNo" class="form-control" placeholder="Enter bill number eg MS20xxxxxxxxxxxxx">
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                 <button type="submit" class="btn btn-success"><i class="zmdi zmdi-check-all"></i>  Assign Results</button>
                                 <i class="form-group__bar"></i>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </section>
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">

        $('.btn-confirm').click(function(e){
            e.preventDefault();

            var billNo = $("#billNo").val();
            alert(billNo);

            $.ajax({
                url: "get-tests" ,
                type: "POST",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {billNo:billNo},

                success:function(data){
                    console.log(data);

                    var trHTML = '';
                    $.each(data.data, function (key,value) {
                        trHTML +=
                            '<tr>' +
                            '<td>' + value.id +
                            '</td><td>' + value.testName +
                            '</td><td>' + value.testTypeId +
                            '</td>' +
                            '</tr>';
                    });

                    $('#data-table').append(trHTML);

                } ,
                error: function(data) {
                    console.log(data.success.message);
                }

            });


        })

    </script>
    </section>
@endsection
